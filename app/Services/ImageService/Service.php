<?php

namespace App\Services\ImageService;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;
use App\Model\ImageModel;
use Carbon\Carbon;
use Exception;
use File;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\UploadedFile;
use \App\Services\HttpService\Service as HttpService;

class Service implements ServiceInterface
{

    /**
     * @param DBContextProject $project
     * @param UploadedFile $file
     * @return DBContextImage
     * @throws BindingResolutionException
     * @throws ClientException
     */
    public function upload(DBContextProject $project, UploadedFile $file): DBContextImage
    {
        $response = $this->getHttpService()
            ->setApiToken($this->getApiToken())
            ->multipartPost(
                $this->getBaseUrl().'/users/'.$project->uid.'/images',
                [
                    [
                        'name'     => 'file',
                        'contents' => file_get_contents($file->getRealPath()),
                        'filename' => $file->getClientOriginalName()
                    ]
                ]
            );

        $model = (new ImageModel)->unSerialize(json_decode($response));
        $context = $this->createContext($model, $project);

        File::delete($file->getRealPath());

        return $context;
    }

    public function createContext(ImageModel $model, DBContextProject $project): DBContextImage
    {
        $context = DBContextImage::whereUid($model->uid)->first();
        if ($context){
            return $context;
        }

        $context = new DBContextImage();
        $context->id = $model->id;
        $context->user_id = $project->user_id;
        $context->project_id = $project->id;
        $context->uid = $model->uid;
        $context->file_size = $model->fileSize;
        $context->original_file_name = $model->originalFileName;
        $context->public_url = $model->publicUrl;
        $context->public_url_hash = $model->publicUrlHash;
        $context->created_at = Carbon::make($model->createdAt);
        $context->updated_at = Carbon::make($model->updatedAt);
        $context->save();
        return $context;
    }

    /**
     * @param DBContextImage $image
     * @throws Exception
     * @throws ClientException
     */
    public function delete(DBContextImage $image): void
    {
        $project = $image->project;

        try {
            $this->getHttpService()
                ->setApiToken($this->getApiToken())
                ->delete(
                    $this->getBaseUrl().'/users/'.$project->uid.'/images/'.$image->public_url_hash
                );
        } catch (Exception $exception){
            if ($exception->getCode() !== 404){
                throw $exception;
            }
        }

        $this->deleteContext($image);
    }

    /**
     * @param DBContextImage $image
     * @throws Exception
     */
    public function deleteContext(DBContextImage $image): void
    {
        $image->delete();
    }

    /**
     * @return HttpService
     * @throws BindingResolutionException
     */
    private function getHttpService(): HttpService
    {
        return app()->make(HttpService::class);
    }

    private function getBaseUrl(): string {
        return config('api-service.base_url');
    }

    private function getApiToken(): string
    {
        return config('api-service.api_token');
    }
}
