{!! Form::open(['action' => ['UbicacionController@update', $ubicacion->id], 'method' => 'PATCH']) !!} 
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$ubicacion->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar un Ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="ubicacion" class="text-sm">Ubicacion</label>
                    <input type="text" class="form-control" name="ubicacion" placeholder="Ingrese la ubicacion"
                        value="{{$ubicacion->ubicacion}}">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="text-sm">Descripción</label>
                    <textarea name="descripcion" rows="5" class="form-control"
                placeholder="Ingrese la descripcion de la ubicacion">{{$ubicacion->descripcion}}</textarea>
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