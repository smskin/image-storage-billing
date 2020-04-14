<?php

namespace App\DBContext;

use App\DBContext\Traits\ColumnMutator\ProjectColumnMutatorTrait;
use App\DBContext\Traits\Method\ProjectMethodTrait;
use App\DBContext\Traits\System\UID;
use Illuminate\Database\Eloquent\Model;

class DBContextProject extends Model
{
    use UID, ProjectMethodTrait, ProjectColumnMutatorTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uid', 'user_id', 'name', 'api_token', 'created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

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
    protected $dates = ['created_at', 'updated_at'];

}
