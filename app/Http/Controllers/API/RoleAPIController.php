<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoleAPIRequest;
use App\Http\Requests\API\UpdateRoleAPIRequest;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoleController
 * @package App\Http\Controllers\API
 */

class RoleAPIController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     * GET|HEAD /roles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roleRepository->pushCriteria(new RequestCriteria($request));
        $this->roleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roles = $this->roleRepository->all();

        return $this->sendResponse($roles->toArray(), 'Roles recuperado con éxito');
    }

    /**
     * Store a newly created Role in storage.
     * POST /roles
     *
     * @param CreateRoleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleAPIRequest $request)
    {
        $input = $request->all();

        $roles = $this->roleRepository->create($input);

        return $this->sendResponse($roles->toArray(), 'Role guardado exitosamente');
    }

    /**
     * Display the specified Role.
     * GET|HEAD /roles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Role $role */
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            return $this->sendError('Role no encontrado');
        }

        return $this->sendResponse($role->toArray(), 'Role recuperado con éxito');
    }

    /**
     * Update the specified Role in storage.
     * PUT/PATCH /roles/{id}
     *
     * @param  int $id
     * @param UpdateRoleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Role $role */
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            return $this->sendError('Role no encontrado');
        }

        $role = $this->roleRepository->update($input, $id);

        return $this->sendResponse($role->toArray(), 'Role actualizado exitosamente');
    }

    /**
     * Remove the specified Role from storage.
     * DELETE /roles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Role $role */
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            return $this->sendError('Role no encontrado');
        }

        $role->delete();

        return $this->sendResponse($id, 'Role eliminado exitosamente');
    }
}
