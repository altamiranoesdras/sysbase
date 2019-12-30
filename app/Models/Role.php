<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as RoleBase;

/**
 * Class Rol
 * @package App\Models
 * @version November 1, 2018, 10:21 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property string descripcion
 */
class Role extends RoleBase
{

    const DEVELOPER =   'developer';
    const SUPERADMIN =  'superadmin';
    const ADMIN =       'admin';
    const EMPLEADO =       'empleado';

    protected $fillable = ['name','guard_name'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        "name" => "required|max:255|unique:roles"
    ];


}
