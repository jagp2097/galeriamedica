<?php

namespace galeriamedica\Http\Controllers;

use Illuminate\Http\Request;
use galeriamedica\Http\Requests\UsersRequest;
use galeriamedica\User;
use galeriamedica\Paciente;
use Auth;
use Hash;
use Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');//Este muddleware permite el acceso a este controlker si se esta autenticado
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('panelAdmin', User::class);
        $users = User::all();

        if ($request->input('nombre') != null) {
            $users = User::nombreUsuario($request->input('nombre'))->get();
            return view('users.index', compact('users'));
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('panelAdmin', User::class);
        /*$user = new User();
        $roles = ['Admin', 'Usuario'];
        return view('users.create', compact('user', 'roles'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('panelAdmin', User::class);
        //crear validaciones
        /*$user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('rol');

        $user->save();
        
        return redirect()->to(route('user.index'));
        //return $request;*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $act = Auth::id();
        if ($act == $user->id) {
            $this->authorize('cambiarInformacion', $user);
            return view('users.show', compact('user'));
        }
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('panelAdmin', User::class);
        //$roles = ['Admin', 'Usuario'];        
        //return view('users.create', compact('user', 'roles'));
       return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {

        $this->authorize('update', User::class);
        /*
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        
        if (Auth::check() && $user->type == 'Admin') {
            $this->authorize('cambiarTipoUsuario', User::class);
            $user->type = $request->input('rol');
            $user->save();
            return redirect()->to(route('user.index'))->with('status', 'Información actualizada con éxito'); 
        }
        
        else {
            $user->type = 'Usuario';
            $user->save();
            return redirect()->to(route('user.show', Auth::id()))->with('status', 'Información actualizada con éxito');
        }


        //return redirect()->to(route('user.index'))->with('status', 'Tipo de usuario actualizado con éxito'); 
        //return $request;*/
    }

    public function password(User $user)
    {
        $act = Auth::id();
        if ($act == $user->id) {
        
            return view('users.password', compact('user'));
        
        }
        
        return abort(403);
    }

    public function passwordUpdate(UsersRequest $request, User $user)
    {
        if (Hash::check($request->input('password-antiguo'), Auth::user()->password)) {
            $user->where('email', '=', Auth::user()->email)
                ->update([
                    'name' => $request->input('name'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password-nuevo')),
                ]);

            return redirect()->to(route('user.show', Auth::id()))->with('status', 'Información actualizada con éxito');
        }
        else {

            return redirect()->to(route('user.password', Auth::id()))->with('password-antiguo', 'La contraseña no coincide con nuestros registros');
        }
    }

    public function rol(User $user)
    {
        $this->authorize('modificarRol', User::class);
        return view('users.rol', compact('user'));
    }

    public function rolUpdate(Request $request, User $user)
    {
        $this->authorize('modificarRol', User::class);
        $user->type = $request->input('rol');
        $user->where('id', '=', $request->id)
            ->update(['type' => $request->input('rol')]);

        return redirect()->to(route('user.index'))->with('status', 'Rol de usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);
        $user->delete();
        return redirect()->to(route('user.index'))->with('status', 'Usuario eliminado con éxito');
    }

}
