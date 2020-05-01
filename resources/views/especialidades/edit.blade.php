{!! Form::open(['action' => ['EspecialidadController@update', $especialidad->id], 'method' => 'PATCH']) !!} 
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$especialidad->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar la Especialidad: <b>{{$especialidad->nombre}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre" class="text-sm">Especialidad</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese la especialidad"
                        value="{{$especialidad->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="text-sm">Descripción</label>
                    <textarea name="descripcion" rows="5" class="form-control"
                placeholder="Ingrese la descripcion de la especialidad">{{$especialidad->descripcion}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                    class="far fa-window-close"></i> Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{!! Form::close() !!}