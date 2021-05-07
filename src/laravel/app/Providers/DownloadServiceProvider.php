<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DownloadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->appがサービスコンテナ
        $this->app->bind(\App\Services\Csvdownload::class,function(){
            return new \App\Services\CsvDownload();
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
