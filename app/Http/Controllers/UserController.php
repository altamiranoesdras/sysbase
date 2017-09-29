<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Rol;
use App\Models\User;
use App\Repositories\UserRepository;
use Facades\App\Menu;
use App\Option;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $rols = Rol::all();
        $rolsUser= [];
        $create =1;
        return view('users.create',compact('rols','rolsUser','create'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = $this->userRepository->create($input);

        if($user && $request->rols){
            $user->rols()->sync($request->rols);
        }

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $rols = Rol::all();
        $rolsUser = array_pluck($user->rols->toArray(),"id");

        return view('users.edit',compact('user','rolsUser','rols'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

//        dd($user->toArray(),$request->toArray());
//
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;


        if(!is_null($request->password) && !is_null($request->password_confirmation)){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $rols = $request->rols ? $request->rols : [];
        $user->rols()->sync($rols);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Muestra al vista para poder asignar opciones del menu a un usuario
     *
     * @param $id id del usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu(User $user){

        $opciones= Option::all();
        $menu= Menu::renderUser($opciones,0,$user);

        return view("users.menu",compact('user','menu'));
    }

    /**
     * Guarda lsa opciones de menu que se decidieron asignar al usuario
     *
     * @param Request $request
     * @param $id usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menuStore(User $user){

        $opciones = is_null(request()->opciones) ? array() : request()->opciones;

        $user->opciones()->sync($opciones);

        Flash::success('Menu del usuario actualizado!')->important();

        return redirect("admin/user/{$user->id}/menu");
    }
}
