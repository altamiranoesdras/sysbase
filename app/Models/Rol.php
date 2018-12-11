<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rol
 * @package App\Models
 * @version November 1, 2018, 10:21 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property string descripcion
 */
class Rol extends Model
{
    use SoftDeletes;

    public $table = 'rols';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const ADMIN =   1;
    const USER =    2;
    const EDITOR =  3;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        "descripcion" => "required|max:255|unique:rols"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'rol_user');
    }
}
