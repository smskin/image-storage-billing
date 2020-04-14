<?php

namespace App\Services\UserService;

use App\DBContext\DBContextUser;
use Exception;

class Service implements ServiceInterface
{
    /**
     * @param DBContextUser $user
     * @param string $name
     * @param string $email
     * @return DBContextUser
     */
    public function update(DBContextUser $user, string $name, string $email): DBContextUser
    {
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return $user;
    }

    /**
     * @param DBContextUser $user
     * @throws Exception
     */
    public function delete(DBContextUser $user): void
    {
        $user->delete();
    }

    /**
     * @param DBContextUser $user
     * @param string $password
     * @return DBContextUser
     */
    public function updatePassword(DBContextUser $user, string $password): DBContextUser
    {
        $user->password = $password;
        $user->save();
        return $user;
    }

    /**
     * @param DBContextUser $user
     * @return string
     */
    public function refreshApiToken(DBContextUser $user): string
    {
        $apiToken = DBContextUser::generateApiToken();

        $user->api_token = $apiToken;
        $user->save();
        return $apiToken;
    }
}
