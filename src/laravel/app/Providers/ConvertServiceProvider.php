<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConvertServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Services\ConvertService::class,function(){
            // return new \App\Services\ConvertService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
