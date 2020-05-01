@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">DETALLES DEL CLIENTE</h4>
        <a href="/clientes" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="proveedor">DNI:</label>
                    <p>{{$cliente->personas->dni}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Nombres:</label>
                    <p>{{$cliente->personas->nombres}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Apellidos:</label>
                    <p>{{$cliente->personas->apellidos}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Dirección:</label>
                    <p>{{$cliente->personas->direccion}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Genero:</label>
                    @if ($cliente->personas->genero == 1)
                        <p>MASCULINO</p>
                    @elseif($cliente->personas->genero == 0)
                        <P>FEMENINO</P>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Fecha Creación:</label>
                    <p>{{$cliente->created_at}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="proveedor">Ultima Actualización:</label>
                    <p>{{$cliente->updated_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection