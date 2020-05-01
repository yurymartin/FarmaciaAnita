<?php

namespace App\Http\Controllers;

use App\Estado_Venta;
use App\Http\Requests\Estado_VentaFormRequest;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class Estado_VentaController extends Controller
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
        $estado_ventas = Estado_Venta::borrado()->get();
        return view("estado_ventas.index", compact('estado_ventas'));
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
    public function store(Estado_VentaFormRequest $request)
    {
        Estado_Venta::create($request->all());
        Toastr::success('EL ESTADO DE VENTA FUE REGISTRADO', '¡EXITO!');
        return redirect('/estado_ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado_venta = Estado_Venta::findOrFail($id);
        return view('estado_ventas.show', compact('estado_venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado_venta = Estado_Venta::findOrFail($id);
        return view('estado_ventas.edit', compact('estado_venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Estado_VentaFormRequest $request, $id)
    {
        $estado_venta = Estado_Venta::findOrFail($id);
        $estado_venta->estado = request('estado');
        $estado_venta->desc = request('desc');
        $estado_venta->save();
        Toastr::success('EL ESTADO DE VENTA FUE ACTUALIZADA', '¡EXITO!');
        return redirect('/estado_ventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_venta = Estado_Venta::findOrFail($id);
        $estado_venta->borrado = '1';
        $estado_venta->save();
        Toastr::warning('EL ESTADO DE VENTA FUE ELIMINADO', '¡EXITO!');
        return redirect('/estado_ventas');
    }

    public function altabaja($estado, $id)
    {
        $estado_venta = Estado_Venta::findOrFail($id);
        if ($estado == '1') {
            $estado_venta->activo = '0';
            $estado_venta->save();
            Toastr::warning('EL ESTADO DE VENTA FUE DESACTIVADO', '¡EXITO!');
        } else {
            $estado_venta->activo = '1';
            Toastr::warning('EL ESTADO DE VENTA FUE ACTIVADO', '¡EXITO!');
            $estado_venta->save();
        }
        return redirect('/estado_ventas');
    }
}
