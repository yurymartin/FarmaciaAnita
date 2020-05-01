<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tipo_ProductoFormRequest;
use App\Tipo_Producto;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class Tipo_ProductoController extends Controller
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
            $tipoproductos = Tipo_Producto::borrado()->get();
            return view('tipo_productos.index', ['tipoproductos' => $tipoproductos]);
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
    public function store(Tipo_ProductoFormRequest $request)
    {
        $tipoproductos = new Tipo_Producto();
        $tipoproductos->nom = request('nom');
        $tipoproductos->desc = request('desc');
        $tipoproductos->activo = request('activo');
        $tipoproductos->borrado = '0';
        $tipoproductos->save();
        Toastr::success('EL TIPO DE PRODUCTO FUE REGISTRADO','¡EXITO!');
        return redirect('/tipoproductos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoproductos = Tipo_Producto::findOrFail($id);
        return view('tipo_productos.show', ['tipoproductos' => $tipoproductos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoproductos = Tipo_Producto::findOrFail($id);
        return view('tipo_productos.edit', ['tipoproductos' => $tipoproductos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tipo_ProductoFormRequest $request, $id)
    {
        $tipoproductos = Tipo_Producto::findOrFail($id);
        $tipoproductos->nom = request('nom');
        $tipoproductos->desc = request('desc');
        $tipoproductos->save();
        Toastr::success('EL TIPO DE PRODUCTO FUE ACTUALIZADO','¡EXITO!');
        return redirect('/tipoproductos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoproductos = Tipo_Producto::findOrFail($id);
        $tipoproductos->borrado = '1';
        $tipoproductos->save();
        Toastr::success('EL TIPO DE PRODUCTO FUE ELIMINADO','¡EXITO!');
        return redirect('/tipoproductos');
    }

    public function altabaja($estado, $id)
    {
        $tipoproductos = Tipo_Producto::findOrFail($id);
        if ($estado == '1') {
            $tipoproductos->activo = '0';
            $tipoproductos->save();
            Toastr::success('EL TIPO DE PRODUCTO FUE DESACTIVADO','¡EXITO!');
        } else {
            $tipoproductos->activo = '1';
            Toastr::success('EL TIPO DE PRODUCTO FUE ACTIVADO','¡EXITO!');
            $tipoproductos->save();
        }
        return redirect('/tipoproductos');
    }
}
