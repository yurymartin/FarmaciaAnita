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
        <h3 class="card-title">Lista de Ubicaciones</h3>
        @include('ubicaciones.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 30%">UBICACIONES</th>
                    <th style="width: 30%">DESCRIPCIÓN</th>
                    <th style="width: 10%">ESTADO</th>
                    <th style="width: 20%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ubicaciones as $ubicacion)
                <tr>
                    <td style="width: 10%">{{$ubicacion->id}}</td>
                    <td style="width: 30%">{{$ubicacion->ubicacion}}</td>
                    <td style="width: 30%">{{$ubicacion->descripcion}}</td>
                    <td style="width: 10%" class="text-center text-sm">
                        @if (($ubicacion->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('ubicaciones.show', $ubicacion->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles de la ubicacion"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$ubicacion->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($ubicacion->activo)=='1')
                        <a href="{{ url('/ubicaciones/altabaja', [$ubicacion->activo,$ubicacion->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="activar o desactivar el estado del tipo de producto"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/ubicaciones/altabaja', [$ubicacion->activo,$ubicacion->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar o desactivar el estado del tipo de producto"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$ubicacion->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('ubicaciones.edit')
                        @include('ubicaciones.delete')
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