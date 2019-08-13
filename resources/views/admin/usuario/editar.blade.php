<!-- Modal -->
<div class="modal fade onShowEdicion" tabindex="-1" role="dialog" id="modalEditar_{{ $usuario->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Modificar usuario</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('actualizar_usuario', ['id' => $usuario->id])}}" data-usuario="{{ $usuario }}" id="form-editar_{{$usuario->id}}" name="form-editar" class="form-horizontal d-inline" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.usuario.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Editar usuarios
@endsection

@section("scripts")
    <script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar usuarios</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route('usuario')}}" class="btn btn-block btn-info btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                        </a>
                    </div>
                </div>
                <form action="{{route('actualizar_usuario', ['id' => $usuarios->id])}}" id="form-general" class="form-horizontal" method="POST">
                    @csrf @method("put")
                    <div class="box-body">
                        @include('admin.usuario.form')
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-editar')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection --}}