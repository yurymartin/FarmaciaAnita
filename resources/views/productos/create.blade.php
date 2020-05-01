<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal-default">
    <i class="fas fa-plus-square"></i>
    REGISTRAR NUEVO PRODUCTO
</button>
{!! Form::open(['route'=>'productos.store', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
{{ Form::token() }}
<div class="col-md-12">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary"><b>Registrar un Nuevo Producto</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="codigo" class="text-sm">Codigo</label>
                            <input type="text" class="form-control" name="codigo" placeholder="Ingrese el codigo">
                        </div>
                        <div class="col-md-8 form-group">
                            <label for="nom" class="text-sm">Nombre del Producto</label>
                            <input type="text" class="form-control" name="nom"
                                placeholder="Ingrese el nombre del producto">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="nom_generico" class="text-sm">Nombre Generico</label>
                            <input type="text" class="form-control" name="nom_generico"
                                placeholder="Ingrese el nombre generico del producto">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="imagen" class="text-sm">Imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagen">
                                    <label class="custom-file-label" for="imagen">imagen del producto</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="stock" class="text-sm">Stock</label>
                            <input type="number" class="form-control" name="stock" disabled value="0">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fec_cad" class="text-sm">Fecha Caducidad</label>
                            <input type="date" class="form-control" name="fec_cad" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-sm" for="activo">Estado</label>
                                <select class="form-control" name="activo">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm" for="tipo_id">Tipo Producto</label>
                                <select class="form-control" name="tipo_id">
                                    @foreach ($tipo_productos as $tipo_producto)
                                    <option value="{{$tipo_producto->id}}">{{$tipo_producto->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm" for="activo">Ubicacion</label>
                                <select class="form-control" name="ubicacion_id">
                                    @foreach ($ubicaciones as $ubicacion)
                                    <option value="{{$ubicacion->id}}">{{$ubicacion->ubicacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="desc" class="text-sm">Descripcion</label>
                            <textarea name="desc" rows="3" class="form-control"
                                placeholder="Ingrese la descripcion del producto"></textarea>
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