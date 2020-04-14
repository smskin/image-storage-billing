<?php

namespace App\Observers;

use App\DBContext\DBContextProject;
use App\Events\Project\Created as ProjectCreatedEvent;
use App\Events\Project\Deleted as ProjectDeletedEvent;
use App\Events\Project\Updated as ProjectUpdatedEvent;

class ProjectObserver
{
    /**
     * Handle the d b context project "created" event.
     *
     * @param  DBContextProject  $project
     * @return void
     */
    public function created(DBContextProject $project)
    {
        event(new ProjectCreatedEvent($project));
    }

    /**
     * Handle the d b context project "updated" event.
     *
     * @param  DBContextProject  $project
     * @return void
     */
    public function updated(DBContextProject $project)
    {
        event(new ProjectUpdatedEvent($project));
    }

    /**
     * Handle the d b context project "deleted" event.
     *
     * @param  DBContextProject  $project
     * @return void
     */
    public function deleted(DBContextProject $project)
    {
        event(new ProjectDeletedEvent($project));
    }

    /**
     * Handle the d b context project "restored" event.
     *
     * @param  DBContextProject  $project
     * @return void
     */
    public function restored(DBContextProject $project)
    {
        //
    }

    /**
     * Handle the d b context project "force deleted" event.
     *
     * @param  DBContextProject  $project
     * @return void
     */
    public function forceDeleted(DBContextProject $project)
    {
        //
    }
}
