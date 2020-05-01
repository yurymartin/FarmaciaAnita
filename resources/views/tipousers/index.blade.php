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
        <h3 class="card-title">LISTADO DE TIPOS DE USUARIOS
        </h3>
        @include('tipousers.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10%" class="text-center">ID</th>
                    <th style="width: 30%">TIPO DE USUARIO</th>
                    <th style="width: 30%">DESCRIPCIÓN</th>
                    <th style="width: 10%">ESTADO</th>
                    <th style="width: 20%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipousers as $key => $tipouser)
                <tr>
                    <td style="width: 10%" class="text-center">{{$key+1}}</td>
                    <td style="width: 30%">{{$tipouser->tipo}}</td>
                    <td style="width: 30%">{{$tipouser->desc}}</td>
                    <td style="width: 10%" class="text-center text-sm">
                        @if (($tipouser->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('tipousers.show', $tipouser->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del tipo de producto"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$tipouser->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($tipouser->activo)=='1')
                        <a href="{{ url('/tipousers/altabaja', [$tipouser->activo,$tipouser->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="activar o desactivar el estado del tipo de producto"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/tipousers/altabaja', [$tipouser->activo,$tipouser->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar o desactivar el estado del tipo de producto"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$tipouser->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('tipousers.edit')
                        @include('tipousers.delete')
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