<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rol
 *
 * @package App\Models
 * @version September 28, 2017, 5:40 pm CST
 * @property \Illuminate\Database\Eloquent\Collection carreraGrado
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rol onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rol withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rol withoutTrashed()
 * @mixin \Eloquent
 */
class Rol extends Model
{
    use SoftDeletes;

    public $table = 'rols';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
