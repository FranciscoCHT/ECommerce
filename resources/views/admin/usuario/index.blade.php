@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Usuarios
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Usuarios</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-hover table-striped">
                        <head>
                            <tr>
                                <th>ID</th>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                        </head>
                        <tbody>
                            {{-- @php // manera de abrir y llamar php en blade de laravel
                                $x = 0;
                            @endphp --}}
                            {{-- @if () // manera de abrir y llamar if en blade de laravel 
                            @else
                            @endif --}}
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario ->id}}</td>
                                    <td>{{$usuario ->rut}}</td>
                                    <td>{{$usuario ->nombre}}</td>
                                    <td>{{$usuario ->apellido}}</td>
                                    <td>{{$usuario ->email}}</td>
                                    <td>{{$usuario ->tipo}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection