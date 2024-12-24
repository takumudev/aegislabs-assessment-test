<?php

namespace App\Providers;

use App\Services\UserService\UserService;
use App\Services\UserService\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }
}
