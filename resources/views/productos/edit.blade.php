{!! Form::open(['action' => ['ProductoController@update', $producto->id], 'method' => 'PATCH','files' => true, 'role' => 'form']) !!}
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$producto->id}}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR EL PRODUCTO: <b>{{$producto->nom}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="codigo" class="text-sm">Codigo</label>
                        <input type="text" class="form-control" name="codigo" placeholder="Ingrese el codigo"
                            value="{{$producto->codigo}}">
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="nom" class="text-sm">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nom" placeholder="Ingrese el nombre del producto"
                            value="{{$producto->nom}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="imagen" class="text-sm">Imagen</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imagen">
                                <label class="custom-file-label" for="imagen"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="fec_cad" class="text-sm">Fecha Caducidad</label>
                        <input type="date" class="form-control" name="fec_cad" value="{{$producto->fec_cad}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="nom_generico" class="text-sm">Nombre Generico</label>
                        <input type="text" class="form-control" name="nom_generico"
                            placeholder="Ingrese el nombre generico del producto" value="{{$producto->nom_generico}}">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-sm" for="tipo_id">Tipo Producto</label>
                            <select class="form-control" name="tipo_id">
                                @foreach ($tipo_productos as $tipo_producto)
                                @if ($producto->tipo_id == $tipo_producto->id)
                                <option value="{{$tipo_producto->id}}" selected>{{$tipo_producto->nom}}</option>
                                @else
                                <option value="{{$tipo_producto->id}}">{{$tipo_producto->nom}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-sm" for="activo">Ubicacion</label>
                            <select class="form-control" name="ubicacion_id">
                                @foreach ($ubicaciones as $ubicacion)
                                @if ($producto->ubicacion_id == $ubicacion->id)
                                <option value="{{$ubicacion->id}}" selected>{{$ubicacion->ubicacion}}</option>
                                @else
                                <option value="{{$ubicacion->id}}">{{$ubicacion->ubicacion}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="desc" class="text-sm">Descripcion</label>
                        <textarea name="desc" rows="3" class="form-control"
                            placeholder="Ingrese la descripcion del producto">{{$producto->desc}}</textarea>
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