<!-- Modal -->
<div class="modal fade onShowEdicionCuenta" tabindex="-1" role="dialog" id="modalEditar_{{ $cuenta_bancaria->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Modificar cuenta bancaria</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_cuenta_bancaria', ['id' => $cuenta_bancaria->id])}}" data-cuenta_bancaria="{{ $cuenta_bancaria }}" id="form-editar_{{$cuenta_bancaria->id}}" name="form-editar" class="form-horizontal d-inline" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.cuenta_bancaria.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>