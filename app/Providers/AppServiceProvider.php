<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\User;
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
        Gate::define('admin-user',function($user){
            return $user->hasRole('admin');
        });

        Gate::define('mod-user',function($user){
            return $user->hasRole('moderate');
        });

        Gate::define('edit-admin',function($user){
            return $user->hasRole('admin');
        });
    }
}
