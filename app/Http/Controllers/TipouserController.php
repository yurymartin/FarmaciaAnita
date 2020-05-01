<?php

namespace App\Http\Controllers;

use App\Tipouser;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class TipouserController extends Controller
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
        $tipousers = Tipouser::borrado()->get();
        return view('tipousers.index', compact('tipousers'));
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
    public function store(Request $request)
    {
        Tipouser::create($request->all());
        Toastr::success('EL TIPO DE USUARIO FUE REGISTRADO', '¡EXITO!');
        return redirect('/tipousers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipouser = Tipouser::findOrFail($id);
        return view('tipousers.show', compact('tipouser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipouser = Tipouser::findOrFail($id);
        return view('tipousers.edit', compact('tipouser'));
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
        $tipousers = Tipouser::findOrFail($id);
        $tipousers->tipo = request('tipo');
        $tipousers->desc = request('desc');
        $tipousers->update();
        Toastr::success('EL TIPO DE USUARIO FUE ACTUALIZADO', '¡EXITO!');
        return redirect('/tipousers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipousers = Tipouser::findOrFail($id);
        $tipousers->borrado = '1';
        $tipousers->update();
        Toastr::success('EL TIPO DE USUARIO FUE ELIMINADO', '¡EXITO!');
        return redirect('/tipousers');
    }

    public function altabaja($estado, $id)
    {
        $tipousers = Tipouser::findOrFail($id);
        if ($estado == '1') {
            $tipousers->activo = '0';
            $tipousers->update();
            Toastr::warning('EL TIPO DE USUARIO FUE DESACTIVADO', '¡EXITO!');
        } else {
            $tipousers->activo = '1';
            Toastr::warning('EL TIPO DE USUARIO  FUE ACTIVADO', '¡EXITO!');
            $tipousers->update();
        }
        return redirect('/tipousers');
    }
}
