 $(function () {
     $(this).find('.precioMask').inputmask({
         alias: 'numeric',
         prefix: "$ ",
         groupSeparator: '.', 
         autoGroup: true, 
         digits: 0, 
         placeholder: ' ',
         digitsOptional: false, 
         autoUnmask: true, 
         removeMaskOnSubmit: true,
         rightAlign: false,
         showMaskOnHover: false,
         showMaskOnFocus: false,
         clearMaskOnLostFocus: true
     });

     $(this).find('.porcentajeMask').inputmask("decimal", {
        suffix: " %",
        min: 0,
        max: 100,
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2, 
        placeholder: ' ',
        autoUnmask: true, 
        removeMaskOnSubmit: true,
        rightAlign: false,
        showMaskOnHover: false,
        showMaskOnFocus: false,
        clearMaskOnLostFocus: true
    });

    $(this).find('.rutMask').inputmask({
        mask: ["9.999.999-9|K|k", "9[9.999.999]-[9|K|k]"],
        placeholder: "XXXXXXXX",
        autoUnmask: true, 
        removeMaskOnSubmit: true,
        rightAlign: false,
        clearMaskOnLostFocus:true,
        showMaskOnHover: false,
        showMaskOnFocus: false,
        onUnMask: function(maskedValue, unmaskedValue) {
            console.log(unmaskedValue);
            var digito = unmaskedValue[unmaskedValue.length-1];
            var rutSinDigito = unmaskedValue.substring(0, unmaskedValue.length-1);
            maskFinal = rutSinDigito + "-" + digito;
            return maskFinal;
        }
    });
});


// $(document).ready(function(){
//     $(this).find('.precioMask').inputmask();
// });

// $('.onShowCrearMask').on('show.bs.modal', function () {
//     $(this).find('.precioMask').inputmask('decimal',{rightAlign: true});
// })

// $('.onShowEditarMask').on('show.bs.modal', function () {
//     $(this).find('.precioMask').inputmask('decimal',{rightAlign: true});
// })