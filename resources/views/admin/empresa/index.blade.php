@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Empresa
@endsection
@section('titulosec')
    Datos de empresa
@endsection
@section('descripcion')
    Configuración de datos de la empresa y contacto.
@endsection
@section('breadcrumb')
    <li class="active">Empresa</li>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/inputmask/dist/jquery.inputmask.bundle.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initInputMask.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <form action="{{route('actualizar_empresa', ['id' => $id])}}" data-empresa="{{ $empresas }}" id="form-editar_{{$id}}" name="form-editar" class="d-inline" method="POST" enctype="multipart/form-data">
                @csrf @method("put")
                @include('admin.empresa.form')
                <div class="col-lg-12">
                    <button type="submit" style="margin-bottom:11px;" class="btn btn-success btn-md pull-right">Actualizar</button>
                </div>
            </form>
            {{-- <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped" id="tabla-data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Razón social</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Tipo</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                                <tr>
                                    <td>{{$empresa->id}}</td>
                                    <td>{{$empresa->rut}}</td>
                                    <td>{{$empresa->nombre}}</td>
                                    <td>{{$empresa->razon_social}}</td>
                                    <td>{{$empresa->telefono}}</td>
                                    <td>{{$empresa->direccion}}</td>
                                    <td>{{$empresa->tipo}}</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $empresa->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.empresa.editar')
                                        <form action="{{route('eliminar_producto', ['id' => $empresa->id])}}" class="form-eliminar d-inline" method="POST">
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
            </div> --}}
        </div>
    </div>
@endsection