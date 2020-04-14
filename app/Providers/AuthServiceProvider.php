<?php

namespace App\Providers;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;
use App\DBContext\DBContextUser;
use App\Policies\ImagePolicy;
use App\Policies\ProjectPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        DBContextUser::class => UserPolicy::class,
        DBContextProject::class => ProjectPolicy::class,
        DBContextImage::class => ImagePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
