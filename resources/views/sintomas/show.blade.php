@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles de la Enfermedad</h4>
        <a href="/sintomas" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr><td><h5><b>Enfermedad: </b><small class="text-muted">{{$sintomas->nombre}}</small></h5></td></tr>
                <tr><td><h5><b>Descripcion: </b><small class="text-muted" style="">{{$sintomas->desc}}</small></h5></td></tr>
                <tr><td>
                    <h5><b>Estado:</b>
                        @if (($sintomas->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </h5>
                </td></tr>
                <tr><td><h5><b>Fecha de Creación: </b><small class="text-muted">{{$sintomas->created_at}}</small></h5></td></tr>
                <tr><td><h5><b>Ultima actualización: </b><small class="text-muted">{{$sintomas->updated_at}}</small></h5></td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection