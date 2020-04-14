<?php

namespace App\Listeners\Project\Updated;

use App\Events\Project\Updated;
use App\Jobs\Exchange\Project\UpdatedNotificationJob;

class ApiNotification
{
    /**
     * Handle the event.
     *
     * @param Updated $event
     * @return void
     */
    public function handle(Updated $event)
    {
        dispatch(new UpdatedNotificationJob(
            $event->project
        ));
    }
}
