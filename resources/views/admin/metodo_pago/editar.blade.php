<!-- Modal -->
<div class="modal fade validarEdicion onShowEdicionMetodo onShowEditarSelect" tabindex="-1" role="dialog" id="modalEditar_{{ $metodo_pago->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Modificar metodo de pago</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_metodo_pago', ['id' => $metodo_pago->id])}}" data-metodo_pago="{{ $metodo_pago }}" id="form-editar_{{$metodo_pago->id}}" name="form-editar" class="form-horizontal d-inline" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.metodo_pago.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>