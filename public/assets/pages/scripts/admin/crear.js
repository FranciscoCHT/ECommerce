$(document).ready(function () {
    ecommerce.validacionGeneral('form-crear');
});
$('.onShownModal').on('shown.bs.modal', function () {
    var idForm = this.id.split('_');
    idForm = idForm[1];
    ecommerce.validacionGeneral('form-editar_' + idForm);
    //console.log(idForm);
});
$('.onShowModal').on('show.bs.modal', function () {
    $('#form-crear').trigger('reset');
})
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

