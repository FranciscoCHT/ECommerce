<!-- Modal -->
<div class="modal fade validarEdicion onShowEdicionEmpresa" tabindex="-1" role="dialog" id="modalEditar_{{ $empresa->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Modificar empresa</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_empresa', ['id' => $empresa->id])}}" data-empresa="{{ $empresa }}" id="form-editar_{{$empresa->id}}" name="form-editar" class="form-horizontal d-inline" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.empresa.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>