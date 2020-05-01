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
        <h3 class="card-title">Lista de los Estados de Venta</h3>
        @include('estado_ventas.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th style="width: 30%">ESTADOS</th>
                    <th style="width: 30%">DESCRIPCIÓN</th>
                    <th style="width: 10%">ESTADO</th>
                    <th style="width: 20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estado_ventas as $key=>$estado_venta)
                <tr>
                    <td style="width: 10%">{{$key+1}}</td>
                    <td style="width: 30%">{{$estado_venta->estado}}</td>
                    <td style="width: 30%">{{$estado_venta->desc}}</td>
                    <td style="width: 10%" class="text-center text-sm">
                        @if (($estado_venta->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('estado_ventas.show', $estado_venta->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles de la estado"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$estado_venta->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($estado_venta->activo)=='1')
                        <a href="{{ url('/estado_ventas/altabaja', [$estado_venta->activo,$estado_venta->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado del estado"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/estado_ventas/altabaja', [$estado_venta->activo,$estado_venta->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar o el estado del estado"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$estado_venta->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('estado_ventas.edit')
                        @include('estado_ventas.delete')
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