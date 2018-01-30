<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['frontend.adverts.index', 'frontend.profile.adverts.index'],'App\Http\ViewComposers\CategoriesViewComposer');
        view()->composer(['frontend.adverts.index'],'App\Http\ViewComposers\CitiesViewComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
