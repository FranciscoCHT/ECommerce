<div class="col-xs-9 boxModalStock" style="width:81.51%" {{--style="margin-right: calc(4.166666% - 15px);"--}}>
    <div style="background-color:#eeeeee;"><span class="titleModalStock"><b>Producto a editar</b></span></div>
    <div class="form-group bodyModalStock" style="padding-top:12px;">
        <div class="col-xs-12">
            <select class="form-control select2ProductStock requerido" style="width: 100%" data-error="Escoja un producto..." data-placeholder="Buscar producto..." name="selectEditGal" id="selectEditGal" required>
                <option value="" selected disabled hidden></option>
                @foreach($productos as $index => $producto)
                    <option data-preciostock="{{$producto->precio}}" data-namestock="{{$producto->nombre}}" value="{{$producto->id}}" @if (old('selectEditGal') == $producto->id) selected="selected" @endif>{{$producto->nombre}} - {{str_limit($producto->descripcion, 30, '...')}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-xs-2 boxModalStock" style="text-align:center; margin-left:10px; ">
    <div style="background-color:#eeeeee;"><span class="titleModalStock"><b>Estado</b></span></div>
    <div class="form-group bodyModalStock" style="padding-top:12px;margin:auto;">
        <input class="toggle" id="estadoEditGal" type="checkbox" />
    </div>
</div>
<div class="col-xs-12 dropzone dropzone-previews needsclick dz-clickable" id="dZEdit" name="dZEdit">
    
</div>

@push('scripts')
    <script type="text/javascript">
        var idprod;
        $('#modalEditGaleria').on('show.bs.modal', function (e) {   //Prevenir que se abra el modal de editar, para abrirlo
            var button = e.relatedTarget;                           //cuando se confirme que existe galería.
            if($(button).hasClass('preventOpen')) {
                e.preventDefault();
                e.stopPropagation();
            }
        })
        
        // function asignarIdURL(dropzone, url){
        //     dropzone.options.url = url
        // }

        Dropzone.autoDiscover = false;  
        var token = $('meta[name="csrf-token"]').attr('content');
        $("#dZEdit").dropzone({
            url: "galeria/edit/"+idprod,
            headers: {'X-CSRF-TOKEN': token},
            method: 'put',
            dictDefaultMessage: "Presione aquí o arrastre archivos para subir...<span class='note needsclick'>(El tamaño máximo permitido para los archivos es de <strong>2 MB</strong>.)</span>",
            dictFileTooBig: "Archivo demasiado grande, máximo 2 MB.",
            dictInvalidFileType: "No es posible agregar este tipo de archivos.",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFilesize: 2,
            addRemoveLinks: true,
            init: function() {
                dzClosureEdit = this; // Makes sure that 'this' is understood inside the functions below. Instancia del plugin.
                this.cleaningUp = false;    //Se setea esta variable en false, para manejar si se quiere disparar el evento onRemovedFile

                function get_filesize(url, callback) {  //Funcion para obtener el tamaño de los archivos en servidor.
                    var xhr = new XMLHttpRequest();
                    xhr.open("HEAD", url, true); // Notice "HEAD" instead of "GET", to get only the header
                    xhr.onreadystatechange = function() {
                        if (this.readyState == this.DONE) {
                            callback(parseInt(xhr.getResponseHeader("Content-Length")));
                        }
                    };
                    xhr.send();
                }
                
                $('.editGalButton').on("click", function(e) {       //Al abrir un modal de editar, rescatar todos los nombres de fotos
                    var id = $("#editGalButton").data('idprod');    //y al retornar los datos, crear los archivos en dropzone de las
                    $.ajax({                                        //imágenes rescatadas, con su miniatura y tamaño correspondiente.
                        url: "galeria/imagenes/"+id,
                        type: "GET"
                    }).done((data) => {
                        $('#modalEditGaleria').modal('show');
                        idprod = $('#editGalButton').data("idprod");         //Obtenemos el ID del producto a editar selecconado
                        $('#selectEditGal').val(idprod).trigger('change');   //Seteamos el producto a editar
                        $('#selectEditGal').prop('disabled', true);          //y bloqueamos el selectbox.

                        Dropzone.forElement("#dZEdit").cleaningUp = true;    //Para no disparar el evento onRemovedFile, se hace true, lo que no hace nada en onRemovedFile   
                        Dropzone.forElement("#dZEdit").removeAllFiles(true); //Eliminamos todos los productos del Plugin Dropzone al abrir modal.
                        Dropzone.forElement("#dZEdit").cleaningUp = false;   //Se vuelve a setear en falso, para que dropzone vuelva a detectar el evento onRemovedFile

                        var editdz = Dropzone.forElement("#dZEdit");         //Asigna el URL a dropzone
                        //asignarIdURL(editdz, url);                           //del id del producto a
                        editdz.options.url = "galeria/edit/" + idprod;       //editar seleccionado.

                        for (let i = 0; i < data.length; i++) {
                            get_filesize("{{asset('/imagenes/productGallery')}}"+ '/' + id + '/' + data[i].img, function(size) {
                                var imageSize = size;
                                var mock = {
                                    processing: true,           // flag: processing is complete
                                    accepted: true,             // flag: file is accepted (for limiting maxFiles)
                                    name: data[i].nombre,       // name of file on page
                                    size: imageSize,            // image size
                                    type: 'image/jpeg',         // image type
                                    status: Dropzone.SUCCESS,   // flag: status upload
                                    dataURL: "{{asset('/imagenes/productGallery')}}"+ '/' + id + '/' + data[i].img
                                }

                                dzClosureEdit.files.push(mock);             // Push file to collection
                                dzClosureEdit.emit('addedfile', mock);      // Emulate event to create interface
                                dzClosureEdit.createThumbnailFromUrl(mock,  // Create thumbnail from url
                                    dzClosureEdit.options.thumbnailWidth, dzClosureEdit.options.thumbnailHeight, 
                                    dzClosureEdit.options.thumbnailMethod, true, function(thumbnail) {
                                        dzClosureEdit.emit('thumbnail', mock, thumbnail);   
                                        dzClosureEdit.emit("complete", mock);
                                    }
                                );
                                dzClosureEdit.emit("processing", mock);     // Add status processing to file
                                dzClosureEdit.emit('complete', mock);       // Add status complete to file
                            });
                        }
                    }).fail((data) => {
                        //$('#modalEditGaleria').modal('hide');
                        ecommerce.notificaciones('No existe galería para este producto. Cree la galería primero y luego edítela.', 'Mensaje de sistema', 'error');
                    });
                });
                
                // for Dropzone to process the queue (instead of default form behavior) -> Prevenir el submit del form.
                document.getElementById("actualizarGaleria").addEventListener("click", function(e) {
                    e.preventDefault();     // Make sure that the form isn't actually being sent.
                    e.stopPropagation();
                    if (jQuery("#selectEditGal").val() == null) {
                        ecommerce.notificaciones('No se ha seleccionado un producto. Seleccione uno y vuelva a intentarlo.', 'Mensaje de sistema', 'error');
                    } else if (dzClosureEdit.files.length == 0) {
                        ecommerce.notificaciones('No se han insertado imágenes. Inserte al menos una y vuelva a intentarlo.', 'Mensaje de sistema', 'error');
                    } else {
                        dzClosureEdit.processQueue();
                    }
                });

                // this.on("processing", function(file) { //Para asignar la id al abrir el modal con la id del producto a editar.
                //     console.log('gola');
                //     this.options.url = "galeria/edit/"+idprod;
                // });

                this.on("removedfile", function(file) {                             
                    if (!this.cleaningUp) {                                         //Se pregunta si es false, si es true, no se debe disparar el evento para evitar conflictos.
                        if (file.status == Dropzone.SUCCESS) {                      //Al remover una imagen, se pregunta si esta imagen tiene estado
                            var url = '{{ route("eliminar_imagen", ":name") }}';    //de success, lo que significa que está ya en servidor, de ser así
                            url = url.replace(':name', file.name);                  //se procede a eliminar mediante llamada ajax al controlador.
                            $.ajax({
                                url: url,
                                headers: {'X-CSRF-TOKEN': token},
                                type: "DELETE",
                                data: file.name
                            }).done((data) => {
                                console.log(data);
                                ecommerce.notificaciones('La imagen ha sido eliminada satisfactoriamente.', 'Mensaje de sistema', 'success');
                            }).fail((data) => {
                                ecommerce.notificaciones('No se pudo eliminar la imagen del sistema.', 'Mensaje de sistema', 'error');
                            });
                        }
                    }
                });
                
                //Imprime el mensaje de error que haya ocurrido al subir foto.
                this.on("error", function(file, message) {  //error: se realiza por cada imagen.
                    if (message != 'errorExists') {         //Máximo de foto excedido
                        ecommerce.notificaciones(message, 'Mensaje de sistema', 'error');
                        this.removeFile(file); 
                    }
                });

                //En caso de que se haga el submit de los archivos y desde el servidor se responde que
                //ya existe la galería, o algún otro error desde Servidor, se copian todos los archivos
                //y se vuelven a colocar en dropzone. Si no se hace esto, los archivos quedan con error
                //de subida, y no se puede reinicializar la subida.
                this.on('errormultiple',function(files, response){  //errormultiple: se realiza una vez por todas las imagenes.
                    if (response == 'errorExists') {                //Se pregunta si el error es de que la galería ya existe. Si no se
                        var dropzoneFilesCopy = files.slice(0);     //hace el IF, se entra en un loop por conflicto con otros errores.
                        ecommerce.notificaciones('La galería de este producto ya existe.', 'Mensaje de sistema', 'error');

                        Dropzone.forElement("#dZEdit").cleaningUp = true;
                        this.removeAllFiles();
                        Dropzone.forElement("#dZEdit").cleaningUp = false;

                        $.each(dropzoneFilesCopy, function(_, file) {
                            if (file.status === Dropzone.ERROR) {
                                    file.status = undefined;
                                    file.accepted = undefined;
                            }
                            dzClosureEdit.addFile(file);
                        });
                    }
                });

                //Se adjunta los datos del formulario al conjunto de imágenes a enviar.
                this.on("sendingmultiple", function(data, xhr, formData) {
                    console.log('sendingmultiple');
                    formData.append("producto_id", jQuery("#selectEditGal").val());
                    formData.append("estado", Number(jQuery("#estadoEditGal").prop('checked')));
                });

                //Verifica si el archivo que se está subiendo ya existe en la zona de fotos, de ser así, no subir.
                this.on("addedfile", function(file) {
                    if (this.files.length) {
                        var _i, _len;
                        for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) { // -1 to exclude current file
                            if(this.files[_i].name === file.name && this.files[_i].size === file.size && this.files[_i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
                                this.removeFile(file);
                            }
                        }
                    }
                    // file.previewElement.addEventListener("click", function() {
                    //     window.open('http://stackoverflow.com/', '_blank');
                    // });
                });

                this.on("complete", function(file) {
                    $(".dz-remove").html("<div><span class='fa fa-trash text-danger' style='font-size: 1.5em'></span></div>");
                });

                // this.on("thumbnail", function (file, dataUrl) {
                //     $('#uplo').append('<img src="' + dataUrl + '" width="50" height="50" alt="">');
                // });
                // this.on("thumbnail", function (file, dataUrl) {

                // });
            },
            success: function (file, response) {                        //Si todo fue realizado con éxito,
                console.log(response);
                ecommerce.notificaciones('La galería fue creada con éxito.', 'Mensaje de sistema', 'success');
                file.previewElement.classList.add("dz-success");        //Añade el icono success a imágenes.
                $('#form-crearGaleria').trigger('reset');               //Resetea el formulario donde corresponda.
                $('#selectEditGal').val(null).trigger('change');          //Resetea el selectBox de productos

                Dropzone.forElement("#dZEdit").cleaningUp = true;
                this.removeAllFiles();                                  //Remueve todos los archivos del dropzone.
                Dropzone.forElement("#dZEdit").cleaningUp = false;

                $("#modalCrearGaleria").modal("hide");                  //Esconde el modal.
                //setTimeout(function() {location.reload();}, 1000);      //Resetea la página en 1 seg.
            },
            error: function (file, response) {
                // else if (response == 'errorLarge') {
                //     ecommerce.notificaciones('Uno de los archivos de imagen es demasiado grande.', 'Mensaje de sistema', 'error')
                // }
                file.previewElement.classList.add("dz-error");
            }
        });
    </script>
@endpush