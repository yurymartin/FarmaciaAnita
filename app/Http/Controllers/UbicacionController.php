<?php

namespace App\Http\Controllers;

use App\Http\Requests\UbicacionFormRequest;
use App\Ubicacion;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class UbicacionController extends Controller
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
        $ubicaciones = Ubicacion::borrado()->get();
        return view('ubicaciones.index', ['ubicaciones' => $ubicaciones]);
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
    public function store(UbicacionFormRequest $request)
    {
        $ubicacion = new Ubicacion();
        $ubicacion->ubicacion = request('ubicacion');
        $ubicacion->descripcion = request('descripcion');
        $ubicacion->activo = request('activo');
        $ubicacion->borrado = '0';
        $ubicacion->save();
        Toastr::success('LA UBICACION FUE REGISTRADO','¡EXITO!');
        return redirect('/ubicaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicaciones = Ubicacion::findOrFail($id);
        return view('ubicaciones.show', ['ubicaciones' => $ubicaciones]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicaciones = Ubicacion::findOrFail($id);
        return view('ubicaciones.edit', ['ubicaciones' => $ubicaciones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UbicacionFormRequest $request, $id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->ubicacion = request('ubicacion');
        $ubicacion->descripcion = request('descripcion');
        $ubicacion->save();
        Toastr::success('LA UBICACION FUE ACTUALIZADA','¡EXITO!');
        return redirect('/ubicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->borrado = '1';
        $ubicacion->save();
        Toastr::success('LA UBICACION FUE ELIMINADO','¡EXITO!');
        return redirect('/ubicaciones');
    }

    public function altabaja($estado, $id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        if ($estado == '1') {
            $ubicacion->activo = '0';
            $ubicacion->save();
            Toastr::success('LA UBICACION FUE DESACTIVADO','¡EXITO!');
        } else {
            $ubicacion->activo = '1';
            Toastr::success('LA UBICACION FUE ACTIVADO','¡EXITO!');
            $ubicacion->save();
        }
        return redirect('/ubicaciones');
    }
    
}
