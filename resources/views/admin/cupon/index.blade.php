@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Cupones
@endsection
@section('titulosec')
    Cupones
@endsection
@section('descripcion')
    Lista de cupones y creación de éstos.
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
@endsection
@section('breadcrumb')
    <li class="active">Cupones</li>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initSelect2.js")}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset("assets/$theme/bower_components/moment/min/moment-with-locales.min.js")}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{asset("assets/pages/scripts/admin/initDateTimePicker.js")}}" type="text/javascript"></script>
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
                                <i class="fa fa-fw fa-plus"></i> Nuevo cupón
                            </button>
                            @include('admin.cupon.crear')
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped" id="tabla-data">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Descuento</th>
                                <th>Estado</th>
                                <th style="text-align:right">Fecha creación</th>
                                <th style="text-align:right">Fecha inicio</th>
                                <th style="text-align:right">Fecha término</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cupons as $index => $cupon)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$cupon->nombre}}</td>
                                    <td>{{$cupon->descuento}}</td>
                                    <td>@if ($cupon->estado === 1) Activo @elseif ($cupon->estado === 0) Inactivo @endif</td>
                                    <td align="right">{{$cupon->fecha_creacion ? date('d-m-Y H:i', strtotime($cupon->fecha_creacion)) : ''}}</td>
                                    <td align="right">{{$cupon->fecha_inicio ? date('d-m-Y H:i', strtotime($cupon->fecha_inicio)) : ''}}</td>
                                    <td align="right">{{$cupon->fecha_termino ? date('d-m-Y H:i', strtotime($cupon->fecha_termino)) : ''}}</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $cupon->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.cupon.editar')
                                        <form action="{{route('eliminar_cupon', ['id' => $cupon->id])}}" class="form-eliminar d-inline" method="POST">
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