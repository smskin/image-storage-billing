<?php
/**
 * Created by PhpStorm.
 * User: Mikhaylov Sergey Sergeevich ( @smskin )
 * Date: 19.11.2019
 * Time: 19:50
 */

namespace App\DBContext\Traits\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\UuidInterface;

trait UID
{
    /** @noinspection PhpUnused */
    public static function bootUID(): void
    {
        self::creating(function (Model $model) {
            if (!array_key_exists('uid',$model->attributes)){
                $model->attributes['uid'] = self::generateUid()->toString();
            }
        });
    }

    public static function generateUid(): UuidInterface
    {
        $uuid =  Str::uuid();
        /** @noinspection PhpUndefinedMethodInspection */
        $test =  self::where('uid',$uuid->toString())->exists();
        if (!$test){
            return $uuid;
        }
        return self::generateUid();
    }

    public static function getByUid(string $uid = null): ?self {
        if (!$uid){
            return null;
        }

        /** @noinspection PhpUndefinedMethodInspection */
        return self::where('uid',$uid)->first();
    }
}
