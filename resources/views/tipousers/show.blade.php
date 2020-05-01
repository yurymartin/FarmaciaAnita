@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">DETALLES DEL TIPO DE USUARIO</h4>
        <a href="/tipousers" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="tipo" class="text-sm">Tipo Producto</label>
            <p>{{$tipouser->tipo}}</p>
        </div>
        <div class="form-group">
            <label for="desc" class="text-sm">Descripción</label>
            <p>{{$tipouser->desc}}</p>
        </div>
    </div>
</div>
@endsection