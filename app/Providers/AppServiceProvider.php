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
        $this->app->bind('helper', 'App\Helpers\Helper');
        $this->app->bind('messenger', 'App\Services\Messages\Messenger');
        $this->app->bind('geo', 'App\Services\Geo\Geo');
    }

}
