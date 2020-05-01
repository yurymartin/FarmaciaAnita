<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal-default">
    <i class="fas fa-plus-square"></i>
    NUEVO TIPO DE PAGO
</button>
{!! Form::open(['route'=>'pagos.store', 'method'=>'POST', 'files' => false, 'role' => 'form']) !!}
{{ Form::token() }}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">REGISTRAR NUEVO TIPO DE PAGO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="tipo" class="text-sm">Tipo de Pago</label>
                    <input type="text" class="form-control" name="tipo" placeholder="Ingrese el tipo">
                </div>
                <div class="form-group">
                    <label for="desc" class="text-sm">Descripción</label>
                    <textarea name="desc" rows="4" class="form-control"
                        placeholder="Ingrese la descripcion del tipo de pago"></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-6">
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
                        class="far fa-window-close"></i> Cerrar</button>
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