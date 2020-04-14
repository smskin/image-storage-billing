<?php

namespace App\Services\ProjectService;

use App\DBContext\DBContextProject;
use App\DBContext\DBContextUser;
use Exception;
use Throwable;

class Service implements ServiceInterface
{
    /**
     * @param DBContextUser $user
     * @param string $name
     * @return DBContextProject
     * @throws Exception
     * @throws Throwable
     */
    public function create(DBContextUser $user, string $name): DBContextProject
    {
        $apiToken = DBContextProject::generateApiToken();

        $context = new DBContextProject();
        $context->user_id = $user->id;
        $context->name = $name;
        $context->api_token = $apiToken;
        $context->save();
        return $context;
    }

    /**
     * @param DBContextProject $project
     * @param string $name
     * @return DBContextProject
     */
    public function update(DBContextProject $project, string $name): DBContextProject
    {
        $project->name = $name;
        $project->save();

        return $project;
    }

    /**
     * @param DBContextProject $project
     * @throws Exception
     */
    public function delete(DBContextProject $project): void
    {
        $project->delete();
    }

    /**
     * @param DBContextProject $project
     * @return string
     * @throws Exception
     */
    public function refreshApiToken(DBContextProject $project): string
    {
        $apiToken = DBContextProject::generateApiToken();

        $project->api_token = $apiToken;
        $project->save();
        return $apiToken;
    }
}
