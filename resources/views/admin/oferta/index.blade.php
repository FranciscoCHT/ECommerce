@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Ofertas
@endsection
@section('titulosec')
    Ofertas
@endsection
@section('descripcion')
    Lista de ofertas y creación de éstas.
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
@endsection
@section('breadcrumb')
    <li class="active">Ofertas</li>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/inputmask/dist/jquery.inputmask.bundle.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initInputMask.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initSelect2.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/initDataTable.js")}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset("assets/$theme/bower_components/moment/min/moment-with-locales.min.js")}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{asset("assets/pages/scripts/admin/initDateTimePicker.js")}}" type="text/javascript"></script>
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
                        <i class="fa fa-fw fa-plus"></i> Nueva oferta
                    </button>
                    @include('admin.oferta.crear')
                </div>
            </div>
            <div class="box">
                <div class="box-header" style="background-color:#f5f5f5;">
                    <div class="box-tools" style="position: initial;float:right;">
                        <div class="input-group input-group-md" style="width: 300px;">
                            <input type="text" class="form-control input-md" id="searchData" placeholder="Buscar...">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped tabla-data" id="tabla-data">
                        <thead>
                            <tr>
                                <th class="width70">N°</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th style="text-align:right">Porcentaje</th>
                                <th style="text-align:right">Fecha inicio</th>
                                <th style="text-align:right">Fecha término</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ofertas as $index => $oferta)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$oferta->nombre}}</td>
                                    <td>{{$oferta->descripcion}}</td>
                                    <td>@if ($oferta->estado === 1) Activa @elseif ($oferta->estado === 0) Inactiva @endif</td>
                                    <td align="right">{{$oferta->porcentaje}} %</td>
                                    <td align="right">{{$oferta->fecha_inicio ? date('d-m-Y H:i', strtotime($oferta->fecha_inicio)) : ''}}</td>
                                    <td align="right">{{$oferta->fecha_termino ? date('d-m-Y H:i', strtotime($oferta->fecha_termino)) : ''}}</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $oferta->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.oferta.editar')
                                        <form action="{{route('eliminar_oferta', ['id' => $oferta->id])}}" class="form-eliminar d-inline" method="POST">
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