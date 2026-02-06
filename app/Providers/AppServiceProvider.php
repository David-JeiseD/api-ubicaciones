<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

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
        RateLimiter::for('api', function (Request $request) {
            
            // 1. Si es un usuario logueado (tiene Token)
            if ($request->user()) {
                
                // Si es Premium -> Trato VIP (100 peticiones)
                if ($request->user()->plan === 'premium') {
                    return Limit::perMinute(100)->by($request->user()->id);
                }

                // Si es Free -> Trato Restringido (Solo 5 para probar rápido)
                return Limit::perMinute(5)->by($request->user()->id);
            }

            // 2. Si es invitado (Sin token, público) -> 10 peticiones por IP
            return Limit::perMinute(10)->by($request->ip());
        });
    }
}
