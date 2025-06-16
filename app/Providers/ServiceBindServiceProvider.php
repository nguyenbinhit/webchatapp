<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceBindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Services\UserServiceInterface::class,
            \App\Services\Production\UserService::class
        );

        $this->app->singleton(
            \App\Services\ClientServiceInterface::class,
            \App\Services\Production\ClientService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
