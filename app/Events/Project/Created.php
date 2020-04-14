<?php

namespace App\Events\Project;

use App\DBContext\DBContextProject;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Created
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var DBContextProject
     */
    public $project;

    /**
     * Create a new event instance.
     *
     * @param DBContextProject $project
     */
    public function __construct(DBContextProject $project)
    {
        $this->project = $project;
    }
}
