<?php

namespace App\Providers;

use App\Models\Configuration;
use App\Models\Role;
use Gate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
//use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        setlocale(LC_ALL, config('app.locale'));

        if( !App::runningInConsole() ){
            $configurations = Configuration::pluck('value','key')->toArray();

            foreach ($configurations as $key => $value){
                config([$key => $value]);
            }
        }

        //si user no tiene opciones
        Blade::if('usernoops', function () {
            return Auth::user()->opciones->count()==0 ? true : false;
        });

        Blade::component('components.alert', 'alert');

        Gate::before(function ($user, $ability) {
            if ($user->hasRole(Role::SUPERADMIN) || $user->hasRole(Role::DEVELOPER)) {
                return true;
            }
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        if ($this->app->environment('local', 'testing')) {
//            $this->app->register(DuskServiceProvider::class);
//        }
    }
}
