<?php


namespace App\DBContext\Traits\Connector;


use App\DBContext\DBContextProject;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait ImageConnectorTrait
{
    public function project(): HasOne
    {
        return $this->hasOne(DBContextProject::class, 'id', 'project_id');
    }
}
