<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Option
 *
 * @property int $id
 * @property int|null $padre
 * @property string $nombre
 * @property string|null $ruta
 * @property string|null $descripcion
 * @property string $icono_l
 * @property string|null $icono_r
 * @property int $orden
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $usuarios
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Option onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereIconoL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereIconoR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option wherePadre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereRuta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Option withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Option withoutTrashed()
 * @mixin \Eloquent
 */
class Option extends Model
{
    use SoftDeletes;

    protected $fillable= [
        'padre','nombre','descripcion','ruta','icono_r','icono_l'
    ];

    protected $with=['parent'];

    /**
     * Devuelve los usuarios que tengan asignada la opcion
     */
    public function usuarios(){
        return $this->belongsToMany('App\User');
    }

    public function parent()
    {
        return $this->belongsTo(Option::class,'padre','id');
    }
}