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
        // Not creating a view Provider for one variable at the moment.
        // TODO: Create view provider to follow standard practice.
        view()->share('imageHost', 'https://s3.amazonaws.com/kimberly-technology');
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
