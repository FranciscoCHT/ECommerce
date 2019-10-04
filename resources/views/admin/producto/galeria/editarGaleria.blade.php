<!-- Modal -->
<div class="modal fade onShowCrearGal" role="dialog" id="modalEditGaleria"> <!-- clase onShowCrearGal se mantiene para la inicialización de Select2 de producto. -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Editar galería</h5>
            </div>
            <div class="modal-body">
                <form id="form-editarGaleria" name="form-editarGaleria" class="form-horizontal d-inline" method="POST" enctype="multipart/form-data">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.producto.galeria.formEditGaleria')
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default btn-sm pull-left" id="cancelado" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success btn-sm pull-right" id="actualizarGaleria">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>