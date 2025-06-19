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

        $this->app->singleton(
            \App\Services\CodeServiceInterface::class,
            \App\Services\Production\CodeService::class
        );

        $this->app->singleton(
            \App\Services\SettingContactServiceInterface::class,
            \App\Services\Production\SettingContactService::class
        );

        $this->app->singleton(
            \App\Services\ManagementMessageServiceInterface::class,
            \App\Services\Production\ManagementMessageService::class
        );

        $this->app->singleton(
            \App\Services\MessageServiceInterface::class,
            \App\Services\Production\MessageService::class
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
