$(document).ready(function () {
    ecommerce.validacionGeneral('form-crear');
});

$('.onShowCrear').on('show.bs.modal', function () {
    $('#form-crear').trigger('reset');
    var validator = $('#form-crear').validate();
    validator.resetForm();
})

$('.validarEdicion').on('shown.bs.modal', function () {
    var idForm = this.id.split('_');
    idForm = idForm[1];
    ecommerce.validacionGeneral('form-editar_' + idForm);
});

$('.onShowEdicionUser').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('usuario');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("input[name=email]")[0].defaultValue = checkNull(datos.email);
    $(this).find('form').find("input[name=apellido]")[0].defaultValue = checkNull(datos.apellido);
    $(this).find('form').find("input[name=tipo]")[0].defaultValue = checkNull(datos.tipo);
    $(this).find('form').find("input[name=rut]")[0].defaultValue = checkNull(datos.rut);
    $(this).find('form').trigger('reset');    
});
$('.onShowEdicionMetodo').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('metodo_pago');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("input[name=estado]")[0].defaultValue = checkNull(datos.estado);
    $(this).find('form').trigger('reset');    
});
$('.onShowEdicionProducto').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('producto');
    
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("input[name=precio]")[0].defaultValue = checkNull(datos.precio);
    $(this).find('form').find("input[name=precio_oferta]")[0].defaultValue = checkNull(datos.precio_oferta);
    $(this).find('form').find("select[name=estado]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=estado]").find("option[value=" + datos.estado + "]").attr('selected','selected');
    $(this).find('form').find("input[name=stock]")[0].defaultValue = checkNull(datos.stock);
    $(this).find('form').find("select[name=categoria_id]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=categoria_id]").find("option[value=" + datos.categoria_id + "]").attr('selected','selected');
    $(this).find('form').find("textarea[name=descripcion]")[0].defaultValue = checkNull(datos.descripcion);
    $(this).find('form').trigger('reset');
});
$('.onShowEdicionOferta').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('oferta');
    $(this).find('form').find("input[name=porcentaje]")[0].defaultValue = checkNull(datos.porcentaje);
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("textarea[name=descripcion]")[0].defaultValue = checkNull(datos.descripcion);
    $(this).find('form').find("input[name=fecha_inicio]")[0].defaultValue =  checkNull(datos.fecha_inicio);
    $(this).find('form').find("input[name=fecha_termino]")[0].defaultValue =  checkNull(datos.fecha_termino);
    $(this).find('form').find("select[name=estado]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=estado]").find("option[value=" + datos.estado + "]").attr('selected','selected');
    $(this).find('form').trigger('reset');
});
$('.onShowEdicionEmpresa').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('empresa');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("input[name=razon_social]")[0].defaultValue = checkNull(datos.razon_social);
    $(this).find('form').find("input[name=telefono]")[0].defaultValue = checkNull(datos.telefono);
    $(this).find('form').find("input[name=direccion]")[0].defaultValue = checkNull(datos.direccion);
    $(this).find('form').find("input[name=rut]")[0].defaultValue = checkNull(datos.rut);
    $(this).find('form').find("input[name=tipo]")[0].defaultValue = checkNull(datos.tipo);
    $(this).find('form').trigger('reset');
});
$('.onShowEdicionCupon').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('cupon');
    var fecha_termino = "";
    if (datos.fecha_termino != null ) {
        fecha_termino = datos.fecha_termino.split(' ');
    }
    $(this).find('form').find("input[name=descuento]")[0].defaultValue = checkNull(datos.descuento);
    $(this).find('form').find("input[name=estado]")[0].defaultValue = checkNull(datos.estado);
    $(this).find('form').find("input[name=fecha_creacion]")[0].defaultValue = checkNull(datos.fecha_creacion);
    $(this).find('form').find("input[name=fecha_termino]")[0].defaultValue = fecha_termino[0] + 'T' + fecha_termino[1];
    $(this).find('form').trigger('reset');
});
$('.onShowEdicionCuenta').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('cuenta_bancaria');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("input[name=tipo]")[0].defaultValue = checkNull(datos.tipo);
    $(this).find('form').find("input[name=numero_cuenta]")[0].defaultValue = checkNull(datos.numero_cuenta);
    $(this).find('form').find("input[name=banco]")[0].defaultValue = checkNull(datos.banco);
    $(this).find('form').find("input[name=correo]")[0].defaultValue = checkNull(datos.correo);
    $(this).find('form').find("input[name=rut]")[0].defaultValue = checkNull(datos.rut);
    $(this).find('form').find("input[name=estado]")[0].defaultValue = checkNull(datos.estado);
    $(this).find('form').find("select[name=empresa_id]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=empresa_id]").find("option[value=" + datos.empresa_id + "]").attr('selected','selected');
    $(this).find('form').trigger('reset');
});
$('.onShowEdicionCorreo').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('correo');
    $(this).find('form').find("input[name=email]")[0].defaultValue = checkNull(datos.email);
    $(this).find('form').find("select[name=empresa_id]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=empresa_id]").find("option[value=" + datos.empresa_id + "]").attr('selected','selected');
    $(this).find('form').trigger('reset');
});
$('.onShowEdicionCategoria').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('categoria');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("textarea[name=descripcion]")[0].defaultValue = checkNull(datos.descripcion);
    $(this).find('form').find("input[name=estado]")[0].defaultValue = checkNull(datos.estado);
    $(this).find('form').find("input[name=sku]")[0].defaultValue = checkNull(datos.sku);
    $(this).find('form').trigger('reset');
});

$("#cancelado").click(function() {
    var n = $(this).closest('form').find("input[type=datetime-local], input[type=date], input[type=text], input[type=email], input[type=checkbox], input[type=password], textarea").length;
    for (i = 0; i < n; i++) { 
        $(this).closest('form').find("input[type=datetime-local], input[type=date], input[type=text], input[type=email], input[type=checkbox], input[type=password], textarea")[i].defaultValue = "";
        $(this).closest('form').find("select").find("option:selected").removeAttr("selected");
    }
});

function checkNull(dato) {
    if (!dato) return "";
    else return dato;
}

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