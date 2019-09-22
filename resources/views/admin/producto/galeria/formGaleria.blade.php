<!-- HTML heavily inspired by http://blueimp.github.io/jQuery-File-Upload/ -->
<div id="actions" class="row">
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
</div>

@push('scripts')
    <script type="text/javascript">
        $('#form-crearGaleria').submit(function(e){       
            e.preventDefault();
        })
        var token = $('meta[name="csrf-token"]').attr('content');
        //Dropzone.options.dropzone =
        var myDropzone = new Dropzone(".classDZ",
        {

        });


        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "galeria", // Set the url
            headers: {'X-CSRF-TOKEN': token},
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button",  // Define the element that should be used as click trigger to select files.
            maxFilesize: 12,
            paramName: "file",
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
            return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
            return false;
            }
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1";
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0";
        });

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        };
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true);
        };
    </script>
@endpush
