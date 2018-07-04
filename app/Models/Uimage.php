<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Uimage
 *
 * @package App\Models
 * @version October 6, 2017, 11:40 am CST
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection cursoGrado
 * @property \Illuminate\Database\Eloquent\Collection grados
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property int $id
 * @property int $user_id
 * @property string $data
 * @property string $name
 * @property string $type
 * @property int $size
 * @property string $extension
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Uimage onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Uimage whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Uimage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Uimage withoutTrashed()
 * @mixin \Eloquent
 */
class Uimage extends Model
{
    use SoftDeletes;

    public $table = 'uimages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'data',
        'name',
        'type',
        'size',
        'extension'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'data' => 'string',
        'name' => 'string',
        'type' => 'string',
        'size' => 'integer',
        'extension' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
