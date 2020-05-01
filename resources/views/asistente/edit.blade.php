{!! Form::open(['action' => ['Producto_has_SintomaController@update', $producto_ha_sintoma->id], 'method' => 'PATCH'])
!!}
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$producto_ha_sintoma->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR LA RECETA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="intensidad" class="text-sm">Efectividad Rango[1-100]%</label>
                            <input type="number" class="form-control" name="intensidad" min="1" max="100"
                                value="{{$producto_ha_sintoma->intensidad}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-sm" for="tipo_id">Enfermad</label>
                            <select class="form-control" name="sintoma_id">
                                @foreach ($sintomas as $sintoma)
                                @if (($producto_ha_sintoma->sintoma_id) == $sintoma->id)
                                <option value="{{$sintoma->id}}" selected>{{$sintoma->nombre}}</option>
                                @else
                                <option value="{{$sintoma->id}}">{{$sintoma->nombre}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-sm" for="tipo_id">Producto</label>
                            <select class="form-control" name="producto_id">
                                @foreach ($productos as $producto)
                                @if (($producto_ha_sintoma->producto_id) == $producto->id)
                                <option value="{{$producto->id}}" selected>CODIGO: {{$producto->codigo}} -
                                    PRODUCTO: {{$producto->nom}} </p>
                                </option>
                                @else
                                <option value="{{$producto->id}}">CODIGO: {{$producto->codigo}} -
                                    PRODUCTO: {{$producto->nom}} </p>
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
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