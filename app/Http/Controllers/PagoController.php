<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagoFormRequest;
use App\Pago;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PagoController extends Controller
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
        $pagos = Pago::borrado()->get();
        return view('pagos.index', compact('pagos'));
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
    public function store(PagoFormRequest $request)
    {
        Pago::create($request->all());
        Toastr::success('EL TIPO DE PAGO FUE REGISTRADO', '¡EXITO!');
        return redirect('/pagos');
        Toastr::clear();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return view('pagos.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::findOrFail($id);
        return view('pagos.edit', compact('pago'));
        Toastr::clear();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagoFormRequest $request, $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->tipo = request('tipo');
        $pago->desc = request('desc');
        $pago->update();
        Toastr::success('EL TIPO DE PAGO FUE ACTUALIZADA', '¡EXITO!');
        return redirect('/pagos');
        Toastr::clear();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->borrado = '1';
        $pago->update();
        Toastr::warning('EL TIPO DE PAGO FUE ELIMINADO', '¡EXITO!');
        return redirect('/pagos');
    }

    public function altabaja($estado, $id)
    {
        $pago = Pago::findOrFail($id);
        if ($estado == '1') {
            $pago->activo = '0';
            $pago->update();
            Toastr::warning('EL TIPO DE PAGO FUE DESACTIVADO', '¡EXITO!');
        } else {
            $pago->activo = '1';
            Toastr::success('EL TIPO DE PAGO FUE ACTIVADO', '¡EXITO!');
            $pago->save();
        }
        return redirect('/pagos');
    }
}
