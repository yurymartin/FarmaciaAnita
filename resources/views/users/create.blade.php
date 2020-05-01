<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal-default">
    <i class="fas fa-plus-square"></i>
    NUEVO USUARIO
</button>
{!! Form::open(['route'=>'users.store', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
{{ Form::token() }}
<div class="col-md-12">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>REGISTRAR NUEVO USUARIO</b></h4>
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
                                    <option value="{{$empleado->id}}">{{$empleado->personas->dni}} -
                                        {{$empleado->personas->nombres}}
                                        {{$empleado->personas->apellidos}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email" class="text-sm">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="ingrese la name del usuario">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="direccion" class="text-sm">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="ingrese el email del usuario">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="direccion" class="text-sm">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="ingrese el password del usuario">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="direccion" class="text-sm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="confirme el password del usuario">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm" for="tipouser_id">Tipo Usuario</label>
                                <select class="form-control select2bs4" name="tipouser_id">
                                    @foreach ($tipousers as $tipouser)
                                    <option value="{{$tipouser->id}}">{{$tipouser->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm" for="activo">Estado</label>
                                <select class="form-control" name="activo">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="borrado" value="0">
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
</div>
<!-- /.modal -->

{!! Form::close() !!}