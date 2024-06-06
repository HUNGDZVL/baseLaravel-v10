<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AccountService;
use App\Models\AccountModel;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AccountService', function ($app) {
            return new AccountService(new AccountModel());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}