$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function () {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form);
            }
        });
    });

    $(".validaRut").on( 'keypress', function(e){
        var keyCode = e.which;
       /*
         8 - (backspace)
         32 - (space)
         48-57 - (0-9)Numbers
       */
    
       if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57) && (keyCode != 45 && keyCode != 75 && keyCode != 107)) { 
         return false;
       }
     });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    ecommerce.notificaciones('El registro fue eliminado correctamente', 'ecommerce', 'success');
                } else {
                    ecommerce.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'ecommerce', 'error');
                }
            },
            error: function () {
                console.log("hola")
            }
        });
    }
});