<?php

namespace App\Repositories;

use App\Models\Configuration;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConfigurationRepository
 * @package App\Repositories
 * @version February 12, 2019, 8:37 am CST
 *
 * @method Configuration findWithoutFail($id, $columns = ['*'])
 * @method Configuration find($id, $columns = ['*'])
 * @method Configuration first($columns = ['*'])
*/
class ConfigurationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'value',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Configuration::class;
    }
}
