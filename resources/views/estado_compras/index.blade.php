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
        <h3 class="card-title">Lista de los Estados de la Compras</h3>
        @include('estado_compras.create')
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
                @foreach ($estado_compras as $key=>$estado_compra)
                <tr>
                    <td style="width: 10%">{{$key+1}}</td>
                    <td style="width: 30%">{{$estado_compra->estado}}</td>
                    <td style="width: 30%">{{$estado_compra->descripcion}}</td>
                    <td style="width: 10%" class="text-center text-sm">
                        @if (($estado_compra->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('estado_compras.show', $estado_compra->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles de la estado"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$estado_compra->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($estado_compra->activo)=='1')
                        <a href="{{ url('/estado_compras/altabaja', [$estado_compra->activo,$estado_compra->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado del estado"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/estado_compras/altabaja', [$estado_compra->activo,$estado_compra->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar o el estado del estado"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$estado_compra->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('estado_compras.edit')
                        @include('estado_compras.delete')
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