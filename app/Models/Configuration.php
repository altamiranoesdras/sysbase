<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Configuration
 *
 * @package App\Models
 * @version June 25, 2018, 9:28 pm CST
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property int $id
 * @property string $key
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Configuration onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Configuration whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Configuration withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Configuration withoutTrashed()
 * @mixin \Eloquent
 */
class Configuration extends Model
{
    use SoftDeletes;

    public $table = 'configurations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'key',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
