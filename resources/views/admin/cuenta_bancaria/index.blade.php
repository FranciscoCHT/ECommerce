@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Cuentas bancarias
@endsection
@section('titulosec')
    Cuentas bancarias
@endsection
@section('descripcion')
    Lista de cuentas bancarias de empresas y creación de éstas.
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="top-boton-left">
                <div>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-block btn-success btn-md" data-toggle="modal" data-target="#modalCrear" id="open">
                        <i class="fa fa-fw fa-plus"></i> Nuevo registro
                    </button>
                    @include('admin.cuenta_bancaria.crear')
                </div>
            </div>
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped" id="tabla-data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>N° cuenta</th>
                                <th>Banco</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Empresa</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuenta_bancarias as $cuenta_bancaria)
                                <tr>
                                    <td>{{$cuenta_bancaria->id}}</td>
                                    <td>{{$cuenta_bancaria->rut}}</td>
                                    <td>{{$cuenta_bancaria->nombre}}</td>
                                    <td>{{$cuenta_bancaria->tipo}}</td>
                                    <td>{{$cuenta_bancaria->numero_cuenta}}</td>
                                    <td>{{$cuenta_bancaria->banco}}</td>
                                    <td>{{$cuenta_bancaria->correo}}</td>
                                    <td>{{$cuenta_bancaria->estado}}</td>
                                    <td>{{$cuenta_bancaria->empresa->nombre}}</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $cuenta_bancaria->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.cuenta_bancaria.editar')
                                        <form action="{{route('eliminar_producto', ['id' => $cuenta_bancaria->id])}}" class="form-eliminar d-inline" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection