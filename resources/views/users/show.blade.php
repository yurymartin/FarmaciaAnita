@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">DETALLES DEL USUARIO: <b>{{$user->name}}</b></h4>
        <a href="/users" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="desc" class="text-sm">Empleado</label>
                <p>{{$user->empleados->personas->nombres}} {{$user->empleados->personas->apellidos}}</p>
            </div>
            <div class="col-md-4 form-group">
                <label for="desc" class="text-sm">Login</label>
                <p>{{$user->name}}</p>
            </div>
            <div class="col-md-4 form-group">
                <label for="desc" class="text-sm">Email</label>
                <p>{{$user->email}}</p>
            </div>
            <div class="col-md-4 form-group">
                <label for="tipo" class="text-sm">Tipo usuario</label>
                <p>{{$user->tipousers->tipo}}</p>
            </div>
            <div class="col-md-4 form-group">
                <label for="desc" class="text-sm">Estado</label>
                @if (($user->activo)=='1')
                <p><span class="badge badge-success">activo</span></p>
                @else
                <p><span class="badge badge-danger">inactivo</span></p>
                @endif
            </div>
            <div class="col-md-4 form-group">
                <label for="desc" class="text-sm">Fecha Creaciòn</label>
                <p>{{$user->created_at}}</p>
            </div>
            <div class="col-md-4 form-group">
                <label for="desc" class="text-sm">Ultima Actualizaciòn</label>
                <p>{{$user->updated_at}}</p>
            </div>
        </div>
    </div>
</div>
@endsection