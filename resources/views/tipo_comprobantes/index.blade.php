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
        <h3 class="card-title">LISTADO DE TIPOS DE COMPROBANTES</h3>
        @include('tipo_comprobantes.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%" class="text-center">#</th>
                    <th style="width: 30%">TIPOS DE COMPROBANTES</th>
                    <th style="width: 30%">DESCRIPCIÓN</th>
                    <th style="width: 15%">ESTADO</th>
                    <th style="width: 20%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipo_comprobantes as $key=>$tipo_comprobante)
                <tr>
                    <td style="width: 5%" class="text-center">{{$key+1}}</td>
                    <td style="width: 30%">{{$tipo_comprobante->tipo}}</td>
                    <td style="width: 30%">{{$tipo_comprobante->desc}}</td>
                    <td style="width: 15%" class="text-center text-sm">
                        @if (($tipo_comprobante->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('tipo_comprobantes.show', $tipo_comprobante->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles de la estado"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$tipo_comprobante->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($tipo_comprobante->activo)=='1')
                        <a href="{{ url('/compras/tipos_comprobantes/altabaja', [$tipo_comprobante->activo,$tipo_comprobante->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado del estado"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/compras/tipos_comprobantes/altabaja', [$tipo_comprobante->activo,$tipo_comprobante->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar o el estado del estado"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$tipo_comprobante->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('tipo_comprobantes.edit')
                        @include('tipo_comprobantes.delete')
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