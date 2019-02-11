<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as PermissionBase;

/**
 * Class Permission
 * Esta clase se define para poder alterar o sobresecribir metodos del paquete spatie
 * @package App\Models
 * @version January 4, 2019, 5:38 pm CST
 *
 * @property \App\Models\ModelHasPermission modelHasPermission
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property string guard_name
 */
class Permission extends PermissionBase
{


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        "name" => "required|max:255|unique:permissions"
    ];

    /**
     * Nombre de los atributos para los errors
     * @var array
     */
    public static $atributos = [
        "name" => "nombre"
    ];


}
