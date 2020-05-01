{!! Form::open(['action' => ['ProveedorController@update', $proveedor->id], 'method' => 'PATCH','files' => true, 'role'=>'form']) !!}
{{ Form::token() }}
<div class="modal fade text-left" id="modal-edit-{{$proveedor->id}}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar el proveedor: <b>{{$proveedor->nombre}}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label for="ruc" class="text-sm">RUC</label>
                        <input type="number" class="form-control" name="ruc" placeholder="Ingrese el ruc" value="{{$proveedor->ruc}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="nombre" class="text-sm">Nombre</label>
                        <input type="text" class="form-control" name="nombre"
                            placeholder="Ingrese los nombre del proveedor" value="{{$proveedor->nombre}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="tel" class="text-sm">Telefono</label>
                        <input type="text" class="form-control" name="telefono"
                            placeholder="Ingrese el telefono del proveedor" value="{{$proveedor->telefono}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email" class="text-sm">Email</label>
                        <input type="email" class="form-control" name="email"
                            placeholder="Ingrese el email del proveedor" value="{{$proveedor->email}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="direccion" class="text-sm">Direccion</label>
                        <input type="text" class="form-control" name="direccion"
                            placeholder="Ingrese el email del proveedor" value="{{$proveedor->direccion}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="descripcion" class="text-sm">Descripcion</label>
                        <textarea name="descripcion" rows="3" class="form-control"
                            placeholder="Ingrese la descripcion del proveedor">{{$proveedor->descripcion}}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
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
<!-- /.modal -->
{!! Form::close() !!}