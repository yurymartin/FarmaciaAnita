<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Http\Requests\UserFormRequest;
use App\Tipouser;
use App\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::borrado()->get();
        $tipousers = Tipouser::borrado()->get();
        $empleados = Empleado::borrado()->get();
        return view('users.index', compact('users', 'tipousers', 'empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->activo = request('activo');
        $user->borrado = request('borrado');
        $user->tipouser_id = request('tipouser_id');
        $user->empleado_id = request('empleado_id');
        $user->save();
        Toastr::success('EL USUARIO FUE REGISTRADO', '¡EXITO!');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $tipousers = Tipouser::borrado()->where('activo', '1')->get();
        $empleados = Empleado::borrado()->where('activo', '1')->get();
        return view('users.edit', ['user' => $user, 'tipousers' => $tipousers, 'empleados' => $empleados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->tipouser_id = request('tipouser_id');
        $user->empleado_id = request('empleado_id');
        $user->update();
        Toastr::success('EL USUARIO FUE REGISTRADO', '¡EXITO!');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (request('password') == request('password_confirmation')) {
            $user = User::findOrFail($id);
            $user->password = bcrypt(request('password'));
            $user->update();
            Toastr::success('SE CAMBIO EL PASSWORD DEL USUARIO', '¡EXITO!');
            return redirect('/users');
        }else{
            Toastr::error('NO CONCIDEN EL PASSWORD DE CONFIRMACION', 'ERROR');
            return redirect('/users');
        }
    }

    public function altabaja($estado, $id)
    {
        $user = User::findOrFail($id);
        if ($estado == '1') {
            $user->activo = '0';
            $user->update();
            Toastr::warning('EL USUARIO FUE DESACTIVADO', '¡EXITO!');
        } else {
            $user->activo = '1';
            Toastr::warning('EL USUARIO FUE ACTIVADO', '¡EXITO!');
            $user->update();
        }
        return redirect('/users');
    }
}
