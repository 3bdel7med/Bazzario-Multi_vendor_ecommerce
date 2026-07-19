<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bind stats automatically whenever the admin dashboard layout is rendered
        View::composer('layouts.admin', function ($view) {

            // Cache stats for 10 minutes to prevent heavy DB queries on every page switch
            $adminStats = Cache::remember('admin_sidebar_stats', now()->addMinutes(10), function () {
                return [
                    'users_count'      => User::where('role', 'user')->count(),
                    'vendors_count'    => User::where('role', 'vendor')->count(),
                    'categories_count' => Category::count(),
                    'orders_count'     => Order::count(),
                ];
            });

            // Inject the array directly into the view context
            $view->with('adminStats', $adminStats);
        });
    }
}
