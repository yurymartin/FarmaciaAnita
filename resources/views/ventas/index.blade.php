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
        <h3 class="card-title">LISTADO DE VENTAS</h3>
        @include('ventas.create')
        @include('ventas.edit')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">FECHA</th>
                    <th style="width: 20%">CLIENTE</th>
                    <th style="width: 25%">COMPROBANTE</th>
                    <th style="width: 5%">IGV</th>
                    <th style="width: 10%">TOTAL</th>
                    <th style="width: 5%">ESTADO</th>
                    <th style="width: 15%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $key => $venta)
                <tr>
                    <td style="width: 5%">{{$key+1}}</td>
                    <td style="width: 15%">{{$venta->created_at}}</td>
                    <td style="width: 20%">
                        {{$venta->clientes->personas->nombres}}{{$venta->clientes->personas->apellidos}}</td>
                    <td style="width: 25%">
                        {{$venta->tipo_comprobantes->tipo.': '.$venta->serie_comprobante.' - '.$venta->num_comprobante}}
                    </td>
                    <td style="width: 5%">{{$venta->igv}}</td>
                    <td style="width: 10%">{{$venta->total_venta}}</td>
                    <td style="width: 5%" class="text-center text-sm">
                        @if ($venta->estado_ventas->estado == 'CANCELADO')
                        <span class="badge badge-danger">{{$venta->estado_ventas->estado}}<span></td>
                        @else
                        <span class="badge badge-success">{{$venta->estado_ventas->estado}}<span></td>
                        @endif
                            
                    <td style="width: 15%" class="text-center">

                        <a href="{{ route('ventas.show', $venta->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del venta"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$venta->id}}" title="cambiar el estado de la venta">
                            <i class="fas fa-sync-alt"></i>
                        </button>

                        
                        <a href="{{ route('ventas.boleta', ['id'=>$venta->id]) }}" class="btn btn-secondary btn-sm" target="__blank"><i class="fas fa-file-invoice-dollar"></i></a>
                        @include('ventas.delete')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.card -->
@endsection