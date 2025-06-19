<?php

namespace App\Providers;

use App\Repositories\ClientRepositoryInterface;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryBindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );

        $this->app->singleton(
            \App\Repositories\CodeRepositoryInterface::class,
            \App\Repositories\Eloquent\CodeRepository::class
        );

        $this->app->singleton(
            \App\Repositories\SettingContactRepositoryInterface::class,
            \App\Repositories\Eloquent\SettingContactRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ManagementMessageRepositoryInterface::class,
            \App\Repositories\Eloquent\ManagementMessageRepository::class
        );

        $this->app->singleton(
            \App\Repositories\MessageRepositoryInterface::class,
            \App\Repositories\Eloquent\MessageRepository::class
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
