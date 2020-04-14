<?php

namespace App\Providers;

use App\DBContext\DBContextProject;
use App\Observers\ProjectObserver;
use Illuminate\Support\ServiceProvider;
use App\Services\HttpService\Provider as HttpServiceProvider;
use App\Services\ImageService\Provider as ImageServiceProvider;
use App\Services\ProjectService\Provider as ProjectServiceProvider;
use App\Services\UserService\Provider as UserServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(HttpServiceProvider::class);
        $this->app->register(ImageServiceProvider::class);
        $this->app->register(ProjectServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DBContextProject::observe(ProjectObserver::class);
    }
}
