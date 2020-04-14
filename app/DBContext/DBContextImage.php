<?php

namespace App\DBContext;

use App\DBContext\Traits\Connector\ImageConnectorTrait;
use Illuminate\Database\Eloquent\Model;

class DBContextImage extends Model
{
    use ImageConnectorTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uid', 'file_size', 'original_file_name', 'public_url', 'public_url_hash', 'created_at', 'updated_at'];

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
