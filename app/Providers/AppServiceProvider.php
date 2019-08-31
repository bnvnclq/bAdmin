<?php

namespace App\Providers;

use App\User;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) 
        {
            $user = new User();
            $view->with([
                'coll_modules' => $user->getAllPermission(Auth::user()->role_id ?? 0),
                ]);    
        });
    }
}
