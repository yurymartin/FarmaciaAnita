<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\Http\Requests\EspecialidadFormRequest;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EspecialidadController extends Controller
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
        $especialidades = Especialidad::borrado()->get();
        return view('especialidades.index', ['especialidades' => $especialidades]);
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
    public function store(EspecialidadFormRequest $request)
    {
        $especialidad = new Especialidad();
        $especialidad->nombre = request('nombre');
        $especialidad->descripcion = request('descripcion');
        $especialidad->activo = request('activo');
        $especialidad->borrado = '0';
        $especialidad->save();
        Toastr::success('LA ESPECIALIDAD FUE REGISTRADO', '¡EXITO!');
        return redirect('/especialidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.show', ['especialidad' => $especialidad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.edit', ['especialidad' => $especialidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadFormRequest $request, $id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->nombre = request('nombre');
        $especialidad->descripcion = request('descripcion');
        $especialidad->save();
        Toastr::success('LA ESPECIALIDAD FUE ACTUALIZADA','¡EXITO!');
        return redirect('/especialidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->borrado = '1';
        $especialidad->save();
        Toastr::success('LA ESPECIALIDAD FUE ELIMINADA','¡EXITO!');
        return redirect('/especialidades');
    }

    public function altabaja($estado, $id)
    {
        $especialidad = Especialidad::findOrFail($id);
        if ($estado == '1') {
            $especialidad->activo = '0';
            $especialidad->save();
            Toastr::success('LA ESPECIALIDAD FUE DESACTIVADO','¡EXITO!');
        } else {
            $especialidad->activo = '1';
            Toastr::success('LA ESPECIALIDAD FUE ACTIVADO','¡EXITO!');
            $especialidad->save();
        }
        return redirect('/especialidades');
    }
}
