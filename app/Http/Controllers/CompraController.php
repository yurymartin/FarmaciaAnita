<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Detalle_Compra;
use App\Estado_Compra;
use App\Http\Requests\CompraFormRequest;
use App\Producto;
use App\Proveedor;
use App\Tipo_Comprobante;
use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class CompraController extends Controller
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
        $compras = Compra::borrado()->orderBy('id','desc')->get();
        $proveedores = Proveedor::borrado()->where('activo', '1')->get();
        $tipo_comprobantes = Tipo_Comprobante::borrado()->where('activo', '1')->get();
        $estado_compras = Estado_Compra::borrado()->where('activo', '1')->get();
        $productos = Producto::borrado()->where('activo', '1')->get();
        return view("compras.index", compact('compras', 'proveedores', 'tipo_comprobantes', 'estado_compras', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::borrado()->where('activo', '1')->get();
        $tipo_comprobantes = Tipo_Comprobante::borrado()->where('activo', '1')->get();
        return view("compras.create", compact('proveedores', 'tipo_comprobantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $compra = new Compra;
            $compra->monto_total = ((int)(request('total_hidden') + ((int)request('total_hidden')) * (0.18)));
            $compra->igv = '0.18';
            $compra->serie_comprobante = request('serie_comprobante');
            $compra->num_comprobante = request('num_comprobante');
            $compra->activo = '1';
            $compra->borrado = request('borrado');
            $compra->proveedor_id = request('proveedor_id');
            $compra->estado_compra_id = request('estado_compra_id');
            $compra->tipo_comprobante_id = request('tipo_comprobante_id');
            $compra->save();

            $producto_id = $request->get('producto_id');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;
            while ($cont < count($producto_id)) {
                $detalle = new Detalle_Compra();
                $detalle->compra_id = $compra->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_compra = $precio_compra[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        Toastr::success('LA COMPRA FUE REGISTRADA', '¡EXITO!');
        return redirect('/compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        $detalles = Detalle_Compra::where('compra_id', $id)->get();
        return view("compras.show", compact('compra', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compras = Compra::findOrFail($id);
        $compras->estado_compra_id = request('estado_compra_id');
        $compras->update();
        Toastr::success('LA COMPRA CAMBIO DE ESTADO', '¡EXITO!');
        return redirect('/compras');
    }
}
