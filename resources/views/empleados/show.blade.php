@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles del Empleado</h4>
        <a href="/empleados" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr><td><h5><b>DNI: </b><small class="text-muted">{{$empleados->personas->dni}}</small></h5></td></tr>
                        <tr><td><h5><b>Nombres: </b><small class="text-muted">{{$empleados->personas->nombres}}</small></h5></td></tr>
                        <tr><td><h5><b>Apellidos: </b><small class="text-muted">{{$empleados->personas->apellidos}}</small></h5></td></tr>
                        <tr><td><h5><b>Dirección: </b> <small class="text-muted">{{$empleados->personas->direccion}}</small></h5></td></tr>
                        <tr><td>
                            @if (($empleados->personas->genero)=='1')
                            <h5><b>Genero: </b> <small class="text-muted">MASCULINO</small></h5>
                            @else 
                            <h5><b>Genero: </b> <small class="text-muted">FEMENINO</small></h5>
                            @endif</td></tr>
                        <tr><td><h5><b>Sueldo: </b><small class="text-muted">{{$empleados->sueldo}}</small></h5></td></tr>
                        <tr><td><h5><b>Especialidad: <small class="text-muted">{{$empleados->especialidades->nombre}}</small></b></h5></td></tr>
                        <tr><td><h5><b>Estado: </b>@if (($empleados->activo)=='1')<span class="badge badge-success">activo</span>
                                                @else<span class="badge badge-danger">inactivo</span>@endif</h5></td></tr>
                        <tr><td><h5><b>Fecha de creación: </b> <small class="text-muted">{{$empleados->created_at}}</small></h5></td></tr>
                        <tr><td><h5><b>Ultima Actualización: </b> <small class="text-muted">{{$empleados->updated_at}}</small></h5></td></tr>
                    </tbody>
                </table>
                
            </div>
            <div class="col-md-6">
                <img src="{{ asset('/img/personas/'.$empleados->foto) }}" alt="{{$empleados->foto}}"
                    style="width: 530px;height: 470px">
            </div>
        </div>
    </div>
</div>
@endsection