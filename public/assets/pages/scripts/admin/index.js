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

    // $(".validaRut").on( 'keypress', function(e){
    //     var keyCode = e.which;
    //    if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57) && (keyCode != 45 && keyCode != 75 && keyCode != 107)) { 
    //      return false;
    //    }
    //  });

     $(".onlyNum").on( 'keypress', function(e){
        var keyCode = e.which;
       if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
         return false;
       }
     });

     $(".onlyNumWithDot").on( 'keypress', function(e){
        var keyCode = e.which;
       if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57) && (keyCode != 44 && keyCode != 46)) { 
         return false;
       }
     });

    //  $(".currency").on({
    //     "focus": function (event) {
    //         $(event.target).select();
    //     },
    //     "keyup": function (event) {
    //         $(event.target).val(function (index, value ) {
    //             return value.replace(/\D/g, "")
    //                         .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
    //         });
    //     }
    // });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    ecommerce.notificaciones('El registro fue eliminado correctamente.', 'Mensaje de sistema', 'success');
                } else {
                    ecommerce.notificaciones('El registro no pudo ser eliminado, hay recursos usándolo.', 'Mensaje de sistema', 'error');
                }
            },
            error: function () {
                
            }
        });
    }
});