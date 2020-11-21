@extends('admin.app')
@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
@php
Toastr::error(" $error ",'¡ERROR!');
Toastr::clear();




@endphp
@endforeach
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">LISTADO DE TIPOS DE PAGOS</h3>
        @include('pagos.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%" class="text-center">#</th>
                    <th style="width: 30%">TIPO DE PAGO</th>
                    <th style="width: 30%">DESCRIPCIÓN</th>
                    <th style="width: 15%">ESTADO</th>
                    <th style="width: 20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $key=>$pago)
                <tr>
                    <td style="width: 5%" class="text-center">{{$key+1}}</td>
                    <td style="width: 30%">{{$pago->tipo}}</td>
                    <td style="width: 30%">{{$pago->desc}}</td>
                    <td style="width: 15%" class="text-center text-sm">
                        @if (($pago->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 20%" class="text-center">

                        <a href="{{ route('pagos.show', $pago->id) }}"><button type="button" class="btn btn-info btn-sm"
                                title="ver los detalles de la estado"><i class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$pago->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($pago->activo)=='1')
                        <a href="{{ url('/pagos/altabaja', [$pago->activo,$pago->id]) }}"><button type="button"
                                class="btn btn-warning btn-sm" title="desactivar el estado del estado"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/pagos/altabaja', [$pago->activo,$pago->id]) }}"><button type="button"
                                class="btn btn-dark btn-sm" title="activar o el estado del estado"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$pago->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('pagos.edit')
                        @include('pagos.delete')
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
