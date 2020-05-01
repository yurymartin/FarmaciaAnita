<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoFormRequest;
use App\Producto;
use App\Tipo_Producto;
use App\Ubicacion;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
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
        $productos = Producto::borrado()->get();
        $tipo_productos = Tipo_Producto::borrado()->where('activo', '1')->get();
        $ubicaciones = Ubicacion::borrado()->where('activo', '1')->get();
        return view('productos.index', ['productos' => $productos, 'tipo_productos' => $tipo_productos, 'ubicaciones' => $ubicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_productos = Tipo_Producto::borrado()->where('activo', '1')->get();
        $ubicaciones = Ubicacion::borrado()->where('activo', '1')->get();
        return view('productos.index', ['tipo_productos' => $tipo_productos, 'ubicaciones' => $ubicaciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoFormRequest $request)
    {
        $producto = new Producto();
        if ($imagen = Producto::setImagen($request->imagen)) {
            $request->request->add(['imagen' => $imagen]);
        }
        $nombreImg =  $imagen;
        $producto->codigo = request('codigo');
        $producto->nom = request('nom');
        $producto->desc = request('desc');
        $producto->nom_generico = request('nom_generico');
        $producto->imagen = $nombreImg;
        $producto->stock = 0;
        $producto->fec_cad = request('fec_cad');
        $producto->activo = request('activo');
        $producto->borrado = '0';
        $producto->tipo_id = request('tipo_id');
        $producto->ubicacion_id = request('ubicacion_id');
        Toastr::success('EL PRODUCTO FUE REGISTRADO', '¡EXITO!');
        $producto->save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Producto::findOrFail($id);
        return view('productos.show', ['productos' => $productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::findOrFail($id);
        return view('productos.show', ['productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoFormRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        if ($imagen = Producto::setImagen($request->imagen, $producto->imagen)) {
            $request->request->add(['imagen' => $imagen]);
        }
        $nombreImg =  $imagen;
        $producto->codigo = request('codigo');
        $producto->nom = request('nom');
        $producto->desc = request('desc');
        $producto->nom_generico = request('nom_generico');
        $producto->imagen = $nombreImg;
        $producto->fec_cad = request('fec_cad');
        $producto->tipo_id = request('tipo_id');
        $producto->ubicacion_id = request('ubicacion_id');
        Toastr::success('EL PRODUCTO FUE ACTUALIZADO', '¡EXITO!');
        $producto->save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->borrado = '1';
        $producto->save();
        Toastr::success('LA PRODUCTO FUE ELIMINADO', '¡EXITO!');
        return redirect('/productos');
    }

    public function altabaja($estado, $id)
    {
        $producto = Producto::findOrFail($id);
        if ($estado == '1') {
            $producto->activo = '0';
            $producto->save();
            Toastr::success('LA PRODUCTO FUE DESACTIVADO', '¡EXITO!');
        } else {
            $producto->activo = '1';
            Toastr::success('LA PRODUCTO FUE ACTIVADO', '¡EXITO!');
            $producto->save();
        }
        return redirect('/productos');
    }
}
