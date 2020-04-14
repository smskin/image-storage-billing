<?php


namespace App\Model;

use App\DBContext\DBContextProject;

class ProjectModel
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
    public $name;

    /**
     * @var string
     */
    public $apiToken;

    public function fill(DBContextProject $context): ProjectModel
    {
        $this->id = $context->id;
        $this->uid = $context->uid;
        $this->name = $context->name;
        $this->apiToken = $context->api_token;
        return $this;
    }
}
