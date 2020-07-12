<!-- Modal -->
<div class="modal fade onShowAddStock" role="dialog" id="modalAddStock">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Añadir stock</h5>
            </div>
            <div class="modal-body">
                <form id="form-addStock" name="form-addStock" class="form-horizontal d-inline" method="POST">
                    @csrf
                    <div class="box-body">
                        @include('admin.producto.addStockForm')
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default btn-sm pull-left" id="cancelado" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success btn-sm pull-right" id="guardarStock">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>