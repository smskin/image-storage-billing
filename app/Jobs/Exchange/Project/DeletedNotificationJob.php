<?php

namespace App\Jobs\Exchange\Project;

use App\DBContext\DBContextProject;
use App\Model\ProjectModel;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeletedNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var ProjectModel
     */
    public $model;

    /**
     * Create a new job instance.
     * @param DBContextProject $project
     */
    public function __construct(DBContextProject $project)
    {
        $this->connection = 'rabbitmq';
        $this->queue = 'exchange-project';

        $this->model = (new ProjectModel())->fill($project);
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle(): void
    {
        throw new Exception('The task will be completed in the api project');
    }
}
