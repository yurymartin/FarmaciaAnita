@extends('admin.app')
@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
@php
Toastr::error(" $error ",'¡ERROR!');
@endphp
@endforeach
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Productos</h3>
        @include('productos.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 10%">CODIGO</th>
                    <th style="width: 20%">PRODUCTO</th>
                    <th style="width: 10%">IMAGEN</th>
                    <th style="width: 5%">STOCK</th>
                    <th style="width: 10%">TIPO</th>
                    <th style="width: 10%">UBICACION</th>
                    <th style="width: 5%">ESTADO</th>
                    <th style="width: 10%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td style="width: 5%">{{$producto->id}}</td>
                    <td style="width: 8%">{{$producto->codigo}}</td>
                    <td style="width: 20%">{{$producto->nom}}</td>
                    <td style="width: 10%"><img src="{{ asset('/img/productos/'.$producto->imagen) }}" alt="{{$producto->imagen}}" style="width: 100px;height: 50px"></td>
                    <td style="width: 5%">{{$producto->stock}}</td>
                    <td style="width: 10%">{{$producto->tipo_producto->nom}}</td>
                    <td style="width: 10%">{{$producto->ubicacion->ubicacion}}</td>
                    <td style="width: 5%" class="text-center text-sm">
                        @if (($producto->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('productos.show', $producto->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del producto"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$producto->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($producto->activo)=='1')
                        <a href="{{ url('/productos/altabaja', [$producto->activo,$producto->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="activar o desactivar el estado del producto"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/productos/altabaja', [$producto->activo,$producto->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar o desactivar el estado del producto"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$producto->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('productos.edit')
                        @include('productos.delete')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection