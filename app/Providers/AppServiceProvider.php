<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\User;
use App\Observers\CustomerObserver;
use App\Observers\UserObserver;
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
        Customer::observe(CustomerObserver::class);
        User::observe(UserObserver::class);
    }
}
