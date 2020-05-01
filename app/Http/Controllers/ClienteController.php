<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteFormRequest;
use App\Persona;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ClienteController extends Controller
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
        $clientes = Cliente::borrado()->get();
        return view('clientes.index', compact('clientes'));
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
    public function store(ClienteFormRequest $request)
    {
        $persona = new Persona();
        $persona->dni = request('dni');
        $persona->nombres = request('nombres');
        $persona->apellidos = request('apellidos');
        $persona->direccion = request('direccion');
        $persona->genero = request('genero');
        $persona->save();
        $cliente = new Cliente();
        $cliente->activo = request('activo');
        $cliente->borrado = request('borrado');
        $cliente->persona_id = $persona->id;
        Toastr::success('EL CLIENTE FUE REGISTRADO', '¡EXITO!');
        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $persona = Persona::findOrFail($cliente->persona_id);
        $persona->dni = request('dni');
        $persona->nombres = request('nombres');
        $persona->apellidos = request('apellidos');
        $persona->direccion = request('direccion');
        $persona->genero = request('genero');
        Toastr::success('EL CLIENTE FUE ACTUALIZADO', '¡EXITO!');
        $persona->update();
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->borrado = '1';
        Toastr::warning('EL CLIENTE FUE ELIMINADO', '¡EXITO!');
        $cliente->update();
        return redirect('/clientes');
    }

    public function altabaja($estado, $id)
    {
        $cliente = Cliente::findOrFail($id);
        if ($estado == '1') {
            $cliente->activo = '0';
            $cliente->update();
            Toastr::success('EL CLIENTE FUE DESACTIVADO', '¡EXITO!');
        } else {
            $cliente->activo = '1';
            Toastr::success('EL CLIENTE FUE ACTIVADO', '¡EXITO!');
            $cliente->update();
        }
        return redirect('/clientes');
    }
}
