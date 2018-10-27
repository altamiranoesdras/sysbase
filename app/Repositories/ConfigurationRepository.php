<?php

namespace App\Repositories;

use App\Models\Configuration;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConfigurationRepository
 * @package App\Repositories
 * @version October 26, 2018, 6:46 pm CST
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
