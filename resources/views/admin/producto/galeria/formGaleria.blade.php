<!-- HTML heavily inspired by http://blueimp.github.io/jQuery-File-Upload/ -->
<div class="col-xs-9 boxModalStock" style="width:81.51%" {{--style="margin-right: calc(4.166666% - 15px);"--}}>
    <div style="background-color:#eeeeee;"><span class="titleModalStock"><b>Seleccione un producto</b></span></div>
    <div class="form-group bodyModalStock" style="padding-top:12px;">
        <div class="col-xs-12">
            <select class="form-control select2ProductStock requerido" style="width: 100%" data-error="Escoja un producto..." data-placeholder="Buscar producto..." name="productoGal" id="productoGal" required>
                <option value="" selected disabled hidden></option>
                @foreach($productos as $index => $producto)
                    <option data-preciostock="{{$producto->precio}}" data-namestock="{{$producto->nombre}}" value="{{$producto->id}}" @if (old('productoGal') == $producto->id) selected="selected" @endif>{{$producto->nombre}} - {{str_limit($producto->descripcion, 30, '...')}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-xs-2 boxModalStock" style="text-align:center; margin-left:10px; ">
    <div style="background-color:#eeeeee;"><span class="titleModalStock"><b>Estado</b></span></div>
    <div class="form-group bodyModalStock" style="padding-top:12px;margin:auto;">
        <input class="toggle" id="estadoGal" type="checkbox" />
    </div>
</div>
<div class="col-xs-12 dropzone dropzone-previews needsclick dz-clickable" id="dZUpload" name="dZUpload">

</div>
<div id="uplo"></div>
{{-- <div id="actions" class="row">
    <div class="col-lg-11">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button dz-clickable">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add files...</span>
        </span>
        <button type="submit" class="btn btn-primary start">
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start upload</span>
        </button>
        <button type="reset" class="btn btn-warning cancel">
            <i class="glyphicon glyphicon-ban-circle"></i>
            <span>Cancel upload</span>
        </button>
    </div>

    <div class="col-lg-1">
        <!-- The global file processing state -->
        <span class="fileupload-process">
        <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
        </div>
        </span>
    </div>
</div>
<div class="tableDZ table table-striped" class="files" id="previews">
    <div id="template" class="file-row">
      <!-- This is used as the file preview template -->
      <div>
          <span class="preview"><img data-dz-thumbnail /></span>
      </div>
      <div>
          <p class="name" data-dz-name></p>
          <strong class="error text-danger" data-dz-errormessage></strong>
      </div>
      <div>
          <p class="size" data-dz-size></p>
          <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
          </div>
      </div>
      <div>
        <button class="btn btn-primary start">
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start</span>
        </button>
        <button data-dz-remove class="btn btn-warning cancel">
            <i class="glyphicon glyphicon-ban-circle"></i>
            <span>Cancel</span>
        </button>
        <button data-dz-remove class="btn btn-danger delete">
          <i class="glyphicon glyphicon-trash"></i>
          <span>Delete</span>
        </button>
      </div>
    </div>
</div> --}}

@push('scripts')
    <script type="text/javascript">
        $('#form-crearGaleria').submit(function(e){       
          //  e.preventDefault();
        })
        $('.onShowCrearGal').on('show.bs.modal', function () {      //Reseteo de formulario y galería al abrir el modal Crear.
            $('#form-addStock').trigger('reset');
            $('#productoGal').val(null).trigger('change');
            Dropzone.forElement("#dZUpload").removeAllFiles(true);
        })

        // Para que no asocie el plugin DZ a otras instancias, y asignar manualmente.
        Dropzone.autoDiscover = false;  

        var token = $('meta[name="csrf-token"]').attr('content');
        $("#dZUpload").dropzone({
            url: "galeria",
            headers: {'X-CSRF-TOKEN': token},
            dictDefaultMessage: "Presione aquí o arrastre archivos para subir...<span class='note needsclick'>(El tamaño máximo permitido para los archivos es de <strong>2 MB</strong>.)</span>",
            dictFileTooBig: "Archivo demasiado grande, máximo 2 MB.",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFilesize: 2,
            addRemoveLinks: true,
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior) -> Prevenir el submit del form.
                document.getElementById("guardarGaleria").addEventListener("click", function(e) {
                    e.preventDefault();     // Make sure that the form isn't actually being sent.
                    e.stopPropagation();
                    if (jQuery("#productoGal").val() != null) {
                        dzClosure.processQueue();
                    } else {
                        ecommerce.notificaciones('No se ha seleccionado un producto. Seleccione uno y vuelva a intentarlo.', 'Mensaje de sistema', 'error');
                    }
                });
                
                //Imprime el mensaje de error que haya ocurrido al subir foto.
                this.on("error", function(file, message) { 
                    if (message == 'errorExists') {
                        ecommerce.notificaciones('La galería de este producto ya existe.', 'Mensaje de sistema', 'error');
                        this.removeAllFiles();
                    } else {
                        ecommerce.notificaciones(message, 'Mensaje de sistema', 'error');
                        this.removeFile(file); 
                    }
                });

                //Se adjunta los datos del formulario al conjunto de imágenes a enviar.
                this.on("sendingmultiple", function(data, xhr, formData) {
                    formData.append("producto_id", jQuery("#productoGal").val());
                    formData.append("estado", Number(jQuery("#estadoGal").prop('checked')));
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
                // this.on("thumbnail", function (file, dataUrl) {
                //     $('#uplo').append('<img src="' + dataUrl + '" width="50" height="50" alt="">');
                // });
                // this.on("thumbnail", function (file, dataUrl) {

                // });
            },
            success: function (file, response) {                        //Si todo fue realizado con éxito,
                ecommerce.notificaciones('La galería fue creada con éxito.', 'Mensaje de sistema', 'success');
                file.previewElement.classList.add("dz-success");        //Añade el icono success a imágenes.
                $('#form-crearGaleria').trigger('reset');               //Resetea el formulario donde corresponda.
                $('#productoGal').val(null).trigger('change');          //Resetea el selectBox de productos
                this.removeAllFiles();                                  //Remueve todos los archivos del dropzone.
                $("#modalCrearGaleria").modal("hide");                  //Esconde el modal.
                setTimeout(function() {location.reload();}, 1000);      //Resetea la página en 1 seg.
            },
            error: function (file, response) {
                // else if (response == 'errorLarge') {
                //     ecommerce.notificaciones('Uno de los archivos de imagen es demasiado grande.', 'Mensaje de sistema', 'error')
                // }
                file.previewElement.classList.add("dz-error");
            }
        });
        
        //var myDropzone = new Dropzone(".classDZ",
        // {

        // });
        //Dropzone.options.dropzone =
  


        // // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        // var previewNode = document.querySelector("#template");
        // previewNode.id = "";
        // var previewTemplate = previewNode.parentNode.innerHTML;
        // previewNode.parentNode.removeChild(previewNode);

        // var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        //     url: "galeria", // Set the url
        //     headers: {'X-CSRF-TOKEN': token},
        //     thumbnailWidth: 80,
        //     thumbnailHeight: 80,
        //     parallelUploads: 20,
        //     previewTemplate: previewTemplate,
        //     autoQueue: false, // Make sure the files aren't queued until manually added
        //     previewsContainer: "#previews", // Define the container to display the previews
        //     clickable: ".fileinput-button",  // Define the element that should be used as click trigger to select files.
        //     maxFilesize: 12,
        //     paramName: "file",
        //     renameFile: function(file) {
        //         var dt = new Date();
        //         var time = dt.getTime();
        //     return time+file.name;
        //     },
        //     acceptedFiles: ".jpeg,.jpg,.png,.gif",
        //     addRemoveLinks: true,
        //     timeout: 5000,
        //     init: function () {
        //         var myDropzone = this;
        //         var addButton = $("#guardarGaleria")[0];

        //         // First change the button to actually tell Dropzone to process the queue.
        //         addButton.addEventListener("click", function (e) {
        //             // Make sure that the form isn't actually being sent.
        //             e.preventDefault();
        //             e.stopPropagation();
        //             if (myDropzone.getQueuedFiles().length > 0) {
        //                 myDropzone.processQueue();
        //             } else {
        //                 $("#form-crearGaleria").submit();
        //             }
        //         });

        //         this.on("successmultiple", function (files, response) {
        //             setTimeout(function () {
        //                 $("#form-crearGaleria").submit();
        //             }, 1000);
        //         });
        //     },
        //     success: function(file, response) 
        //     {
        //         console.log(response);
        //     },
        //     error: function(file, response)
        //     {
        //     return false;
        //     }
        // });

        // myDropzone.on("addedfile", function(file) {
        //     // Hookup the start button
        //     file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
        // });

        // // Update the total progress bar
        // myDropzone.on("totaluploadprogress", function(progress) {
        //     document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        // });

        // myDropzone.on("sending", function(file) {
        //     // Show the total progress bar when upload starts
        //     document.querySelector("#total-progress").style.opacity = "1";
        //     // And disable the start button
        //     file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        // });

        // // Hide the total progress bar when nothing's uploading anymore
        // myDropzone.on("queuecomplete", function(progress) {
        //     document.querySelector("#total-progress").style.opacity = "0";
        // });

        // // Setup the buttons for all transfers
        // // The "add files" button doesn't need to be setup because the config
        // // `clickable` has already been specified.
        // document.querySelector("#actions .start").onclick = function() {
        //     myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        // };
        // document.querySelector("#actions .cancel").onclick = function() {
        //     myDropzone.removeAllFiles(true);
        // };
    </script>
@endpush
