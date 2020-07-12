<!-- Modal -->
<div class="modal fade onShowCrearGal" role="dialog" id="modalCrearGaleria">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Crear galería</h5>
            </div>
            <div class="modal-body">
                <form id="form-crearGaleria" name="form-crearGaleria" class="form-horizontal d-inline" method="POST" action="{{route('guardar_galeria')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @include('admin.producto.galeria.formGaleria')
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default btn-sm pull-left" id="cancelado" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success btn-sm pull-right" id="guardarGaleria">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>