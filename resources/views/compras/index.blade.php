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
        <h3 class="card-title">LISTADO DE COMPRAS</h3>
        @include('compras.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">FECHA</th>
                    <th style="width: 20%">PROVEEDOR</th>
                    <th style="width: 25%">TIPO COMPROBANTE</th>
                    <th style="width: 5%">IGV</th>
                    <th style="width: 10%">TOTAL</th>
                    <th style="width: 5%">ESTADO</th>
                    <th style="width: 15%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $key => $compra)
                <tr>
                    <td style="width: 5%">{{$key+1}}</td>
                    <td style="width: 15%">{{$compra->created_at}}</td>
                    <td style="width: 20%">{{$compra->proveedores->nombre}}</td>
                    <td style="width: 25%">{{$compra->tipo_comprobantes->tipo.': '.$compra->serie_comprobante.' - '.$compra->num_comprobante}}</td>
                    <td style="width: 5%">{{$compra->igv}}</td>
                    <td style="width: 10%">{{$compra->monto_total}}</td>
                    <td style="width: 5%" class="text-center text-sm"><span
                            class="badge badge-danger">{{$compra->estado_compras->estado}}<span></td>
                    <td style="width: 15%" class="text-center">
                        <a href="{{ route('compras.show', $compra->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del compra"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            title="editar el compra" data-target="#modal-edit-{{$compra->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$compra->id}}" title="cambiar el estado de la compra">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        
                        {{--@include('compras.edit')--}}
                        @include('compras.delete')
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