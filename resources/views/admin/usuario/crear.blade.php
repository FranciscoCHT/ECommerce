<!-- Modal -->
<div class="modal fade onShowCrear onShowCrearSelect" tabindex="-1" role="dialog" id="modalCrear">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Crear usuario</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('guardar_usuario')}}" id="form-crear" name="form-crear" class="form-horizontal d-inline" method="POST">
                    @csrf
                    <div class="box-body">
                        @include('admin.usuario.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-crear')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>