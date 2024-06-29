<?php

namespace App\Providers;

use Abaev\Fuelo\FueloClientApi;
use Illuminate\Support\ServiceProvider;

class FueloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FueloClientApi::class, function ($app) {
            $apiKey = config('fuelo.api_key');
            return new FueloClientApi($apiKey);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
