<?php


namespace App\Services\UserService;

use App\DBContext\DBContextUser;
use Exception;

interface ServiceInterface
{
    /**
     * @param DBContextUser $user
     * @param string $name
     * @param string $email
     * @return DBContextUser
     */
    public function update(DBContextUser $user, string $name, string $email): DBContextUser;

    /**
     * @param DBContextUser $user
     * @throws Exception
     */
    public function delete(DBContextUser $user): void;

    /**
     * @param DBContextUser $user
     * @param string $password
     * @return DBContextUser
     */
    public function updatePassword(DBContextUser $user, string $password): DBContextUser;

    /**
     * @param DBContextUser $user
     * @return string
     */
    public function refreshApiToken(DBContextUser $user): string;
}
