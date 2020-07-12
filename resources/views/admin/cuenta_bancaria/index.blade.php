@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Cuentas bancarias
@endsection
@section('titulosec')
    Cuentas bancarias
@endsection
@section('descripcion')
    Lista de cuentas bancarias de empresa y creación de éstas.
@endsection
@section('breadcrumb')
    <li class="active">Cuentas bancarias</li>
@endsection

@push("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initSelect2.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/initDataTable.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/inputmask/dist/jquery.inputmask.bundle.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initInputMask.js")}}" type="text/javascript"></script>
@endpush

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="box">
                <div class="box-header" style="background-color:#f5f5f5;padding:13px 15px 13px 15px;">
                    <div class="box-tools" style="position: initial;float:right;">
                        <div class="input-group input-group-md" style="width: 300px;">
                            <input type="text" class="form-control input-md" id="searchData" placeholder="Buscar...">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="top-boton-left" style="margin-bottom:0px;">
                        <div>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-block btn-success btn-md" data-toggle="modal" data-target="#modalCrear" id="open">
                                <i class="fa fa-fw fa-plus"></i> Nueva cuenta
                            </button>
                            @include('admin.cuenta_bancaria.crear')
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped tabla-data table-button-del" id="tabla-data">
                        <thead>
                            <tr>
                                <th class="width70">N°</th>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>N° cuenta</th>
                                <th>Banco</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuenta_bancarias as $index => $cuenta_bancaria)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$cuenta_bancaria->rut}}</td>
                                    <td>{{$cuenta_bancaria->nombre}}</td>
                                    <td>{{$cuenta_bancaria->tipo}}</td>
                                    <td>{{$cuenta_bancaria->numero_cuenta}}</td>
                                    <td>{{$cuenta_bancaria->banco}}</td>
                                    <td>{{$cuenta_bancaria->correo}}</td>
                                    <td>@if ($cuenta_bancaria->estado === 1) Activa @elseif ($cuenta_bancaria->estado === 0) Inactiva @endif</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $cuenta_bancaria->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.cuenta_bancaria.editar')
                                        <form action="{{route('eliminar_cuenta_bancaria', ['id' => $cuenta_bancaria->id])}}" class="form-eliminar d-inline" method="POST">
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