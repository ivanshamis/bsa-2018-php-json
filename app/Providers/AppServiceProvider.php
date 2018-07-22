<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\{CurrencyServiceInterface,CurrencyService};
use App\Services\{UserServiceInterface,UserService};
use App\Services\{WalletServiceInterface,WalletService};
use App\Services\{MoneyServiceInterface,MoneyService};
use JsonApi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonApi::defaultApi('v1');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);        
        $this->app->bind(WalletServiceInterface::class, WalletService::class);
        $this->app->bind(CurrencyServiceInterface::class, CurrencyService::class);
        $this->app->bind(MoneyServiceInterface::class, MoneyService::class);
    }
}