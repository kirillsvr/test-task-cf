<?php

namespace App\Providers;

use App\Actions\Account\AccountIndexAction;
use App\Actions\Account\AccountStoreAction;
use App\Actions\Domain\DomainIndexAction;
use App\Contracts\Actions\AccountActionContract;
use App\Contracts\Actions\AccountStoreActionContract;
use App\Contracts\Actions\DomainActionContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DomainActionContract::class, DomainIndexAction::class);
        $this->app->bind(AccountActionContract::class, AccountIndexAction::class);
        $this->app->bind(AccountStoreActionContract::class, AccountStoreAction::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
