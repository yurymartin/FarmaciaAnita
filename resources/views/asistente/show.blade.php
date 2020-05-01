@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">DETALLES DE LA RECETA MEDICA</h4>
        <a href="/asistente" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">DETALLES DE LA ENFERMEDAD</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr><td><h5><b>Nombre: </b><small class="text-muted">{{$producto_has_sintoma->sintomas->nombre}}</small></h5></td></tr>
                                <tr><td><h5><b>Descripcion: </b><small class="text-muted">{{$producto_has_sintoma->sintomas->desc}}</small></h5></td></tr>
                                <tr><td><h5><b>Creacion Registro: </b><small class="text-muted">{{$producto_has_sintoma->sintomas->created_at}}</small></h5></td></tr>
                                <tr><td><h5><b>Actualizacion Registro: </b><small class="text-muted">{{$producto_has_sintoma->sintomas->updated_at}}</small></h5></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">DETALLES DEL PRODUCTO PARA LA ENFERMEDAD</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr><td><h5 class="text-info"><b>EFECTIVADA ANTE LA ENFERMEDAD: </b><b>{{$producto_has_sintoma->intensidad}}%</b></h5></td></tr>
                                <tr><td><h5><b>Codigo: </b><small class="text-muted">{{$producto_has_sintoma->productos->codigo}}</small></h5></td></tr>
                                <tr><td><h5><b>Nombre: </b><small class="text-muted">{{$producto_has_sintoma->productos->nom}}</small></h5></td></tr>
                                <tr><td><h5><b>Nombre: </b><small class="text-muted">{{$producto_has_sintoma->productos->desc}}</small></h5></td></tr>
                                <tr><td><h5><b>Stock: </b><small class="text-muted">{{$producto_has_sintoma->productos->stock}}</small></h5></td></tr>
                                <tr><td><h5><b>Precio: </b><small class="text-muted">{{$producto_has_sintoma->productos->precio_venta}}</small></h5></td></tr>
                                <tr><td><h5><b>Tipo Producto: </b><small class="text-muted">{{$producto_has_sintoma->productos->tipo_producto->nom}}</small></h6></td></tr>
                                <tr><td><h5><b>Ubicación: </b><small class="text-muted">{{$producto_has_sintoma->productos->ubicacion->ubicacion}}</small></h6></td></tr>
                                <tr><td><h5><b>Imagen: </b></h5><img src="{{ asset('img/productos/'.$producto_has_sintoma->productos->imagen) }}" alt="{{$producto_has_sintoma->productos->imagen}}"></td></tr>
                                <tr><td><h5><b>Estado: </b>@if (($producto_has_sintoma->productos->activo)=='1')<span class="badge badge-success">activo</span>
                                    @else<span class="badge badge-danger">inactivo</span>@endif</h5></td></tr>
                                <tr><td><h5><b>Creacion Registro: </b><small class="text-muted">{{$producto_has_sintoma->productos->created_at}}</small></h5></td></tr>
                                <tr><td><h5><b>Actualizacion Registro: </b><small class="text-muted">{{$producto_has_sintoma->productos->updated_at}}</small></h5></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection