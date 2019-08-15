<!-- Modal -->
<div class="modal fade onShowEdicionCategoria" tabindex="-1" role="dialog" id="modalEditar_{{ $categoria->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Modificar categoria</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_categoria', ['id' => $categoria->id])}}" data-categoria="{{ $categoria }}" id="form-editar_{{$categoria->id}}" name="form-editar" class="form-horizontal d-inline" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.categoria.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>