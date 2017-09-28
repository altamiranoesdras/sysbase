<?php

namespace App\Http\Controllers;

use App\DataTables\RolDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Repositories\RolRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RolController extends AppBaseController
{
    /** @var  RolRepository */
    private $rolRepository;

    public function __construct(RolRepository $rolRepo)
    {
        $this->rolRepository = $rolRepo;
    }

    /**
     * Display a listing of the Rol.
     *
     * @param RolDataTable $rolDataTable
     * @return Response
     */
    public function index(RolDataTable $rolDataTable)
    {
        return $rolDataTable->render('rols.index');
    }

    /**
     * Show the form for creating a new Rol.
     *
     * @return Response
     */
    public function create()
    {
        return view('rols.create');
    }

    /**
     * Store a newly created Rol in storage.
     *
     * @param CreateRolRequest $request
     *
     * @return Response
     */
    public function store(CreateRolRequest $request)
    {
        $input = $request->all();

        $rol = $this->rolRepository->create($input);

        Flash::success('Rol saved successfully.');

        return redirect(route('rols.index'));
    }

    /**
     * Display the specified Rol.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        return view('rols.show')->with('rol', $rol);
    }

    /**
     * Show the form for editing the specified Rol.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        return view('rols.edit')->with('rol', $rol);
    }

    /**
     * Update the specified Rol in storage.
     *
     * @param  int              $id
     * @param UpdateRolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolRequest $request)
    {
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        $rol = $this->rolRepository->update($request->all(), $id);

        Flash::success('Rol updated successfully.');

        return redirect(route('rols.index'));
    }

    /**
     * Remove the specified Rol from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        $this->rolRepository->delete($id);

        Flash::success('Rol deleted successfully.');

        return redirect(route('rols.index'));
    }
}
