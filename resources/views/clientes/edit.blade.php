{!! Form::open(['action' => ['ClienteController@update', $cliente->id], 'method' => 'PATCH','files' => true, 'role' =>
'form']) !!}
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$cliente->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar el cliente: <b>{{$cliente->personas->nombres}}
                        {{$cliente->personas->apellidos}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="dni" class="text-sm">DNI</label>
                        <input type="number" class="form-control" name="dni" placeholder="Ingrese el DNI"
                            value="{{$cliente->personas->dni}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="nombres" class="text-sm">Nombres</label>
                        <input type="text" class="form-control" name="nombres"
                            placeholder="Ingrese los nombres del cliente" value="{{$cliente->personas->nombres}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="apellidos" class="text-sm">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos"
                            placeholder="Ingrese los apellidos del cliente" value="{{$cliente->personas->apellidos}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="direccion" class="text-sm">Dirección</label>
                        <input type="text" class="form-control" name="direccion"
                            placeholder="Ingrese la direccion del cliente" value="{{$cliente->personas->direccion}}">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-sm" for="genero">Genero</label>
                            <select class="form-control" name="genero">
                                @if ($cliente->personas->genero== '1')
                                <option value="1" selected>MASCULINO</option>
                                <option value="0">FEMENINO</option>
                                @else
                                <option value="1">MASCULINO</option>
                                <option value="0" selected>FEMENINO</option>
                                @endif
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