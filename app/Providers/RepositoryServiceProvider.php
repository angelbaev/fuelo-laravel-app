<?php

namespace App\Providers;

use App\Infrastructure\Repositories\Contracts\AuthRepositoryInterface;
use App\Infrastructure\Repositories\Contracts\BaseRepositoryInterface;
use App\Infrastructure\Repositories\Contracts\BrandRepositoryInterface;
use App\Infrastructure\Repositories\Contracts\DimensionRepositoryInterface;
use App\Infrastructure\Repositories\Contracts\FuelPriceRepositoryInterface;
use App\Infrastructure\Repositories\Contracts\FuelRepositoryInterface;
use App\Infrastructure\Repositories\Contracts\DistrictRepositoryInterface;
use App\Infrastructure\Repositories\DimensionRepository;
use App\Infrastructure\Repositories\FuelPriceRepository;
use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Repositories\AuthRepository;
use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\BrandRepository;
use App\Infrastructure\Repositories\FuelRepository;
use App\Infrastructure\Repositories\DistrictRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(FuelRepositoryInterface::class, FuelRepository::class);
        $this->app->bind(DistrictRepositoryInterface::class, DistrictRepository::class);
        $this->app->bind(DimensionRepositoryInterface::class, DimensionRepository::class);
        $this->app->bind(FuelPriceRepositoryInterface::class, FuelPriceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
