<?php

namespace App\Repositories;

use App\Models\Rol;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RolRepository
 * @package App\Repositories
 * @version September 28, 2017, 5:40 pm CST
 *
 * @method Rol findWithoutFail($id, $columns = ['*'])
 * @method Rol find($id, $columns = ['*'])
 * @method Rol first($columns = ['*'])
*/
class RolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rol::class;
    }
}
