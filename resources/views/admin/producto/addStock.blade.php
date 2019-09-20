<!-- Modal -->
<div class="modal fade onShowAddStock" tabindex="-1" role="dialog" id="modalAddStock">
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
                <form action="{{route('guardar_producto')}}" id="form-addStock" name="form-addStock" class="form-horizontal d-inline" method="POST">
                    @csrf
                    <div class="box-body">
                        @include('admin.producto.addStockForm')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-crear')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>