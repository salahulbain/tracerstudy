<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // uncoment binding public folder after upload to server if different folder app and public
        // $this->app->bind('path.public', function () {
        //     return realpath(base_path() . '/../public_html/tracerstudy.iaialaziziyah.ac.id');
        // });

        // force https
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
