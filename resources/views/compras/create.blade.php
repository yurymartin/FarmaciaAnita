<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal-default">
    <i class="fas fa-plus-square"></i>
    NUEVA COMPRA
</button>
{!! Form::open(['route'=>'compras.store', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
{{ Form::token() }}
<div class="col-md-12">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>NUEVA COMPRA</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-sm" for="proveedor_id">Proveedor</label>
                                <select class="form-control select2bs4" name="proveedor_id">
                                    @foreach ($proveedores as $proveedor)
                                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-sm" for="tipo_comprobante_id">Tipo de Comprobante</label>
                                <select class="form-control select2bs4" name="tipo_comprobante_id">
                                    @foreach ($tipo_comprobantes as $tipo_comprobante)
                                    <option value="{{$tipo_comprobante->id}}">{{$tipo_comprobante->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="serie_comprobante" class="text-sm">Serie Comprobante</label>
                            <input type="text" class="form-control" name="serie_comprobante"
                                placeholder="la serie del comprobante">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="num_comprobante" class="text-sm">Numero Comprobante</label>
                            <input type="text" class="form-control" name="num_comprobante"
                                placeholder="el numero del comprobante">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-sm" for="estado_compra_id">Estado</label>
                                <select class="form-control select2bs4" name="estado_compra_id">
                                    @foreach ($estado_compras as $estado_compra)
                                    <option value="{{$estado_compra->id}}">{{$estado_compra->estado}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-sm" for="producto_id">LISTA DE PRODUCTOS</label>
                                                <select class="form-control select2bs4 " name="producto_id" id="producto_id">
                                                    @foreach ($productos as $producto)
                                                    <option value="{{$producto->id}}">{{$producto->codigo}} {{$producto->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="cantidad" class="text-sm">Cantidad</label>
                                                <input type="number" class="form-control" name="cantidad" id="cantidad"
                                                    placeholder="cantidad">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="precio_compra" class="text-sm">Precio Compra</label>
                                                <input type="number" class="form-control" name="precio_compra" id="precio_compra"
                                                    placeholder="P.compra" step="0.001">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="precio_venta" class="text-sm">Precio Venta</label>
                                                <input type="number" class="form-control" name="precio_venta" id="precio_venta"
                                                    placeholder="P.venta" step="0.001">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button type="button" id="bt_add"
                                                    class="btn btn-primary">Agregar</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table id="tabla_compra" class="table table-bordered table-striped text-xs">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th style="width: 5%">OPCIONES</th>
                                                        <th style="width: 25%">PRODUCTO</th>
                                                        <th style="width: 20%">CANTIDAD</th>
                                                        <th style="width: 20%">PRECIO COMPRA</th>
                                                        <th style="width: 20%">PRECIO VENTA</th>
                                                        <th style="width: 10%">SUBTOTAL</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <th>TOTAL</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>
                                                        <input type="hidden" id="total_hidden" name="total_hidden" value="S/. 0.00">
                                                        <h4 id="total">S/. 0.00</h4>
                                                    </th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="borrado" value="0">
                </div>
                <div class="modal-footer" id="guardar">
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

@push('scripts')
<script>
    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];
    $('#guardar').hide();

    function agregar() {
        producto_id=$("#producto_id").val();
        producto=$("#producto_id option:selected").text();
        cantidad=$('#cantidad').val();
        precio_compra=$('#precio_compra').val();
        precio_venta=$('#precio_venta').val();

        if (producto_id!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="") {
            subtotal[cont]=(cantidad*precio_compra);
            total=total+subtotal[cont];

            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning btn-sm" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $('#total').html("S/. "+total);
            $('#total_hidden').val(total);
            evaluar();
            $('#tabla_compra').append(fila);    
        }else{
            alert('ERROR AL INGRESAR UN PRODUCTO');
        }
    }

    function limpiar(){
        $('#cantidad').val("");
        $('#precio_compra').val("");
        $('#precio_venta').val("");
    }
    function evaluar(){
        if(total>0){
            $('#guardar').show();
        }else{
            $('#guardar').hide();
        }
    }
    function eliminar(index) {
        total = total-subtotal[index];
        $('#total').html("S/. "+total);
        $('#total_hidden').val(total);
        $("#fila"+index).remove();  
        evaluar();
    }
</script>
@endpush
{!! Form::close() !!}