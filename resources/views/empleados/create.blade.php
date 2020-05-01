<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal-default">
    <i class="fas fa-plus-square"></i>
    Nuevo Empleado
</button>
{!! Form::open(['route'=>'empleados.store', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
{{ Form::token() }}
<div class="col-md-12">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary"><b>Registrar un Nuevo Empleado</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label for="dni" class="text-sm">dni</label>
                            <input type="number" class="form-control" name="dni" placeholder="Ingrese el DNI">
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="nombres" class="text-sm">Nombres</label>
                            <input type="text" class="form-control" name="nombres"
                                placeholder="Ingrese los nombres del empleado">
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="apellidos" class="text-sm">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos"
                                placeholder="Ingrese los apellidos del empleado">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="direccion" class="text-sm">Dirección</label>
                            <input type="text" class="form-control" name="direccion"
                                placeholder="Ingrese la direccion del empleado">
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-sm" for="genero">Genero</label>
                                <select class="form-control" name="genero">
                                    <option value="1">MASCULINO</option>
                                    <option value="0">FEMENINO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="sueldo" class="text-sm">Sueldo</label>
                            <input type="number" class="form-control" name="sueldo" placeholder="Ingrese el sueldo"
                                step="0.001">
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-sm" for="activo">Estado</label>
                                <select class="form-control" name="activo">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="telefono" class="text-sm">Celular</label>
                            <input type="text" class="form-control" name="telefono" placeholder="Ingrese el celular">
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="imagen" class="text-sm">Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto">
                                    <label class="custom-file-label" for="foto">Foto del empleado</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="text-sm" for="especialidad_id">Especialidades</label>
                                <select class="form-control" name="especialidad_id">
                                    @foreach ($especialidades as $especialidad)
                                    <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>
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
</div>
<!-- /.modal -->

{!! Form::close() !!}