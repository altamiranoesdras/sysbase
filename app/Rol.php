<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Rol
 *
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Rol onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rol withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Rol withoutTrashed()
 * @mixin \Eloquent
 */
class Rol extends Model
{
    use SoftDeletes;

    protected $fillable = [
      "descripcion"
    ];

    public function usuarios(){
        $this->belongsToMany(User::class);
    }


}
