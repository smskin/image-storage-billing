<?php


namespace App\DBContext\Traits\Method;


use App\DBContext\DBContextProject;
use Illuminate\Support\Str;

trait ProjectMethodTrait
{
    public static function generateApiToken(){
        $token = Str::random(60);
        $exists = DBContextProject::whereApiToken(hash('sha256', $token))->exists();
        if ($exists){
            return self::generateApiToken();
        }
        return $token;
    }
}
