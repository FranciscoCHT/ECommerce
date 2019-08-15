@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Ofertas
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
            <div class="box box-primary">
                <div class="box-header with-border" style="padding: 15px;">
                    <h3 class="box-title">Ofertas</h3>
                    <div class="box-tools pull-right" style="top: 10px;">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modalCrear" id="open">
                            <i class="fa fa-fw fa-reply-all"></i> Nuevo registro
                        </button>
                        @include('admin.oferta.crear')
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-dark table-bordered table-hover table-striped" id="tabla-data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Porcentaje</th>
                                <th>Descripcion</th>
                                <th>Fecha inicio</th>
                                <th>Fecha término</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ofertas as $oferta)
                                <tr>
                                    <td>{{$oferta->id}}</td>
                                    <td>{{$oferta->nombre}}</td>
                                    <td>{{$oferta->porcentaje}}</td>
                                    <td>{{$oferta->descripcion}}</td>
                                    <td>{{$oferta->fecha_inicio ? date('d-m-Y H:i', strtotime($oferta->fecha_inicio)) : ''}}</td>
                                    <td>{{$oferta->fecha_termino ? date('d-m-Y H:i', strtotime($oferta->fecha_termino)) : ''}}</td>
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