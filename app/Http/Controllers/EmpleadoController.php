<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Especialidad;
use App\Http\Requests\EmpleadoFormRequest;
use App\Persona;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EmpleadoController extends Controller
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
        $empleados = Empleado::borrado()->get();
        $especialidades = Especialidad::borrado()->where('activo', '1')->get();
        return view('empleados.index', ['empleados' => $empleados, 'especialidades' => $especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoFormRequest $request)
    {
        $persona = new Persona();
        $persona->dni = request('dni');
        $persona->nombres = request('nombres');
        $persona->apellidos = request('apellidos');
        $persona->direccion = request('direccion');
        $persona->genero = request('genero');
        $persona->save();
        $empleado = new Empleado();
        if ($foto = Empleado::setFoto($request->foto)) {
            $request->request->add(['foto' => $foto]);
        }
        $nameFoto =  $foto;
        $empleado->activo = request('activo');
        $empleado->foto = $nameFoto;
        $empleado->sueldo = request('sueldo');
        $empleado->telefono = request('telefono');
        $empleado->borrado = '0';
        $empleado->persona_id = $persona->id;
        $empleado->especialidad_id = request('especialidad_id');
        Toastr::success('EL EMPLEADO FUE REGISTRADO', '¡EXITO!');
        $empleado->save();
        return redirect('/empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleados = Empleado::findOrFail($id);
        return view('empleados.show', ['empleados' => $empleados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoFormRequest $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $persona = Persona::findOrFail($empleado->persona_id);
        $persona->dni = request('dni');
        $persona->nombres = request('nombres');
        $persona->apellidos = request('apellidos');
        $persona->direccion = request('direccion');
        $persona->genero = request('genero');
        $persona->update();
        if ($request->foto){
            if ($foto = Empleado::setFoto($request->foto, $empleado->foto)) {
                $request->request->add(['foto' => $foto]);
                $nameFoto =  $foto;
                $empleado->foto = $nameFoto;
            }
        }
        $empleado->sueldo = request('sueldo');
        $empleado->telefono = request('telefono');
        $empleado->especialidad_id = request('especialidad_id');
        Toastr::success('EL EMPLEADO FUE ACTUALIZADO', '¡EXITO!');
        $empleado->save();
        return redirect('/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->borrado = '1';
        $empleado->save();
        Toastr::success('EL EMPLEADO FUE ELIMINADO', '¡EXITO!');
        return redirect('/empleados');
    }

    public function altabaja($estado, $id)
    {
        $empleado = Empleado::findOrFail($id);
        if ($estado == '1') {
            $empleado->activo = '0';
            $empleado->save();
            Toastr::success('EL EMPLEADO FUE DESACTIVADO', '¡EXITO!');
        } else {
            $empleado->activo = '1';
            Toastr::success('EL EMPLEADO FUE ACTIVADO', '¡EXITO!');
            $empleado->save();
        }
        return redirect('/empleados');
    }
}

