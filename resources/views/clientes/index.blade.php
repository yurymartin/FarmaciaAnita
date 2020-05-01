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
        <h3 class="card-title">LISTADO DE CLIENTES</h3>
        @include('clientes.create')
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
                    <th style="width: 5%">ESTADO</th>
                    <th style="width: 10%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $key => $cliente)
                <tr>
                    <td style="width: 5%">{{$key+1}}</td>
                    <td style="width: 10%">{{$cliente->personas->dni}}</td>
                    <td style="width: 15%">{{$cliente->personas->nombres}} {{$cliente->personas->apellidos}}</td>
                    <td style="width: 15%">{{$cliente->personas->direccion}}</td>
                    <td style="width: 5%">@if (($cliente->personas->genero)=='1')MASCULINO @else FEMENINO @endif</td>
                    <td style="width: 5%" class="text-center text-sm">
                        @if (($cliente->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 15%" class="text-center">
                        <a href="{{ route('clientes.show', $cliente->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del cliente"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" title="editar el cliente"
                            data-target="#modal-edit-{{$cliente->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($cliente->activo)=='1')
                        <a href="{{ url('/clientes/altabaja', [$cliente->activo,$cliente->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado del cliente"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/clientes/altabaja', [$cliente->activo,$cliente->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar el estado del cliente"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$cliente->id}}" title="eliminar el cliente">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('clientes.edit')
                        @include('clientes.delete')
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