<?php

namespace App\Providers;

use App\Events\Project\Created as ProjectCreatedEvent;
use App\Listeners\Project\Created\ApiNotification as ProjectCreatedApiNotification;
use App\Events\Project\Deleted as ProjectDeletedEvent;
use App\Listeners\Project\Deleted\ApiNotification as ProjectDeletedApiNotification;
use App\Events\Project\Updated as ProjectUpdatedEvent;
use App\Listeners\Project\Updated\ApiNotification as ProjectUpdatedApiNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProjectCreatedEvent::class => [
            ProjectCreatedApiNotification::class
        ],
        ProjectDeletedEvent::class => [
            ProjectDeletedApiNotification::class
        ],
        ProjectUpdatedEvent::class => [
            ProjectUpdatedApiNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
