@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Usuarios
@endsection
@section('titulosec')
    Usuarios
@endsection
@section('descripcion')
    Lista de usuarios y creación de éstos.
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
                    @include('admin.usuario.crear')
                    {{-- <a href="{{route('crear_usuario')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Nuevo registro
                    </a> --}}
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
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th class="width70">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php // manera de abrir y llamar php en blade de laravel
                                $x = 0;
                            @endphp --}}
                            {{-- @if () // manera de abrir y llamar if en blade de laravel 
                            @else
                            @endif --}}
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->rut}}</td>
                                    <td>{{$usuario->nombre}}</td>
                                    <td>{{$usuario->apellido}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{$usuario->tipo}}</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <button type="submit" class="btn-accion-tabla tooltipsC" data-toggle="modal" data-target="#modalEditar_{{ $usuario->id }}" title="Editar este registro" id="open">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </button>
                                        @include('admin.usuario.editar')
                                        {{-- <a href="{{route('editar_usuario', ['id' => $usuario->id])}}" class="btn-accion-tabla tooltipsC">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a> --}}
                                        <form action="{{route('eliminar_usuario', ['id' => $usuario->id])}}" class="form-eliminar d-inline" method="POST">
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