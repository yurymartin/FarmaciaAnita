@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">DETALLES DE LA VENTA</h4>
        <a href="/proveedores" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class=" row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="proveedor">Cliente:</label>
                    <p>{{$venta->clientes->personas->nombres}} {{$venta->clientes->personas->apellidos}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Tipo Comprobante:</label>
                    <p>{{$venta->tipo_comprobantes->tipo}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Serie Comprobante:</label>
                    <p>{{$venta->serie_comprobante}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Numero Comprobante:</label>
                    <p>{{$venta->num_comprobante}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Tipo Pago:</label>
                    <p>{{$venta->pagos->tipo}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Estado Venta:</label>
                    <p><span class="badge badge-success">{{$venta->estado_ventas->estado}}</span></p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="proveedor">Empleado:</label>
                    <p>{{$venta->empleados->personas->nombres}} {{$venta->empleados->personas->apellidos}}</p>
                </div>
            </div>
            <div class="col-md-12">
                <table id="tabla_compra" class="table table-bordered table-striped text-xs">
                    <thead class="bg-info">
                        <tr>
                            <th style="width: 25%">PRODUCTO</th>
                            <th style="width: 20%">CANTIDAD</th>
                            <th style="width: 20%">PRECIO VENTA</th>
                            <th style="width: 20%">DESCUENTO</th>
                            <th style="width: 10%">SUBTOTAL</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                        <tr>
                            <td>{{$detalle->productos->nom}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->precio_venta}}</td>
                            <td>{{$detalle->descuento}}</td>
                            <td>{{$detalle->cantidad * $detalle->precio_venta-$detalle->descuento}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-sm">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right" >SUB MONTO:</th>
                            <th><h4 id="total" class="text-sm"><b>S/.{{$venta->total_venta}}</b></h4></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right" >IMPUESTO:</th>
                            <th><h4 id="total" class="text-sm"><b>S/.{{$venta->igv*$venta->total_venta}}</b></h4></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right" >MONTO TOTAL:</th>
                            <th><h4 id="total" class="text-sm"><b>S/.{{$venta->total_venta+($venta->total_venta*$venta->igv)}}</b></h4></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection