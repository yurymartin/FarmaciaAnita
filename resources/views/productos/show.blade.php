@extends('admin.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detalles del Producto</h4>
        <a href="/productos" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i>
            Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr><td colspan="2"><h5><b>Codigo: </b><small class="text-muted">{{$productos->codigo}}</small></h5></td></tr>
                        <tr><td colspan="2"><h5><b>Nombre Producto: </b><small class="text-muted">{{$productos->nom}}</small></h5></td></tr>
                        <tr><td colspan="2"><h5><b>Descripcion: </b><small class="text-muted">{{$productos->desc}}</small></h5></td></tr>
                        <tr><td colspan="2"><h5><b>Nombre Generico:</b> <small class="text-muted">{{$productos->nom_generico}}</small></h5></td></tr>
                        <tr>
                            <td><h5><b>Stock: </b><small class="text-muted">{{$productos->stock}}</small></h5></td>
                            <td><h5><b>Fecha Caducidad: <small class="text-muted">{{$productos->fec_cad}}</small></b></h5></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h5><b>Estado:</b>
                                @if (($productos->activo)=='1')
                                <span class="badge badge-success">activo</span>
                                @else
                                <span class="badge badge-danger">inactivo</span>
                                @endif
                                </h5>
                            </td>
                        </tr>
                        <tr><td colspan="2"><h5><b>Tipo:</b> <small class="text-muted">{{$productos->tipo_producto->nom}}</small></h5></td></tr>
                        <tr><td colspan="2"><h5><b>Ubicacion:</b> <small class="text-muted">{{$productos->ubicacion->ubicacion}}</small></h5></td></tr>
                        <tr><td colspan="2"><h5><b>Fecha de Ingreso:</b> <small class="text-muted">{{$productos->created_at}}</small></h5></td></tr>
                        <tr><td colspan="2"><h5><b>Ultimo Fecha de Venta:</b> <small class="text-muted">{{$productos->updated_at}}</small></h5></td></tr>
                    </tbody>
                </table>
                
            </div>
            <div class="col-md-6">
                <img src="{{ asset('/img/productos/'.$productos->imagen) }}" alt="{{$productos->imagen}}"
                    style="width: 530px;height: 470px">
            </div>
        </div>
    </div>
</div>
@endsection