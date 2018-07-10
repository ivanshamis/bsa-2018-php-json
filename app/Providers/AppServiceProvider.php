<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\CurrencyServiceInterface', 'App\Services\CurrencyService');
        $this->app->bind('App\Services\UserServiceInterface', 'App\Services\UserService');
        $this->app->bind('App\Services\WalletServiceInterface', 'App\Services\WalletService');
    }
}