{!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'PATCH','files' => true,
'role'=>'form']) !!}
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$user->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR EL USUARIO: <b>{{$user->name}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-sm" for="empleado_id">Empleado</label>
                            <select class="form-control select2bs4" name="empleado_id">
                                @foreach ($empleados as $empleado)
                                @if ($user->empleado_id == $empleado->id)
                                <option value="{{$empleado->id}}" selected>{{$empleado->personas->dni}} -
                                    {{$empleado->personas->nombres}}
                                    {{$empleado->personas->apellidos}}</option>
                                @else
                                <option value="{{$empleado->id}}">{{$empleado->personas->dni}} -
                                    {{$empleado->personas->nombres}}
                                    {{$empleado->personas->apellidos}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email" class="text-sm">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" required autocomplete="name" autofocus
                            placeholder="ingrese la name del usuario" value="{{$user->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="direccion" class="text-sm">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" required autocomplete="email" placeholder="ingrese el email del usuario" value="{{$user->email}}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-sm" for="tipouser_id">Tipo Usuario</label>
                            <select class="form-control select2bs4" name="tipouser_id">
                                @foreach ($tipousers as $tipouser)
                                @if ($user->tipouser_id == $tipouser->id)
                                <option value="{{$tipouser->id}}" selected>{{$tipouser->tipo}}</option>
                                @else
                                <option value="{{$tipouser->id}}">{{$tipouser->tipo}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i
                        class="far fa-window-close"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary swalDefaultSuccess btn-sm"><i class="far fa-save"></i>
                    Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{!! Form::close() !!}