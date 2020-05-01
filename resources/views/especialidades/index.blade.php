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
        <h3 class="card-title">Lista de Especialidades</h3>
        @include('especialidades.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 30%">ESPECIALIDAD</th>
                    <th style="width: 30%">DESCRIPCIÓN</th>
                    <th style="width: 10%">ESTADO</th>
                    <th style="width: 20%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($especialidades as $especialidad)
                <tr>
                    <td style="width: 10%">{{$especialidad->id}}</td>
                    <td style="width: 30%">{{$especialidad->nombre}}</td>
                    <td style="width: 30%">{{$especialidad->descripcion}}</td>
                    <td style="width: 10%" class="text-center text-sm">
                        @if (($especialidad->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('especialidades.show', $especialidad->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles de la especialidad"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$especialidad->id}}" title="editar la especialidad">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($especialidad->activo)=='1')
                        <a href="{{ url('/especialidades/altabaja', [$especialidad->activo,$especialidad->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado de la especialidad"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/especialidades/altabaja', [$especialidad->activo,$especialidad->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar el estado de la especialidad"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$especialidad->id}}" title="eliminar la especialidad">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('especialidades.edit')
                        @include('especialidades.delete')
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