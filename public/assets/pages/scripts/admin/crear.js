$(document).ready(function () {
    ecommerce.validacionGeneral('form-crear');
});

$('.onShowCrear').on('show.bs.modal', function () {
    $('#form-crear').trigger('reset');
})

$('.onShowEdicionUser').on('show.bs.modal', function () {
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

// $('.onShownEdicion').on('shown.bs.modal', function () {
//     var idForm = this.id.split('_');
//     idForm = idForm[1];
//     ecommerce.validacionGeneral('form-editar_' + idForm);
//     //console.log(idForm);
// });
// $('.onHiddenEdicion').on('hidden.bs.modal', function () {
// })

// $('.onShowEdicion').on('show.bs.modal', function () {
//     var datos = $(this).find('form').data('datos');
//     n = Object.keys(datos).length + 3;
//     key = 1;
//     console.log(n);
//     for (i = 3; i < 4; i++) { 
        
//         k = Object.keys(datos)[key];
//         console.log(k);
//         $(this).find('form').find("input").eq(i)[0].defaultValue = datos.k;
//         key++;
//     }
//     // $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
//     // $(this).find('form').find("input").eq(5)[0].defaultValue = datos.email;
//     // $(this).find('form').find("input[name=apellido]")[0].defaultValue = datos.apellido;
//     // $(this).find('form').find("input[name=tipo]")[0].defaultValue = datos.tipo;
//     // $(this).find('form').find("input[name=rut]")[0].defaultValue = datos.rut;
//     var idForm = this.id.split('_');
//     idForm = idForm[1];
//     $('#form-editar_' + idForm).trigger('reset');
//     ecommerce.validacionGeneral('form-editar_' + idForm);
    
// });