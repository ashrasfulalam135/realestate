<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
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
        view()->composer('frontend.components.main_header', function($view){
            $loggedin = auth()->user() ? true : false;
            $view->with('loggedin', $loggedin);
        });

        view()->composer(['admin.components.navbar','frontend.components.dashboard_sidebar'], function($view){
            $user = auth()->user()->toArray();
            $view->with('user', $user);
        });
    }
}
