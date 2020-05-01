@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles del Estado de Compra</h4>
        <a href="/estado_ventas" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr><td><h5><b>Estado de Compra: </b><small class="text-muted">{{$estado_venta->estado}}</small></h5></td></tr>
                <tr><td><h5><b>Descripcion: </b><small class="text-muted">{{$estado_venta->desc}}</small></h5></td></tr>
                <tr><td><h5><b>Estado:</b>
                    @if (($estado_venta->activo)=='1')
                    <span class="badge badge-success">activo</span>
                    @else
                    <span class="badge badge-danger">inactivo</span>
                    @endif
                </h5></td></tr>
                <tr><td><h5><b>Fecha de Creación: </b><small class="text-muted">{{$estado_venta->created_at}}</small></h5></td></tr>
                <tr><td><h5><b>Ultima Actualizada: </b><small class="text-muted">{{$estado_venta->updated_at}}</small></h5></td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection