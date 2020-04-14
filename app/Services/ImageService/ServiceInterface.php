<?php


namespace App\Services\ImageService;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;
use App\Model\ImageModel;
use Illuminate\Http\UploadedFile;
use Exception;

interface ServiceInterface
{
    public function upload(DBContextProject $project, UploadedFile $file): DBContextImage;

    /**
     * @param DBContextImage $image
     * @throws Exception
     */
    public function delete(DBContextImage $image): void;

    /**
     * @param ImageModel $model
     * @param DBContextProject $project
     * @return DBContextImage
     */
    public function createContext(ImageModel $model, DBContextProject $project): DBContextImage;

    /**
     * @param DBContextImage $image
     * @throws Exception
     */
    public function deleteContext(DBContextImage $image): void;
}
