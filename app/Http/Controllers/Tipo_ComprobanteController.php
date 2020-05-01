<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tipo_ComprobanteFormRequest;
use App\Tipo_Comprobante;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class Tipo_ComprobanteController extends Controller
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
        $tipo_comprobantes = Tipo_Comprobante::borrado()->get();
        return view("tipo_comprobantes.index", compact('tipo_comprobantes'));
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
    public function store(Tipo_ComprobanteFormRequest $request)
    {
        Tipo_Comprobante::create($request->all());
        Toastr::success('EL TIPO DE COMPROBANTES FUE REGISTRADO', '¡EXITO!');
        return redirect('/compras/tipo_comprobantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_comprobante = Tipo_Comprobante::findOrFail($id);
        return view('tipo_comprobantes.show', compact('tipo_comprobante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_comprobante = Tipo_Comprobante::findOrFail($id);
        return view('tipo_comprobantes.edit', compact('tipo_comprobante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tipo_ComprobanteFormRequest $request, $id)
    {
        $tipo_comprobante = Tipo_Comprobante::findOrFail($id);
        $tipo_comprobante->tipo = request('tipo');
        $tipo_comprobante->desc = request('desc');
        $tipo_comprobante->save();
        Toastr::success('EL TIPO DE COMPROBANTES FUE ACTUALIZADO', '¡EXITO!');
        return redirect('/compras/tipo_comprobantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_comprobante = Tipo_Comprobante::findOrFail($id);
        $tipo_comprobante->borrado = '1';
        $tipo_comprobante->save();
        Toastr::warning('EL TIPO DE COMPROBANTES FUE ELIMINADO', '¡EXITO!');
        return redirect('/compras/tipo_comprobantes');
    }

    public function altabaja($estado, $id)
    {
        $tipo_comprobante = Tipo_Comprobante::findOrFail($id);
        if ($estado == '1') {
            $tipo_comprobante->activo = '0';
            Toastr::warning('EL TIPO DE COMPROBANTES FUE DESACTIVADO', '¡EXITO!');
            $tipo_comprobante->save();
        } else {
            $tipo_comprobante->activo = '1';
            Toastr::success('EL TIPO DE COMPROBANTES FUE ACTIVADO', '¡EXITO!');
            $tipo_comprobante->save();
        }
        return redirect('/compras/tipo_comprobantes');
    }
}
