<?php

namespace App\Providers;

use App\User;
use App\Settings;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
        // Paginator::useBootstrap();

        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) 
        {
            $user = new User();
            $settings = new Settings();
            $view->with([
                'coll_modules' => $user->getAllPermission(Auth::user()->role_id ?? 0),
                'logo_address' => $settings->getConfig('logo_address')->value ?? "",
                ]);    
        });
    }
}
