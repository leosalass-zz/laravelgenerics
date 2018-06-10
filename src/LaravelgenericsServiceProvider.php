<?php

namespace Immersioninteractive\Laravelgenerics;

use Illuminate\Support\ServiceProvider;

class LaravelgenericsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IIResponse::class, function () {
            return new IIResponse();
        });
        $this->app->alias(IIResponse::class, 'IIResponse');
    }
}
