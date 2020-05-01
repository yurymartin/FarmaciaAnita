@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles de la Especialidad</h4>
        <a href="/es" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr><td><h5><b>Nombre de la especialidad: </b><small class="text-muted">{{$especialidad->nombre}}</small></h5></td></tr>
                <tr><td><h5><b>Descripcion: </b><small class="text-muted">{{$especialidad->descripcion}}</small></h5></td></tr>
                <tr>
                    <td>
                        <h5><b>Estado:</b>
                        @if (($especialidad->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                        </h5>
                    </td>
                </tr>
                <tr><td ><h5><b>Fecha de creacion:</b> <small class="text-muted">{{$especialidad->created_at}}</small></h5></td></tr>
                <tr><td ><h5><b>Ultima Actualizacion:</b> <small class="text-muted">{{$especialidad->updated_at}}</small></h5></td></tr>
            </tbody>
        </table>
    </div>      
</div>
@endsection