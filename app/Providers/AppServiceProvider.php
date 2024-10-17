<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\RegisterResponse;
use App\Http\Responses\CustomLoginViewResponse;
use App\Http\Responses\CustomRegisterViewResponse;
use App\Http\Responses\CustomLoginResponse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Http\Responses\LoginResponse;

class AppServiceProvider extends ServiceProvider{



 

    /**
     * Register any application services.
     */
    
    public function register()
{
    $this->app->singleton('files', function () {
        return new Filesystem;
    });
}


    /**
     * Bootstrap any application services.
     */
    public function boot(): void

    
    {
         // Configuration du rate limiter pour la connexion
  RateLimiter::for('login', function ($request) {
    return Limit::perMinute(5)->by($request->email.$request->ip());
});       
        
            // Lier l'interface à l'implémentation personnalisée
            $this->app->singleton(RegisterViewResponse::class, CustomRegisterViewResponse::class);
            $this->app->singleton(LoginViewResponse::class, CustomLoginViewResponse::class);
            $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
            $this->app->singleton(
                \Laravel\Fortify\Contracts\RegisterResponse::class,
                RegisterResponse::class
            );
            $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);

    }
}

