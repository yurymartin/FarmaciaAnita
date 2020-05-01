@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles del Tipo de Producto</h4>
        <a href="/tipoproductos" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <h5><b>Tipo de Producto:</b></h5>
        <h5><small class="text-muted">{{$tipoproductos->nom}}</small></h5>
        <br>
        <h5><b>Descripcion:</b></h5>
        <h5><small class="text-muted">{{$tipoproductos->desc}}</small></h5>
        <br>
        <h5><b>Estado:</b>
            @if (($tipoproductos->activo)=='1')
            <span class="badge badge-success">activo</span>
            @else
            <span class="badge badge-danger">inactivo</span>
            @endif
        </h5><br>
        <h5><b>Fecha de Creación:</b></h5>
        <h5><small class="text-muted">{{$tipoproductos->created_at}}</small></h5>
    </div>
</div>
@endsection