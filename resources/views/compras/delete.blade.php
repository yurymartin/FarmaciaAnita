{!! Form::open(['action' => ['CompraController@destroy', $compra->id], 'method' => 'DELETE']) !!}
{{ Form::token() }}
<div class="modal fade text-center" id="modal-eliminar-{{$compra->id}}" style="margin-top: 100px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 style="font-family: cursive"><b>CAMBIAR EL ESTADO DE LA COMPRA</b></h4>
                <i class="fab fa-docker fa-10x text-primary"></i>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group text-left">
                        <label class="text-sm" for="estado_compra_id">Estados de Compra</label>
                        <select class="form-control select2bs4" name="estado_compra_id">
                            @foreach ($estado_compras as $estado_compra)
                            <option value="{{$estado_compra->id}}">{{$estado_compra->estado}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary" style="font-family: cursive">¡Cambiar el Estado!</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    style="font-family: cursive">Cancelar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{!! Form::close() !!}