<?php

namespace App\Listeners\Project\Created;

use App\Events\Project\Created;
use App\Jobs\Exchange\Project\CreatedNotificationJob;

class ApiNotification
{
    /**
     * Handle the event.
     *
     * @param Created $event
     * @return void
     */
    public function handle(Created $event)
    {
        dispatch(new CreatedNotificationJob(
            $event->project
        ));
    }
}
