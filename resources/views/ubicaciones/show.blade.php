@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles de la Ubicacion</h4>
        <a href="/ubicaciones" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <h5><b>Ubicacion:</b></h5>
        <h5><small class="text-muted">{{$ubicaciones->ubicacion}}</small></h5>
        <br>
        <h5><b>Descripcion:</b></h5>
        <h5><small class="text-muted">{{$ubicaciones->descripcion}}</small></h5>
        <br>
        <h5><b>Estado:</b>
            @if (($ubicaciones->activo)=='1')
            <span class="badge badge-success">activo</span>
            @else
            <span class="badge badge-danger">inactivo</span>
            @endif
        </h5><br>
        <h5><b>Fecha de Creación:</b></h5>
        <h5><small class="text-muted">{{$ubicaciones->created_at}}</small></h5>
    </div>
</div>
@endsection