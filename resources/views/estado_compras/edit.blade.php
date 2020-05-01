{!! Form::open(['action' => ['Estado_CompraController@update', $estado_compra->id], 'method' => 'PATCH']) !!} 
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$estado_compra->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar el Estado de Compra</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="estado" class="text-sm">Estado de Compra</label>
                    <input type="text" class="form-control" name="estado" placeholder="Ingrese la estado_compra"
                        value="{{$estado_compra->estado}}">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="text-sm">Descripción</label>
                    <textarea name="descripcion" rows="5" class="form-control"
                placeholder="Ingrese la descripcion de la estado_compra">{{$estado_compra->descripcion}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{!! Form::close() !!}