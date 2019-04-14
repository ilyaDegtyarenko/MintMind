<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
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
        /**
         * Report service.
         */
        $this->app->singleton('report', function ($app, array $reportData) {
            Log::emergency(json_encode($reportData, JSON_UNESCAPED_UNICODE));
        });
    }
}
