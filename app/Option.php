<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Option extends Model
{
    use SoftDeletes;

    protected $fillable= [
        'padre','nombre','descripcion','ruta','icono_r','icono_l'
    ];

    /**
     * Devuelve los usuarios que tengan asignada la opcion
     */
    public function usuarios(){
        return $this->belongsToMany('App\User');
    }
}