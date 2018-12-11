<?php

namespace App\Policies;

use App\Option;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionUserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function accessOption()
    {
        $user = \Auth::user();

        $opciones = Option::all()->map(function ($op){

            try{
                $ruta = route($op->ruta);
            }catch (\Exception $e){
                $ruta = '';
            }

            return $ruta;
        });


        $opcionesUser = $user->opciones->map(function ($op){

            try{
                $ruta = route($op->ruta);
            }catch (\Exception $e){
                $ruta = '';
            }

            return $ruta;
        });

        $home = route('home');
        $dashboard = route('dashboard');
        $uri = request()->fullUrl();

        $opcionAsignada = (!$opciones->contains($uri) || $opcionesUser->contains($uri));

        //si el usuario es administrador o tiene la opción asignada o la opción es home o la opción es dashboard
        return $user->isAdmin() || $opcionAsignada || $uri==$home || $uri==$dashboard;

    }
}
