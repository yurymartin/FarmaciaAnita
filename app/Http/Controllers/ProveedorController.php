<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorFormRequest;
use App\Proveedor;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProveedorController extends Controller
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
        $proveedores = Proveedor::borrado()->get();
        return view('proveedores.index',compact('proveedores'));
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
    public function store(ProveedorFormRequest $request)
    {
        Proveedor::create($request->all());
        Toastr::success('EL PROVEEDOR FUE REGISTRADO', '¡EXITO!');
        return redirect('/proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->ruc = request('ruc');
        $proveedor->nombre = request('nombre');
        $proveedor->telefono = request('telefono');
        $proveedor->email = request('email');
        $proveedor->direccion = request('direccion');
        $proveedor->descripcion = request('descripcion');
        $proveedor->save();
        Toastr::success('EL PROVEEDOR FUE ACTUALIZADO', '¡EXITO!');
        return redirect('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->borrado = '1';
        $proveedor->save();
        Toastr::warning('EL PROVEEDOR FUE ELIMINADO', '¡EXITO!');
        return redirect('/proveedores');
    }

    public function altabaja($estado, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        if ($estado == '1') {
            $proveedor->activo = '0';
            $proveedor->save();
            Toastr::warning('EL PROVEEDOR FUE DESACTIVADO','¡EXITO!');
        } else {
            $proveedor->activo = '1';
            Toastr::warning('EL PROVEEDOR FUE ACTIVADO','¡EXITO!');
            $proveedor->save();
        }
        return redirect('/proveedores');
    }
}
