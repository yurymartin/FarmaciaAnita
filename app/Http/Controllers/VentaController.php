<?php


namespace App\Http\Controllers;

ini_set('max_execution_time', 100);

use App\Cliente;
use App\DetalleVenta;
use App\Estado_Venta;
use App\Http\Requests\VentaFormRequest;
use App\Pago;
use App\Persona;
use App\Producto;
use App\Tipo_Comprobante;
use App\Venta;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Barryvdh\DomPDF\Facade as PDF;

class VentaController extends Controller
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
        $ventas = Venta::borrado()->orderBy('id', 'desc')->get();
        $pagos = Pago::borrado()->where('activo', '1')->get();
        $clientes = Cliente::borrado()->where('activo', '1')->get();
        $tipo_comprobantes = Tipo_Comprobante::borrado()->where('activo', '1')->get();
        $estado_ventas = Estado_Venta::borrado()->where('activo', '1')->get();
        //$productos = Producto::borrado()->where('activo', '1')->get();
        $productos = DB::table('productos as p')
            ->join('detalle_compras as di', 'p.id', '=', 'di.producto_id')
            ->join('ubicaciones as u', 'p.ubicacion_id', '=', 'u.id')
            ->select(DB::raw('CONCAT(p.codigo, " ", p.nom) as producto'), 'p.id', 'p.stock', DB::raw('FORMAT(avg(di.precio_venta),1) as precio_promedio', 'p.'), 'u.ubicacion')
            ->where('p.stock', '>', '0')
            ->groupBy('producto', 'p.id', 'p.stock', 'u.ubicacion')
            ->get();
        return view("ventas.index", compact('ventas', 'pagos', 'clientes', 'tipo_comprobantes', 'estado_ventas', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagos = Pago::borrado()->where('activo', '1')->get();
        $clientes = Cliente::borrado()->where('activo', '1')->get();
        $tipo_comprobantes = Tipo_Comprobante::borrado()->where('activo', '1')->get();
        $estado_ventas = Estado_Venta::borrado()->where('activo', '1')->get();
        //$productos = Producto::borrado()->where('activo', '1')->where('stock', '>', '0')->get();

        $productos = DB::table('productos as p')
            ->join('detalle_ingreso as di', 'p.id', '=', 'di.producto_id')
            ->select(DB::raw('CONCAT(p.codigo, " ", p.nom) as producto'), 'p.producto_id', 'p.stock', DB::raw('avg(di.precio_venta) as precio_promedio'))
            ->where('p.estado', '=', 'Activo')
            ->where('p.stock', '>', '0')
            ->groupBy('producto', 'p.producto_id', 'p.stock')
            ->get();
        return view("ventas.index", compact('pagos', 'clientes', 'tipo_comprobantes', 'estado_ventas', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaFormRequest $request)
    {
        try {
            $num_comprobante = '';
            if (request('tipo_comprobante_id') == '1') {
                $ultima_venta = Venta::where('tipo_comprobante_id', 'LIKE', '%1%')->orderBy('id', 'DESC')->first();
            } else if (request('tipo_comprobante_id') == '2') {
                $ultima_venta = Venta::where('tipo_comprobante_id', 'LIKE', '%2%')->orderBy('id', 'DESC')->first();
            }
            if ($ultima_venta) {
                $ult_id = (int) $ultima_venta->num_comprobante;
                $serie_comprobante = $ultima_venta->serie_comprobante;
            } else {
                $ult_id = 0;
                if (request('tipo_comprobante_id') == '1') {
                    $serie_comprobante = 'B-001';
                } else if (request('tipo_comprobante_id') == '2') {
                    $serie_comprobante = 'F-001';
                }
            }
            if ($ult_id >= 0 && $ult_id < 10) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '000000000' . $ult_id;
            } else if ($ult_id >= 10 && $ult_id < 100) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '00000000' . $ult_id;
            } else if ($ult_id >= 100 && $ult_id < 1000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '0000000' . $ult_id;
            } else if ($ult_id >= 1000 && $ult_id < 10000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '000000' . $ult_id;
            } else if ($ult_id >= 10000 && $ult_id < 100000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '00000' . $ult_id;
            } else if ($ult_id >= 100000 && $ult_id < 1000000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '0000' . $ult_id;
            } else if ($ult_id >= 1000000 && $ult_id < 10000000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '000' . $ult_id;
            } else if ($ult_id >= 10000000 && $ult_id < 100000000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '00' . $ult_id;
            } else if ($ult_id >= 100000000 && $ult_id < 1000000000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = '0' . $ult_id;
            } else if ($ult_id >= 1000000000 && $ult_id < 10000000000) {
                $ult_id = $ult_id + 1;
                $num_comprobante = $ult_id;
            } else if ($ult_id > 10000000000) {
                if (request('tipo_comprobante_id') == '1') {
                    $serie_comprobante = 'B-002';
                } else {
                    $serie_comprobante = 'F-002';
                }
                $num_comprobante = '00000000001';
            }


            DB::beginTransaction();
            $venta = new Venta;
            $venta->serie_comprobante = $serie_comprobante;
            $venta->num_comprobante = $num_comprobante;
            $venta->total_venta = request('total_venta');
            $venta->igv = '0.18';
            $venta->activo = request('activo');
            $venta->borrado = request('borrado');
            $venta->pago_id = request('pago_id');
            $venta->tipo_comprobante_id = request('tipo_comprobante_id');
            $venta->cliente_id = request('cliente_id');
            $venta->empleado_id = request('empleado_id');
            $venta->estado_venta_id = request('estado_venta_id');
            $venta->save();

            $producto_id = $request->get('producto_id');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;
            while ($cont < count($producto_id)) {
                $detalle = new DetalleVenta();
                $detalle->venta_id = $venta->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->descuento = $descuento[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }
            DB::commit();
            Toastr::success('LA VENTA FUE REGISTRADA', '¡EXITO!');
            // return redirect('/ventas');
            return redirect()->route('ventas.boleta', [$venta->id]);
        } catch (Exception $e) {
            DB::rollback();
            Debugbar::addThrowable($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        $detalles = DetalleVenta::where('venta_id', $id)->get();
        return view("ventas.show", compact('venta', 'detalles'));
    }

    public function boleta($id)
    {
        $venta = Venta::findOrFail($id);
        $detalles = DetalleVenta::where('venta_id', $id)->get();
        $pdf = PDF::loadView('ventas.boleta', compact('venta', 'detalles'))->setPaper(array(0, 0, 220, 500), "letter");
        return $pdf->stream('boleta.pdf');
        //return view('ventas.boleta', compact('venta','detalles'));
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
        return redirect('/ventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->estado_venta_id = request('estado_venta_id');
        $venta->update();
        Toastr::success('LA VENTA CAMBIO DE ESTADO', '¡EXITO!');
        return redirect('/ventas');
    }
}
