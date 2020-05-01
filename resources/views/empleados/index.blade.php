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
        <h3 class="card-title">Lista de Empleados</h3>
        @include('empleados.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 10%">DNI</th>
                    <th style="width: 15%">NOMBRES Y APELLIDOS</th>
                    <th style="width: 15%">DIRECCION</th>
                    <th style="width: 5%">GENERO</th>
                    <th style="width: 5%">TELEFONO</th>
                    <th style="width: 15%">ESPECIALIDAD</th>
                    <th style="width: 5%">FOTO</th>
                    <th style="width: 5%">ESTADO</th>
                    <th style="width: 10%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $key => $empleado)
                <tr>
                    <td style="width: 5%">{{$key+1}}</td>
                    <td style="width: 10%">{{$empleado->personas->dni}}</td>
                    <td style="width: 15%">{{$empleado->personas->nombres}} {{$empleado->personas->apellidos}}</td>
                    <td style="width: 15%">{{$empleado->personas->direccion}}</td>
                    <td style="width: 5%">@if (($empleado->personas->genero)=='1')MASCULINO @else FEMENINO @endif</td>
                    <td style="width: 5%">{{$empleado->telefono}}</td>
                    <td style="width: 15%">{{$empleado->especialidades->nombre}}</td>
                    <td style="width: 5%"><img src="{{ asset('/img/personas/'.$empleado->foto) }}"
                            alt="{{$empleado->foto}}" style="width: 30px;height: 30px"></td>
                    <td style="width: 5%" class="text-center text-sm">
                        @if (($empleado->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 15%" class="text-center">
                        <a href="{{ route('empleados.show', $empleado->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del empleado"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" title="editar el empleado"
                            data-target="#modal-edit-{{$empleado->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($empleado->activo)=='1')
                        <a href="{{ url('/empleados/altabaja', [$empleado->activo,$empleado->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado del empleado"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/empleados/altabaja', [$empleado->activo,$empleado->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar el estado del empleado"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$empleado->id}}" title="eliminar el empleado">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('empleados.edit')
                        @include('empleados.delete')
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