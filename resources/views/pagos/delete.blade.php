{!! Form::open(['action' => ['PagoController@destroy', $pago->id], 'method' => 'DELETE']) !!} 
{{ Form::token() }}
<div class="modal fade text-center" id="modal-eliminar-{{$pago->id}}" style="margin-top: 100px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <i class="fas fa-exclamation-circle fa-10x text-warning"></i>
                <br><br>
                <h4 style="font-family: cursive"><b>¿Estás seguro de Eliminarlo?</b></h4>
                <h5 style="font-family: cursive"><small class="text-muted">¡No podrás revertir esto!</small></h5>
                <br><br>
                <button type="submit" class="btn btn-primary" style="font-family: cursive">¡Si, elimínelo!</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-family: cursive">Cancelar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
{!! Form::close() !!}