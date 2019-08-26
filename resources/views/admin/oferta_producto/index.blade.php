@extends("theme.$theme.layout") <!-- Extiende el layout, pudiendo modificar, a diferencia de include, que no podria usar section-->
@section('titulo')
    Asignar oferta
@endsection
@section('titulosec')
    Asignar oferta
@endsection
@section('descripcion')
    Designe los productos a los cuáles se le aplicará la oferta.
@endsection

@section("scripts")
{{-- <script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script> --}}
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/initSelect2.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            {{-- <div class="top-boton-left"> --}}
            <div>
                <form action="{{route('guardar_oferta_producto')}}" id="form-crear" name="form-crear" class="form-horizontal d-inline" method="POST">
                    @csrf
                    <div class="box-body" style="padding-top: 0px;">
                        @include('admin.oferta_producto.form')
                    </div>
                    <div class="box-footer">
                        @include('includes.boton-form-crear')
                    </div>
                </form>
            </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection