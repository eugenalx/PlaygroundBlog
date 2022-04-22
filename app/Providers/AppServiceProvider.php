<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

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
        FacadesGate::define('admin', function(User $user){
            return $user->role === 'admin';
        });

        FacadesGate::define('user', function(User $user){
            return $user->role === 'user';
        });
        
    }
}
