<?php


namespace App\Services\ProjectService;

use App\DBContext\DBContextProject;
use App\DBContext\DBContextUser;
use Exception;

interface ServiceInterface
{
    /**
     * @param DBContextUser $user
     * @param string $name
     * @return DBContextProject
     * @throws Exception
     */
    public function create(DBContextUser $user, string $name): DBContextProject;

    /**
     * @param DBContextProject $project
     * @param string $name
     * @return DBContextProject
     */
    public function update(DBContextProject $project, string $name): DBContextProject;

    /**
     * @param DBContextProject $project
     * @throws Exception
     */
    public function delete(DBContextProject $project): void;

    /**
     * @param DBContextProject $project
     * @return string
     * @throws Exception
     */
    public function refreshApiToken(DBContextProject $project): string;
}
