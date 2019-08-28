@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Empresas
@endsection
@section('titulosec')
    Empresa
@endsection
@section('descripcion')
    Configuración de datos de la empresa y contacto.
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
            <div class="col-lg-6">
                <span style="color: #6a828e;font-size:16px;"><b>Datos de la empresa</b></span>
                <div class="" style="-webkit-column-count: 1;-webkit-column-width: 300px;-webkit-column-gap: 2em;border-top: 1px solid #7eb2be;padding-bottom: 16px;padding-top: 8px; margin-bottom: 0px;">
                    <div class="form-group">
                        <label for="rut" class="control-label requerido">Rut</label>
                        <div class="">
                            <input type="text" name="rut" id="rut" class="form-control rutMask" placeholder="XX.XXX.XXX-X" value="{{old('rut')}}" autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre" class=" control-label requerido">Nombre</label>
                        <div class="">
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="razon_social" class=" control-label">Razón social</label>
                        <div class="">
                            <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{old('razon_social')}}" autocomplete="off"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="telefono" class="col-lg-3 control-label requerido">Teléfono</label>
                    <div class="col-lg-8">
                        <input type="text" name="telefono" id="telefono" class="form-control onlyNum" value="{{old('telefono')}}" autocomplete="off" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion" class="col-lg-3 control-label">Direccion</label>
                    <div class="col-lg-8">
                        <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}" autocomplete="off"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-lg-3 control-label">Tipo</label>
                    <div class="col-lg-8">
                        <input type="text" name="tipo" id="tipo" class="form-control" value="{{old('tipo')}}" autocomplete="off"/>
                    </div>
                </div>
            </div>
            <div style="-webkit-column-count: 2;-webkit-column-width: 280px;-webkit-column-gap: 2em;margin-bottom:15px;">
                

                <span style="color: #6a828e;font-size:16px;"><b>Datos de contacto</b></span>
                <div class="" style="-webkit-column-count: 1;-webkit-column-width: 300px;-webkit-column-gap: 2em;border-top: 1px solid #7eb2be;padding-bottom: 16px;padding-top: 8px; margin-bottom: 0px;">
                    <div style="-webkit-column-count: 2;-webkit-column-width: 150px;">
                        <div>
                            qeweqwe
                        </div>
                        <div>
                            asdasd
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-boton-left">
                <div>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-block btn-success btn-md" data-toggle="modal" data-target="#modalCrear" id="open">
                        <i class="fa fa-fw fa-plus"></i> Nuevo registro
                    </button>
                    @include('admin.empresa.crear')
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
            </div>
        </div>
    </div>
@endsection