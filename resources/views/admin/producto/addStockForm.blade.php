<div>
    <div style="background-color:#eeeeee;"><span style="padding-left:10px;color: #6a828e;font-size:16px;letter-spacing: 1px;"><b>Seleccione un producto</b></span></div>
    <div class="form-group" style="font-size:12px;margin-right: 0px;margin-left: 0px;padding-bottom: 16px;padding-top: 12px; margin-bottom: 0px;">
        <div class="col-lg-12">
            <select class="form-control select2ProductStock required" style="width: 100%" data-error="Escoja un producto..." data-placeholder="Buscar producto..." name="producto" id="producto" required>
                <option value="" selected disabled hidden></option>
                @foreach($productos as $index => $producto)
                    <option data-preciostock="{{$producto->precio}}" data-namestock="{{$producto->nombre}}" value="{{$producto->id}}" @if (old('producto') == $producto->id) selected="selected" @endif>{{$producto->nombre}} - {{str_limit($producto->descripcion, 30, '...')}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div>
    <div style="background-color:#eeeeee;"><span style="padding-left:10px;color: #6a828e;font-size:16px;letter-spacing: 1px;"><b>Datos de producto a agregar</b></span></div>
    <div class="form-group" style="font-size:12px;margin-right: 0px;margin-left: 0px;;padding-bottom: 16px;padding-top: 0px; margin-bottom: 0px;">
        <div style="font-size:12px;" class="col-sm-5">
            <label style="padding-top:10px;" for="precioStock" class="control-label requerido">Precio</label>
            <div class="" style="float:none;">
                <input style="font-size:12px;" type="text" name="precioStock" id="precioStock" class="form-control precioMask" placeholder="$" value="{{old('precioStock')}}" autocomplete="off" required/>
            </div>
        </div>
        <div style="font-size:12px;" class="col-sm-5">
            <label style="padding-top:10px;" for="cantidad" class="control-label requerido">Cantidad</label>
            <div class="" style="float:none;">
                <input style="font-size:12px;" type="number" name="cantidad" id="cantidad" class="form-control onlyNum" min="0" placeholder="Cantidad a agregar..." value="{{old('cantidad')}}" autocomplete="off" required/>
            </div>
        </div>
        <div class="col-sm-2">
            <label class="control-label"></label>
            <div class="" style="float:none;padding-top:10px;">
                <button type="button" class="btn btn-block btn-success btn-md" id="addProduct">
                    <i class="fa fa-fw fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div>
    <div style="background-color:#eeeeee;"><span style="padding-left:10px;color: #6a828e;font-size:16px;letter-spacing: 1px;"><b>Lista de productos a agregar</b></span></div>    
    <div style="margin-right: 0px;margin-left: 0px;padding-top: 12px; margin-bottom: 0px;">
        <div style="font-size:12px;" class="box-body table-responsive no-padding">
            <table class="table table-dark table-bordered table-hover table-striped tabla-data" id="tabla-data-stock">
                <thead>
                    <tr>
                        {{-- <th class="width70">N°</th> --}}
                        <th>Nombre</th>
                        <th style="text-align: right;">Precio a guardar</th>
                        <th style="text-align: right;">Cantidad</th>
                        <th style="text-align: right;" class="width70">Acción</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(this).find('#producto').change(function(){
                var id = $(this).find('option:selected').val();
                var precio = $(this).find('option:selected').data("preciostock");
                $('#precioStock').val(precio);
            })
            var cont = 0;
            $('#addProduct').click(function(){
                var id = $('#producto').find('option:selected').val();
                var nombre = $('#producto').find('option:selected').data("namestock");
                var precio = $('#precioStock').val();
                var cantidad = $('#cantidad').val();
                var tablaStock = $('#tabla-data-stock').DataTable();

                if( id != "" && cantidad != "" && cantidad > 0 ){
                    tablaStock.row.add( [
                        nombre,
                        '<div align="right">'+precio+'</div>',
                        '<div align="right">'+cantidad+'</div>',
                        '<div align="right"><button type="button" class="btn-accion-tabla" onclick="eliminar('+cont+');"><i class="fa fa-fw fa-trash text-danger"></i></button></div>'
                    ] ).draw( false );
                }
            })
        })
    </script>
@endpush
