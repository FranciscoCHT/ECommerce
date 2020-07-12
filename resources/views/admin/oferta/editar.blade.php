<!-- Modal -->
<div class="modal fade validarEdicion onShowEdicionOferta onShowEditarSelect" tabindex="-1" role="dialog" id="modalEditar_{{ $oferta->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Modificar oferta</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_oferta', ['id' => $oferta->id])}}" data-oferta="{{ $oferta }}" id="form-editar_{{$oferta->id}}" name="form-editar" class="form-horizontal d-inline" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.oferta.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>