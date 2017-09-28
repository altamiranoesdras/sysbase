<?php

namespace App\Providers;

use App\Models\Configuration;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

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

        Blade::if('useradmin', function () {
            return in_array(1,array_pluck(Auth::user()->rols->toArray(),"id"));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
