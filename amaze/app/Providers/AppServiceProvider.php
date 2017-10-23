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

        $var = \App\GiftCard::archives();
        view()->share('archives', $var);

        $totalSpent = \App\GiftCard::getTotalSpending();
        view()->share('totalSpent', $totalSpent);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
