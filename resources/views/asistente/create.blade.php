<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal-default">
    <i class="fas fa-plus-square"></i>
    NUEVA RECETA
</button>
{!! Form::open(['route'=>'asistente.store', 'method'=>'POST', 'files' => false, 'role' => 'form']) !!}
{{ Form::token() }}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">REGISTRAR NUEVA RECETA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="intensidad" class="text-sm">Efectividad Rango[1-100]%</label>
                            <input type="number" class="form-control" name="intensidad" min="1" max="100">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-sm" for="tipo_id">Enfermad ó sintoma</label>
                            <select class="form-control" name="sintoma_id">
                                @foreach ($sintomas as $sintoma)
                                <option value="{{$sintoma->id}}">{{$sintoma->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-sm" for="tipo_id">Producto</label>
                            <select class="form-control" name="producto_id">
                                @foreach ($productos as $producto)
                                <option value="{{$producto->id}}">{{$producto->codigo}} - {{$producto->nom}} </p></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
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