<?php

namespace App\Repositories;

use App\Models\Configuration;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConfigurationRepository
 * @package App\Repositories
 * @version September 28, 2017, 9:49 am CST
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
        'value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Configuration::class;
    }
}
