<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Infrastructure\Repositories\BaseRepositoryInterface;
// use App\Infrastructure\Repositories\BrandRepository;
// use App\Services\BrandService;
// use App\Models\Brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // $this->app->bind(Brand::class, BrandRepository::class);
        // $this->app->bind(BrandService::class, function ($app) {
        //     return new BrandService($app->make(BrandRepository::class));
        // });        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
