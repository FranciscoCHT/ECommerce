<div class="boxModalStock">
    <div style="background-color:#eeeeee;"><span class="titleModalStock"><b>Seleccione un producto</b></span></div>
    <div class="form-group bodyModalStock" style="padding-top:12px;">
        <div class="col-lg-12">
            <select class="form-control select2ProductStock" style="width: 100%" data-error="Escoja un producto..." data-placeholder="Buscar producto..." name="producto" id="producto">
                <option value="" selected disabled hidden></option>
                @foreach($productos as $index => $producto)
                    <option data-preciostock="{{$producto->precio}}" data-namestock="{{$producto->nombre}}" value="{{$producto->id}}" @if (old('producto') == $producto->id) selected="selected" @endif>{{$producto->nombre}} - {{str_limit($producto->descripcion, 30, '...')}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="boxModalStock">
    <div style="background-color:#eeeeee;"><span class="titleModalStock"><b>Datos de producto a agregar</b></span></div>
    <div class="form-group bodyModalStock">
        <div style="font-size:12px;" class="col-sm-5">
            <label style="padding-top:10px;" for="precioStock" class="control-label">Precio</label>
            <div class="" style="float:none;">
                <input style="font-size:12px;" type="text" name="precioStock" id="precioStock" class="form-control precioMask" placeholder="$" value="{{old('precioStock')}}" autocomplete="off"/>
            </div>
        </div>
        <div style="font-size:12px;" class="col-sm-5">
            <label style="padding-top:10px;" for="cantidad" class="control-label">Cantidad</label>
            <div class="" style="float:none;">
                <input style="font-size:12px;" type="number" name="cantidad" id="cantidad" class="form-control onlyNum" min="0" placeholder="Cantidad a agregar..." value="{{old('cantidad')}}" autocomplete="off"/>
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
<div class="boxModalStock">
    <div style="background-color:#eeeeee;"><span class="titleModalStock"><b>Lista de productos a agregar</b></span></div>    
    <div class="bodyModalStock" style="padding-bottom:0px;">
        <div style="font-size:12px;" class="box-body table-responsive no-padding">
            <table class="table table-dark table-bordered table-hover table-striped" id="tabla-data-stock">
                <thead>
                    <tr>
                        {{-- <th class="width70">N°</th> --}}
                        <th style="width:10px!important;border-top: 0px!important;">N°</th>
                        <th style="width:10px!important;border-top: 0px!important;">ID</th>
                        <th style="border-top: 0px!important;">Nombre</th>
                        <th style="text-align: right;border-top: 0px!important;">Precio a guardar</th>
                        <th style="text-align: right;border-top: 0px!important;">Cantidad</th>
                        <th style="text-align: right;border-top: 0px!important;" class="width70">Acción</th>
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
        var cont = 0;
        $(document).ready(function(){                               
            $(this).find('#producto').change(function(){                            // Función para cambiar el campo de precio
                var id = $(this).find('option:selected').val();                     // al seleccionar algun producto de la lista.
                var precio = $(this).find('option:selected').data("preciostock");
                $('#precioStock').val(precio);
            })
            
            var tablaStock = $('#tabla-data-stock').DataTable();
            evaluar();
            $('#form-addStock').submit(function(e){                                 // Se toma el evento de submit del form, y se hace una
                var datos = tablaStock.rows().data().toArray();                     // llamada ajax, de manera de mandar los datos al controlador.
                var token = $('meta[name="csrf-token"]').attr('content');           // en controlador se encarga de escribir el producto modificado 
                e.preventDefault();                                                 // (precio y stock solamente) y tambien de escribir los registros
                $.ajax({                                                            // de historial de addstock.
                    headers: {'X-CSRF-TOKEN': token},
                    url:'{!!route('guardar_stock')!!}',
                    type:'POST',
                    data:{data: datos},
                }).done((data) => {
                    ecommerce.notificaciones('El stock fue agregado correctamente.', 'Mensaje de sistema', 'success');
                    tablaStock.clear().draw();
                    limpiar();
                    evaluar();
                    $("#modalAddStock").modal("hide");
                    setTimeout(function() {location.reload();}, 1000);
                }).fail((data) => {
                    console.log('Error AJAX');
                });
            });
            
            $('#addProduct').click(function(){                                          // Función para añadir el producto una vez presionado el botón +.
                var id = $('#producto').find('option:selected').val();                  // Se asignan los valores a utilizar.
                var nombre = $('#producto').find('option:selected').data("namestock");
                var precio = $('#precioStock').val();
                var cantidad = $('#cantidad').val();
                var tablaStock = $('#tabla-data-stock').DataTable();

                if( id != "" && cantidad != "" && cantidad > 0 ){                                       // Si se han ingresado todos los valores, se pasa a preguntar
                    if (tablaStock.search(nombre).row({search: 'applied'}).data() == undefined) {       // si el nombre del producto ingresado existe en la tabla.
                        tablaStock.search('');                                                          // De no existir se aumenta el contador y se añade una fila a la tabla con los datos.
                        cont++;
                        tablaStock.row.add( [
                            cont, id, nombre, precio, cantidad, '<div align="right"><button type="button" class="btn-accion-tabla" onclick="eliminar('+cont+');"><i class="fa fa-fw fa-trash text-danger"></i></button></div>'
                        ] ).draw( false );
                        limpiar();
                        evaluar();
                    } else {                                                                            // De existir el nombre de producto, se toma esta row y se
                        tablaStock.search('');                                                          // sustituyen sus datos con los datos ingresados.
                        var indexRow = tablaStock.rows().indexes().filter( function ( value, index ) { return nombre === tablaStock.row(value).data()[2];} );
                        var row = tablaStock.row(indexRow[0]);
                        var data = row.data();
                        data[3] = precio;
                        data[4] = cantidad;
                        row.data(data).draw();
                        limpiar();
                        evaluar();
                    }
                }
            })
        })

        function limpiar() {                                // Función encargada de limpiar el form del modal AddStock
            $('#producto').val(null).trigger('change');     // Se llama al cerrar modal, al agregar un producto a la lista, etc.
            $("#cantidad").val("");
            $("#precio").val("");
        }

        $("#modalAddStock").on("hidden.bs.modal", function () {     // Función encargada de limpiar, resetear y redibujar el modal al cerrarse.
            var tablaStock = $('#tabla-data-stock').DataTable();
            limpiar();
            cont = 0;
            tablaStock.clear().draw();
            evaluar();
        })

        function eliminar(contador) {                               // Función encargada de borrar una fila de la tabla al presionar eliminar 
            var tablaStock = $('#tabla-data-stock').DataTable();    // (icono trash). Se vuelve a dibujar y evaluar tabla.
            var indexRow = tablaStock.rows().indexes().filter( function ( value, index ) { return contador === tablaStock.row(value).data()[0];} );
            var row = tablaStock.row(indexRow[0]);
            row.remove();
            tablaStock.draw();
		    evaluar();
        }

        function evaluar(){                                         // Función encargada de evaluar si tabla esta vacía, de ser así
            var tablaStock = $('#tabla-data-stock').DataTable();    // el botón para guardar se bloquea, cuando existan registros
            if(!tablaStock.data().count()) {                        // se vuelve a evaluar y si hay registros, se activa el botón de guardado.
                $("#guardarStock").prop('disabled', true);
                cont = 0;   //Si no hay prod, reset contador a 0.
            } else {
                $("#guardarStock").prop('disabled', false);
            }
        }
    </script>
@endpush
