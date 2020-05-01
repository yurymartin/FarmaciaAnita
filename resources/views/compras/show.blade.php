@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles del Proveedor</h4>
        <a href="/proveedores" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class=" row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="proveedor">Proveedor:</label>
                    <p>{{$compra->proveedores->nombre}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Tipo Comprobante:</label>
                    <p>{{$compra->tipo_comprobantes->tipo}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Serie Comprobante:</label>
                    <p>{{$compra->serie_comprobante}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Numero Comprobante:</label>
                    <p>{{$compra->num_comprobante}}</p>
                </div>
            </div>
            <div class="col-md-12">
                <table id="tabla_compra" class="table table-bordered table-striped text-xs">
                    <thead class="bg-info">
                        <tr>
                            <th style="width: 25%">PRODUCTO</th>
                            <th style="width: 20%">CANTIDAD</th>
                            <th style="width: 20%">PRECIO COMPRA</th>
                            <th style="width: 20%">PRECIO VENTA</th>
                            <th style="width: 10%">SUBTOTAL</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                        <tr>
                            <td>{{$detalle->productos->nom}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->precio_compra}}</td>
                            <td>{{$detalle->precio_venta}}</td>
                            <td>{{$detalle->cantidad * $detalle->precio_compra}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-xs">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right text-lg" >SUB MONTO:</th>
                            <th><h4 id="total"><b>S/.{{$compra->monto_total}}</b></h4></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right text-lg" >IMPUESTO:</th>
                            <th><h4 id="total"><b>S/.{{$compra->igv*$compra->monto_total}}</b></h4></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right text-lg" >MONTO TOTAL:</th>
                            <th><h4 id="total"><b>S/.{{$compra->monto_total+($compra->monto_total*$compra->igv)}}</b></h4></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection