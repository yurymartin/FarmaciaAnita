<?php

namespace App\Http\Controllers;

use App\Estado_Compra;
use App\Http\Requests\Estado_CompraFormRequest;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class Estado_CompraController extends Controller
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
        $estado_compras = Estado_Compra::borrado()->get();
        return view("estado_compras.index", compact('estado_compras'));
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
    public function store(Estado_CompraFormRequest $request)
    {
        Estado_Compra::create($request->all());
        Toastr::success('EL ESTADO DE COMPRA FUE REGISTRADO', '¡EXITO!');
        return redirect('/estado_compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado_compra = Estado_Compra::findOrFail($id);
        return view('estado_compras.show', compact('estado_compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado_compra = Estado_Compra::findOrFail($id);
        return view('estado_compras.edit', compact('estado_compra'));
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
        $estado_compra = Estado_Compra::findOrFail($id);
        $estado_compra->estado = request('estado');
        $estado_compra->descripcion = request('descripcion');
        $estado_compra->save();
        Toastr::success('EL ESTADO DE COMPRA FUE ACTUALIZADA', '¡EXITO!');
        return redirect('/estado_compras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_compra = Estado_Compra::findOrFail($id);
        $estado_compra->borrado = '1';
        $estado_compra->save();
        Toastr::warning('EL ESTADO DE COMPRA FUE ELIMINADO', '¡EXITO!');
        return redirect('/estado_compras');
    }

    public function altabaja($estado, $id)
    {
        $estado_compra = Estado_Compra::findOrFail($id);
        if ($estado == '1') {
            $estado_compra->activo = '0';
            $estado_compra->save();
            Toastr::warning('EL ESTADO DE COMPRA FUE DESACTIVADO','¡EXITO!');
        } else {
            $estado_compra->activo = '1';
            Toastr::warning('EL ESTADO DE COMPRA FUE ACTIVADO','¡EXITO!');
            $estado_compra->save();
        }
        return redirect('/estado_compras');
    }
}
