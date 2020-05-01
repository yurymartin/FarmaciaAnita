<?php

namespace App\Http\Controllers;

use App\Http\Requests\SintomaFormRequest;
use App\Sintoma;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SintomaController extends Controller
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
        $sintomas = Sintoma::borrado()->get();
        return view('sintomas.index', ['sintomas' => $sintomas]);
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
    public function store(SintomaFormRequest $request)
    {
        $sintoma = new Sintoma();
        $sintoma->nombre = request('nombre');
        $sintoma->desc = request('desc');
        $sintoma->activo = request('activo');
        $sintoma->borrado = '0';
        $sintoma->save();
        Toastr::success('LA ENFERMEDAD FUE REGISTRADO', '¡EXITO!');
        return redirect('/sintomas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sintomas = Sintoma::findOrFail($id);
        return view('sintomas.show', ['sintomas' => $sintomas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sintomas = Sintoma::findOrFail($id);
        return view('sintomas.edit', ['sintomas' => $sintomas]);
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
        $sintoma = Sintoma::findOrFail($id);
        $sintoma->nombre = request('nombre');
        $sintoma->desc = request('desc');
        $sintoma->save();
        Toastr::success('LA ENFERMEDAD FUE ACTUALIZADA', '¡EXITO!');
        return redirect('/sintomas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sintoma = Sintoma::findOrFail($id);
        $sintoma->borrado = '1';
        $sintoma->save();
        Toastr::success('LA ENFERMEDAD FUE ELIMINADO','¡EXITO!');
        return redirect('/sintomas');
    }

    public function altabaja($estado, $id)
    {
        $sintoma = Sintoma::findOrFail($id);
        if ($estado == '1') {
            $sintoma->activo = '0';
            $sintoma->save();
            Toastr::success('LA ENFERMEDAD FUE DESACTIVADO','¡EXITO!');
        } else {
            $sintoma->activo = '1';
            Toastr::success('LA ENFERMEDAD FUE ACTIVADO','¡EXITO!');
            $sintoma->save();
        }
        return redirect('/sintomas');
    }
}
