<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        try {
            if (Schema::hasTable('categories')) {
                View::share('categories', Category::orderBy('name')->get());
            }
        } catch (\Throwable $e) {
            // Evita crash durante composer / deploy / package:discover
        }

        Paginator::useBootstrapFive();
    }
}
