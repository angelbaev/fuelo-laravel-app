<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Repositories\AuthRepositoryInterface;
use App\Infrastructure\Repositories\BaseRepositoryInterface;
use App\Infrastructure\Repositories\AuthRepository;
use App\Infrastructure\Repositories\BaseRepository;
use App\Infrastructure\Repositories\BrandRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BrandRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
