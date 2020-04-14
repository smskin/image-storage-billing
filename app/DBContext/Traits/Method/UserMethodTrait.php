<?php

namespace App\DBContext\Traits\Method;

use App\DBContext\DBContextUser;
use Str;

trait UserMethodTrait
{
    public static function generateApiToken(){
        $token = Str::random(60);
        $exists = DBContextUser::whereApiToken(hash('sha256', $token))->exists();
        if ($exists){
            return self::generateApiToken();
        }
        return $token;
    }

    public function isSystemAccount(): bool
    {
        return $this->role === DBContextUser::ROLE_SYSTEM;
    }
}
