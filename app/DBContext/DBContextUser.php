<?php

namespace App\DBContext;

use App\DBContext\Traits\ColumnMutator\UserColumnMutatorTrait;
use App\DBContext\Traits\Method\UserMethodTrait;
use App\DBContext\Traits\System\UID;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DBContextUser extends Authenticatable
{
    use Notifiable, UID, UserMethodTrait, UserColumnMutatorTrait;

    public const ROLE_SYSTEM = 'system';
    public const ROLE_USER = 'user';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uid', 'name', 'email', 'email_verified_at',  'password', 'api_token', 'remember_token', 'created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['email_verified_at', 'created_at', 'updated_at'];

}
