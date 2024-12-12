<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return $request->user()
                ? Limit::perMinute(100)->by($request->user()->id)
                : Limit::perMinute(60)->by($request->ip());
        });
    }
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
        //
    }
}
