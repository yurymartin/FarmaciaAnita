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
        <h3 class="card-title">Lista de tipos de productos
        </h3>
        @include('tipo_productos.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 30%">TIPO DE PRODUCTO</th>
                    <th style="width: 30%">DESCRIPCIÓN</th>
                    <th style="width: 10%">ESTADO</th>
                    <th style="width: 20%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoproductos as $tipoproducto)
                <tr>
                    <td style="width: 10%">{{$tipoproducto->id}}</td>
                    <td style="width: 30%">{{$tipoproducto->nom}}</td>
                    <td style="width: 30%">{{$tipoproducto->desc}}</td>
                    <td style="width: 10%" class="text-center text-sm">
                        @if (($tipoproducto->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('tipoproductos.show', $tipoproducto->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del tipo de producto"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$tipoproducto->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($tipoproducto->activo)=='1')
                        <a href="{{ url('/tipoproductos/altabaja', [$tipoproducto->activo,$tipoproducto->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="activar o desactivar el estado del tipo de producto"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/tipoproductos/altabaja', [$tipoproducto->activo,$tipoproducto->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar o desactivar el estado del tipo de producto"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$tipoproducto->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('tipo_productos.edit')
                        @include('tipo_productos.delete')
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