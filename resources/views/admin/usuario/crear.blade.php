@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Usuarios
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear usuarios</h3>
                </div>
                <div class="box-body">
                    Aquí el formulario.
                </div>
            </div>
        </div>
    </div>
@endsection