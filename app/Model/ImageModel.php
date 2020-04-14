<?php

namespace App\Model;

use Carbon\Carbon;
use stdClass;

class ImageModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $uid;

    /**
     * @var string
     */
    public $projectUid;

    /**
     * @var int
     */
    public $fileSize;

    /**
     * @var string
     */
    public $originalFileName;

    /**
     * @var string
     */
    public $publicUrl;

    /**
     * @var string
     */
    public $publicUrlHash;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $updatedAt;

    public function unSerialize(stdClass $obj): ImageModel
    {
        $this->id = $obj->id;
        $this->uid = $obj->uid;
        $this->projectUid = $obj->projectUid;
        $this->fileSize = $obj->fileSize;
        $this->originalFileName = $obj->originalFileName;
        $this->publicUrl = $obj->publicUrl;
        $this->publicUrlHash = $obj->publicUrlHash;
        $this->createdAt = Carbon::make($obj->createdAt);
        $this->updatedAt = Carbon::make($obj->updatedAt);
        return $this;
    }
}
