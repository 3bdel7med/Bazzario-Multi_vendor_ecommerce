<?php

namespace App\Providers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\SettingsManager;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->singleton(SettingsManager::class, function ($app) {
        return new SettingsManager();
    });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
