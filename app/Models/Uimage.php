<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Uimage
 * @package App\Models
 * @version October 6, 2017, 11:40 am CST
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection cursoGrado
 * @property \Illuminate\Database\Eloquent\Collection grados
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer user_id
 * @property string data
 * @property string name
 * @property string type
 * @property integer size
 * @property string extension
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
