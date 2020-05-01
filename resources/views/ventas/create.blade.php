<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal-default">
    <i class="fas fa-plus-square"></i>
    REALIZAR NUEVA VENTA
</button>
{!! Form::open(['route'=>'ventas.store', 'method'=>'POST', 'files' => true, 'role' => 'form', 'id'=>'form']) !!}
{{ Form::token() }}
<div class="col-md-12">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>NUEVA VENTA</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm" for="cliente_id">Cliente</label>
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
                                <label class="text-sm" for="tipo_comprobante_id">Tipo de Comprobante</label>
                                <select class="form-control select2bs4" name="tipo_comprobante_id">
                                    @foreach ($tipo_comprobantes as $tipo_comprobante)
                                    <option value="{{$tipo_comprobante->id}}">{{$tipo_comprobante->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-sm" for="pago_id">Tipo de pago</label>
                                <select class="form-control select2bs4" name="pago_id">
                                    @foreach ($pagos as $pago)
                                    <option value="{{$pago->id}}">{{$pago->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-sm" for="estado_venta_id">Estado</label>
                                <select class="form-control select2bs4" name="estado_venta_id">
                                    @foreach ($estado_ventas as $estado_venta)
                                    <option value="{{$estado_venta->id}}">{{$estado_venta->estado}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="text-sm" for="producto_id">LISTA DE PRODUCTOS</label>
                                                <select class="form-control select2bs4" name="producto_id"
                                                    id="producto_id">
                                                    @foreach ($productos as $producto)
                                                    <option
                                                        value="{{$producto->id}}_{{$producto->stock}}_{{$producto->precio_promedio}}">{{$producto->producto}} - {{$producto->ubicacion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="stock" class="text-sm">Stock</label>
                                                <input type="text" disabled class="form-control" name="stock" id="stock"
                                                    placeholder="stock">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="precio_venta" class="text-sm">Precio</label>
                                                <input type="text" disabled class="form-control" name="precio_venta"
                                                    id="precio_venta" placeholder="P.venta" step="0.01">
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
                                                <label for="descuento" class="text-sm">Descuento</label>
                                                <input type="number" class="form-control" name="descuento"
                                                    id="descuento" placeholder="P.compra" step="0.001" id="descuento">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <button type="button" id="bt_add" class="btn btn-primary btn-block"
                                                    style="margin-top: 28px"><i class="fas fa-cart-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table id="tabla_venta" class="table table-bordered table-striped text-xs">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th style="width: 5%">OPCIONES</th>
                                                        <th style="width: 30%">PRODUCTO</th>
                                                        <th style="width: 20%">CANTIDAD</th>
                                                        <th style="width: 20%">PRECIO VENTA</th>
                                                        <th style="width: 10%">PRECIO DESCUENTO</th>
                                                        <th style="width: 15%">SUBTOTAL</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th class="text-right">TOTAL:</th>
                                                    <th>
                                                        <input type="hidden" id="total_hidden" name="total_hidden"
                                                            value="S/. 0.00">
                                                        <h5 id="total" class="text-xs">S/. 0.00</h5><input type="hidden"
                                                            name="total_venta" id="total_venta">
                                                    </th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END CARD OF VENTAS-->
                        </div>
                        <div class="col-md-9">

                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label for="monto_pagado" class="col-sm-5 col-form-label">MONTO PAGADO:</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" id="monto_pagado"
                                        placeholder="monto pagado">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vuelto" class="col-sm-5 col-form-label">VUELTO:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="vuelto" placeholder="vuelto" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <input type="hidden" name="borrado" value="0">
                    <input type="hidden" name="activo" value="1">
                    <input type="hidden" name="empleado_id" value="{{ Auth::user()->empleado_id }}">
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
    $(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});
    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();
        });
        $('#descuento').keypress(function(e){   
               if(e.which == 13){      
                agregar();  
               }   
        });
        /*$('#monto_pagado').keypress(function(e){   
               if(e.which == 13){      
                   monto_pagado=parseFloat($("#monto_pagado").val());
                   deuda=parseFloat($("#total_venta").val());
                if(monto_pagado!=""){
                    if(deuda <= monto_pagado){
                        vuelto = monto_pagado - $('#total_venta').val();
                        $("#vuelto").val(vuelto.toFixed(1));
                    }else{
                        alert('ES MONTO PAGADO ES MENOR ALA DEUDA');
                    }
                }
            }   
        });*/
        $('#monto_pagado').keyup(function(){   
                   monto_pagado=parseFloat($("#monto_pagado").val());
                   deuda=parseFloat($("#total_venta").val());
                if(monto_pagado!=""){
                    if(deuda <= monto_pagado){
                        vuelto = monto_pagado - $('#total_venta').val();
                        $("#vuelto").val(vuelto.toFixed(1));
                    }else{
                        $("#vuelto").val('Falta')
                }
            }   
        }); 
    });

    var cont = 0;
    total = 0;
    subtotal = [];
    $('#guardar').hide();
    $('#producto_id').change(mostrarValores);
    $("#num_descuento" ).focus();


    function mostrarValores() {
        datosProducto = document.getElementById('producto_id').value.split('_');
        $("#precio_venta").val(datosProducto[2]);
        $("#stock").val(datosProducto[1]);
    }

    function agregar() 
    {
        datosProducto = document.getElementById('producto_id').value.split('_');
        producto_id=datosProducto[0];
        producto=$("#producto_id option:selected").text();
        cantidad=$('#cantidad').val();
        descuento=$('#descuento').val();
        precio_venta=$('#precio_venta').val();
        stock=$('#stock').val();


        if (producto_id!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="") {
            if (parseInt(stock)>=parseInt(cantidad)) 
            {
            subtotal[cont]=(cantidad*precio_venta-descuento);
            total=total+subtotal[cont];
            var fila='<tr class="selected" id="fila'+cont+'"><td class="text-center"><button type="button" class="btn btn-warning btn-sm" onclick="eliminar('+cont+');"><i class="far fa-trash-alt"></i></button></td><td><input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="hidden" name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $('#total').html("S/. "+total);
            $('#total_venta').val(total.toFixed(1));
            $('#total_hidden').val(total);
            evaluar();
            $('#tabla_venta').append(fila);  
            }else {
                alert("LA CANTIDAD A VENDER SUPERA EL STOCK");
            }
                
        }else{
            alert("ERROR AL INGRESAR UN PRODUCTO ALA COMPRA");
        }
    }

    function limpiar(){
        $('#cantidad').val("");
        $('#descuento').val("");
        $('#stock').val("");
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
        $('#total').html("S/. "+total.toFixed(1));
        $('#total_venta').val(total);
        $('#total_hidden').val(total);
        $("#fila"+index).remove();  
        evaluar();
    }
</script>
@endpush
{!! Form::close() !!}