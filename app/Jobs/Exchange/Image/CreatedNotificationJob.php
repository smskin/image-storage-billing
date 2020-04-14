<?php

namespace App\Jobs\Exchange\Image;

use App\DBContext\DBContextProject;
use App\Model\ImageModel;
use App\Services\ImageService\Service as ImageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatedNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var ImageModel
     */
    public $model;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->connection = 'rabbitmq';
        $this->queue = 'exchange-image';
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        $model = $this->model;
        $project = $this->getProject($model->projectUid);
        if (!$project){
            return;
        }

        $this->getImageService()->createContext($model,$project);
    }

    private function getProject(string $uid): ?DBContextProject
    {
        return DBContextProject::whereUid($uid)->first();
    }

    /**
     * @return ImageService
     * @throws BindingResolutionException
     */
    private function getImageService(): ImageService
    {
        return app()->make(ImageService::class);
    }
}
