<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register application services
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->bind('path.public', function () {
            return realpath(base_path('public'));
        });
    }
}
