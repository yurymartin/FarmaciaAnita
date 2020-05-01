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
        <h3 class="card-title">ASISTENTE MEDICO <b>¡HELP!</b></h3>
        @include('asistente.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 25%">ENFERMEDAD</th>
                    <th style="width: 20%">PRODUCTO</th>
                    <th style="width: 10%">STOCK DEL PRODUCTO</th>
                    <th style="width: 10%">PRECIO</th>
                    <th style="width: 10%">EFECTIVIDAD</th>
                    <th style="width: 20%">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos_has_sintomas as $key=>$producto_ha_sintoma)
                <tr>
                    <td style="width: 5%">{{$key+1}}</td>
                    <td style="width: 30%">{{$producto_ha_sintoma->sintomas->nombre}}</td>
                    <td style="width: 20%">{{$producto_ha_sintoma->productos->nom}}</td>
                    <td style="width: 10%">{{$producto_ha_sintoma->productos->stock}}</td>
                    <td style="width: 10%">S/. {{$producto_ha_sintoma->productos->precio_venta}}</td>
                    <td style="width: 10%" class="text-center">{{$producto_ha_sintoma->intensidad}}%</td>
                    <td style="width: 20%" class="text-center">
                        <a href="{{ route('asistente.show', $producto_ha_sintoma->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles de la ubicacion"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-edit-{{$producto_ha_sintoma->id}}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$producto_ha_sintoma->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('asistente.edit')
                        @include('asistente.delete')
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