$(document).ready(function () {
    ecommerce.validacionGeneral('form-crear');
});
// $('.onShownEdicion').on('shown.bs.modal', function () {
//     var idForm = this.id.split('_');
//     idForm = idForm[1];
//     ecommerce.validacionGeneral('form-editar_' + idForm);
//     //console.log(idForm);
// });
// $('.onHiddenEdicion').on('hidden.bs.modal', function () {
// })
$('.onShowCrear').on('show.bs.modal', function () {
    $('#form-crear').trigger('reset');
})
$('.onShowEdicion').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('usuario');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
    $(this).find('form').find("input[name=email]")[0].defaultValue = datos.email;
    $(this).find('form').find("input[name=apellido]")[0].defaultValue = datos.apellido;
    $(this).find('form').find("input[name=tipo]")[0].defaultValue = datos.tipo;
    $(this).find('form').find("input[name=rut]")[0].defaultValue = datos.rut;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
    
});
$("#cancelado").click(function() {
    var n = $(this).closest('form').find("input[type=text], input[type=email], input[type=checkbox], input[type=password], textarea").length;
    for (i = 0; i < n; i++) { 
        $(this).closest('form').find("input[type=text], input[type=email], input[type=checkbox], input[type=password], textarea")[i].defaultValue = "";
    }
});
// $('.onShownModal').on('shown.bs.modal', function () {
//     var idForm = document.getElementById('form-editar').name;
//     ecommerce.validacionGeneral('form-editar');
//     console.log(idForm);
// });

