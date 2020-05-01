<?php

namespace App\Http\Controllers;

use App\Http\Requests\Producto_has_SintomaFormRequest;
use App\Producto;
use App\Producto_has_Sintoma;
use App\Sintoma;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class Producto_has_SintomaController extends Controller
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
        $productos_has_sintomas = Producto_has_Sintoma::get();
        $productos = Producto::borrado()->where('activo','1')->get();
        $sintomas = Sintoma::borrado()->where('activo','1')->get();
        return view('asistente.index', ['productos_has_sintomas' => $productos_has_sintomas, 'productos' => $productos, 'sintomas' => $sintomas]);
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
    public function store(Producto_has_SintomaFormRequest $request)
    {
        Producto_has_Sintoma::create($request->all());
        Toastr::success('LA RECETA FUE REGISTRADO', '¡EXITO!');
        return redirect('/asistente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto_has_sintoma = Producto_has_Sintoma::findOrFail($id);
        return view('asistente.show', compact('producto_has_sintoma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto_has_sintoma = Producto_has_Sintoma::findOrFail($id);
        $productos = Producto::borrado()->where('activo','1')->get();
        $sintomas = Sintoma::borrado()->where('activo','1')->get();
        return view('proveedores.edit', compact('producto_has_sintoma','productos','sintomas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Producto_has_SintomaFormRequest $request, $id)
    {
        $producto_has_sintoma = Producto_has_Sintoma::findOrFail($id);
        $producto_has_sintoma->intensidad = request('intensidad');
        $producto_has_sintoma->producto_id = request('producto_id');
        $producto_has_sintoma->sintoma_id = request('sintoma_id');
        $producto_has_sintoma->save();
        Toastr::success('LA RECETA FUE ACTUALIZADA', '¡EXITO!');
        return redirect('/asistente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto_has_sintoma = Producto_has_Sintoma::findOrFail($id);
        $producto_has_sintoma->delete();
        Toastr::warning('LA RECETA FUE ELIMINADA', '¡EXITO!');
        return redirect('/asistente');
    }
}
