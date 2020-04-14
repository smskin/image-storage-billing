<?php

namespace App\Listeners\Project\Deleted;

use App\Events\Project\Deleted;
use App\Jobs\Exchange\Project\DeletedNotificationJob;

class ApiNotification
{
    /**
     * Handle the event.
     *
     * @param Deleted $event
     * @return void
     */
    public function handle(Deleted $event)
    {
        dispatch(new DeletedNotificationJob(
            $event->project
        ));
    }
}
