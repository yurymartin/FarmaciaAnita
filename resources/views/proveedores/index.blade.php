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
        <h3 class="card-title">Listado de Proveedores</h3>
        @include('proveedores.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 5%">RUC</th>
                    <th style="width: 20%">EMPRESA</th>
                    <th style="width: 10%">TELEFONO</th>
                    <th style="width: 10%">EMAIL</th>
                    <th style="width: 15%">DIRECCION</th>
                    <th style="width: 15%">DESCRIPCION</th>
                    <th style="width: 5%">ESTADO</th>
                    <th style="width: 15%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $key => $proveedor)
                <tr>
                    <td style="width: 5%">{{$key+1}}</td>
                    <td style="width: 5%">{{$proveedor->ruc}}</td>
                    <td style="width: 20%">{{$proveedor->nombre}}</td>
                    <td style="width: 10%">{{$proveedor->telefono}}</td>
                    <td style="width: 10%">{{$proveedor->email}}</td>
                    <td style="width: 15%">{{$proveedor->direccion}}</td>
                    <td style="width: 15%">{{$proveedor->descripcion}}</td>
                    <td style="width: 5%" class="text-center text-sm">
                        @if (($proveedor->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 15%" class="text-center">
                        <a href="{{ route('proveedores.show', $proveedor->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del proveedor"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" title="editar el proveedor"
                            data-target="#modal-edit-{{$proveedor->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($proveedor->activo)=='1')
                        <a href="{{ url('/proveedores/altabaja', [$proveedor->activo,$proveedor->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado del proveedor"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/proveedores/altabaja', [$proveedor->activo,$proveedor->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar el estado del proveedor"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$proveedor->id}}" title="eliminar el proveedor">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('proveedores.edit')
                        @include('proveedores.delete')
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