@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles del Proveedor</h4>
        <a href="/proveedores" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr><td><h5><b>RUC: </b><small class="text-muted">{{$proveedor->ruc}}</small></h5></td></tr>
                        <tr><td><h5><b>Proveedor: </b><small class="text-muted">{{$proveedor->nombre}}</small></h5></td></tr>
                        <tr><td><h5><b>Telefono: </b><small class="text-muted">{{$proveedor->telefono}}</small></h5></td></tr>
                        <tr><td><h5><b>Email: </b><small class="text-muted">{{$proveedor->email}}</small></h5></td></tr>
                        <tr><td><h5><b>Dirección: </b> <small class="text-muted">{{$proveedor->direccion}}</small></h5></td></tr>
                        <tr><td><h5><b>Decripción: </b><small class="text-muted">{{$proveedor->descripcion}}</small></h5></td></tr>
                        <tr><td>
                            <h5><b>Estado: </b>
                            @if (($proveedor->activo)=='1')
                            <span class="badge badge-success">activo</span>
                            @else<span class="badge badge-danger">inactivo</span>
                            @endif
                            </h5>
                            </td>
                        </tr>
                        <tr><td><h5><b>Fecha de creación: </b> <small class="text-muted">{{$proveedor->created_at}}</small></h5></td></tr>
                        <tr><td><h5><b>Ultima Actualización: </b> <small class="text-muted">{{$proveedor->updated_at}}</small></h5></td></tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection