@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Productos
@endsection
@section('titulosec')
    Productos
@endsection
@section('descripcion')
    Lista de productos y creación de éstos.
@endsection
@section('breadcrumb')
    <li class="active">Productos</li>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/i18n/es.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initSelect2.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/inputmask/dist/jquery.inputmask.bundle.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initInputMask.js")}}" type="text/javascript"></script>
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
                        <i class="fa fa-fw fa-plus"></i> Nuevo producto
                    </button>
                    @include('admin.producto.crear')
                </div>
            </div>
            <div class="box">
                <div class="box-header" style="background-color:#f5f5f5;">
                    <div class="box-tools" style="position: initial;float:right;">
                        <div class="input-group input-group-md" style="width: 300px;">
                            <input type="text" class="form-control input-md" placeholder="Buscar...">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped" id="tabla-data">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Stock</th>
                                <th>Categoría</th>
                                <th style="text-align: right;">Precio</th>
                                <th style="text-align: right;">Precio oferta</th>
                                <th>Fecha de modificación</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $index => $producto)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->descripcion}}</td>
                                    <td>@if ($producto->estado === 1) Activo @elseif ($producto->estado === 0) Inactivo @endif</td>
                                    <td>{{$producto->stock}}</td>
                                    <td>@if ($producto->categoria == null) Sin categoría @else {{$producto->categoria->nombre}} @endif</td>
                                    <td align="right">${{number_format($producto->precio, 0, '', '.')}}</td>
                                    <td align="right">${{number_format($producto->precio_oferta, 0, '', '.')}}</td>
                                    <td>@if ($producto->fecha_modificacion == null) Sin modificación @else {{$producto->fecha_modificacion ? date('d-m-Y H:i', strtotime($producto->fecha_modificacion)) : ''}} @endif</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $producto->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.producto.editar')
                                        <form action="{{route('eliminar_producto', ['id' => $producto->id])}}" class="form-eliminar d-inline" method="POST">
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