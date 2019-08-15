<!-- Modal -->
<div class="modal fade validarEdicion onShowEdicionProducto" tabindex="-1" role="dialog" id="modalEditar_{{ $producto->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Modificar producto</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_producto', ['id' => $producto->id])}}" data-producto="{{ $producto }}" id="form-editar_{{$producto->id}}" name="form-editar" class="form-horizontal d-inline" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.producto.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>