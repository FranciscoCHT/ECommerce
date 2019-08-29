@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Correos
@endsection
@section('titulosec')
    Correos
@endsection
@section('descripcion')
    Lista de correos de empresas y creación de éstos.
@endsection
@section('breadcrumb')
    <li class="active">Correos</li>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initSelect2.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="box">
                <div class="box-header" style="background-color:#f5f5f5;padding:13px 15px 13px 15px;">
                    <div class="box-tools" style="position: initial;float:right;">
                        <div class="input-group input-group-md" style="width: 300px;">
                            <input type="text" class="form-control input-md" placeholder="Buscar...">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="top-boton-left" style="margin-bottom:0px;">
                        <div>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-block btn-success btn-md" data-toggle="modal" data-target="#modalCrear" id="open">
                                <i class="fa fa-fw fa-plus"></i> Nuevo correo
                            </button>
                            @include('admin.correo.crear')
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped" id="tabla-data">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Email</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($correos as $index => $correo)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$correo->email}}</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $correo->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.correo.editar')
                                        <form action="{{route('eliminar_correo', ['id' => $correo->id])}}" class="form-eliminar d-inline" method="POST">
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