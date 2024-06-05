<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BaseService;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton('responseService', function ($app) {
            return new BaseService();
        });
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}