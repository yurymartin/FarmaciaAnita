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
        <h3 class="card-title">Listado de users</h3>
        @include('users.create')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%" class="text-center">#</th>
                    <th style="width: 20%">Name</th>
                    <th style="width: 20%">Email</th>
                    <th style="width: 20%">Empleado</th>
                    <th style="width: 15%">Tipo usuario</th>
                    <th style="width: 5%">Estado</th>
                    <th style="width: 15%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr>
                    <td style="width: 5%" class="text-center">{{$key+1}}</td>
                    <td style="width: 20%">{{$user->name}}</td>
                    <td style="width: 20%">{{$user->email}}</td>
                    <td style="width: 20%">{{$user->empleados->personas->nombres .' '. $user->empleados->personas->apellidos}}</td>
                    <td style="width: 15%">{{$user->tipousers->tipo}}</td>
                    <td style="width: 5%" class="text-center text-sm">
                        @if (($user->activo)=='1')
                        <span class="badge badge-success">activo</span>
                        @else
                        <span class="badge badge-danger">inactivo</span>
                        @endif
                    </td>
                    <td style="width: 15%" class="text-center">
                        <a href="{{ route('users.show', $user->id) }}"><button type="button"
                                class="btn btn-info btn-sm" title="ver los detalles del user"><i
                                    class="fas fa-eye"></i></button></a>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" title="editar el user"
                            data-target="#modal-edit-{{$user->id}}">
                            <i class="fas fa-edit"></i>
                        </button>

                        @if (($user->activo)=='1')
                        <a href="{{ url('/users/altabaja', [$user->activo,$user->id]) }}"><button
                                type="button" class="btn btn-warning btn-sm"
                                title="desactivar el estado del user"><i
                                    class="fas fa-arrow-circle-down"></i></button></a>
                        @else
                        <a href="{{ url('/users/altabaja', [$user->activo,$user->id]) }}"><button
                                type="button" class="btn btn-dark btn-sm"
                                title="activar el estado del user"><i
                                    class="fas fa-arrow-circle-up"></i></button></a>
                        @endif

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-eliminar-{{$user->id}}" title="cambiar la contraseña del usuario">
                            <i class="fas fa-unlock-alt"></i>
                        </button>
                        @include('users.edit')
                        @include('users.delete')
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