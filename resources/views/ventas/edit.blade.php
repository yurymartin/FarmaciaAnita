{!! Form::open(['action' => ['VentaController@update', 1], 'method' => 'PATCH','files' => true, 'role'=>'form']) !!}
{{ Form::token() }}
<button type="button" class="btn btn-danger float-right btn-sm" data-toggle="modal" data-target="#modal-cliente"
    style="margin-right: 10px">
    <i class="nav-icon fas fa-user-injured"></i>
    CONSULTAR LOS CLIENTES
</button>
<div class="modal fade text-left" id="modal-cliente">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">CONSULTAR CLIENTE</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="text-sm" for="cliente_id">CLIENTES<span
                                            class="badge badge-info">consultar
                                            el
                                            cliente por medio de dni o nombres o
                                            apellidos</span></label>
                                    <select class="form-control select2bs4" name="cliente_id">
                                        @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id}}">
                                            {{$cliente->personas->dni}} - {{$cliente->personas->nombres}}
                                            {{$cliente->personas->apellidos}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="button" id="button" class="btn btn-danger"
                                        style="margin-top: 28px">CREAR USUARIO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="crear_cliente">
                    <div class="col-md-2 form-group">
                        <label for="dni" class="text-sm">DNI O RUC</label>
                        <input type="number" class="form-control" name="dni" placeholder="Ingrese el DNI O RUC"
                            id="dni">
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="nombres" class="text-sm">Nombres</label>
                        <input type="text" class="form-control" name="nombres"
                            placeholder="Ingrese los nombres del cliente">
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="apellidos" class="text-sm">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos"
                            placeholder="Ingrese los apellidos del cliente">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="direccion" class="text-sm">Dirección</label>
                        <input type="text" class="form-control" name="direccion"
                            placeholder="Ingrese la direccion del cliente">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-sm" for="genero">Genero</label>
                            <select class="form-control" name="genero">
                                <option value="1">MASCULINO</option>
                                <option value="0">FEMENINO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-sm" for="activo">Estado</label>
                            <select class="form-control" name="activo">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="borrado" value="0">
            <div class="modal-footer" id="botones_cliente">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="cancelar"><i
                        class="far fa-window-close"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary swalDefaultSuccess btn-sm"  id="guardar"><i class="far fa-save"></i>
                    Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@push('script_cliente')
<script>
    $( '#crear_cliente' ).hide();
    $( '#botones_cliente' ).hide();
    $( "#button" ).click(function() {
        $( "#dni" ).focus();
        $( '#crear_cliente' ).show();
        $( '#botones_cliente' ).show();
    });
    $( "#cerrar" ).click(function() {
        $( '#crear_cliente' ).hide();
        $( '#botones_cliente' ).hide();
    });
    $( "#cancelar" ).click(function() {
        $( '#crear_cliente' ).hide();
        $( '#botones_cliente' ).hide();
    });
    $( "#guardar" ).click(function() {
        $( '#crear_cliente' ).hide();
        $( '#botones_cliente' ).hide();
    })
</script>
@endpush
{!! Form::close() !!}