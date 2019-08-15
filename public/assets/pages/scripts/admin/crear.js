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
$('.onShowEdicionMetodo').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('metodo_pago');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
    $(this).find('form').find("input[name=estado]")[0].defaultValue = datos.estado;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
    
});
$('.onShowEdicionProducto').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('producto');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
    $(this).find('form').find("input[name=precio]")[0].defaultValue = datos.precio;
    $(this).find('form').find("input[name=precio_oferta]")[0].defaultValue = datos.precio_oferta;
    $(this).find('form').find("input[name=estado]")[0].defaultValue = datos.estado;
    $(this).find('form').find("input[name=stock]")[0].defaultValue = datos.stock;
    $(this).find('form').find("input[name=categoria_id]")[0].defaultValue = datos.categoria_id;
    $(this).find('form').find("textarea[name=descripcion]")[0].defaultValue = datos.descripcion;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
});

$('.onShowEdicionOferta').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('oferta');
    var fecha_inicio = "";
    var fecha_termino = "";
    if (datos.fecha_inicio != null ) {
        fecha_inicio = datos.fecha_inicio.split(' ');
    }
    if (datos.fecha_termino != null ) {
        fecha_termino = datos.fecha_termino.split(' ');
    }
    $(this).find('form').find("input[name=porcentaje]")[0].defaultValue = datos.porcentaje;
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
    $(this).find('form').find("textarea[name=descripcion]")[0].defaultValue = datos.descripcion;
    $(this).find('form').find("input[name=fecha_inicio]")[0].defaultValue = fecha_inicio[0] + 'T' + fecha_inicio[1];
    $(this).find('form').find("input[name=fecha_termino]")[0].defaultValue = fecha_termino[0] + 'T' + fecha_termino[1];
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
});

$('.onShowEdicionEmpresa').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('empresa');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
    $(this).find('form').find("input[name=razon_social]")[0].defaultValue = datos.razon_social;
    $(this).find('form').find("input[name=telefono]")[0].defaultValue = datos.telefono;
    $(this).find('form').find("input[name=direccion]")[0].defaultValue = datos.direccion;
    $(this).find('form').find("input[name=rut]")[0].defaultValue = datos.rut;
    $(this).find('form').find("input[name=tipo]")[0].defaultValue = datos.tipo;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
});
$('.onShowEdicionCupon').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('cupon');
    $(this).find('form').find("input[name=descuento]")[0].defaultValue = datos.descuento;
    $(this).find('form').find("input[name=estado]")[0].defaultValue = datos.estado;
    $(this).find('form').find("input[name=fecha_creacion]")[0].defaultValue = datos.fecha_creacion;
    $(this).find('form').find("input[name=fecha_termino]")[0].defaultValue = datos.fecha_termino;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
});
$('.onShowEdicionCuenta').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('cuenta_bancaria');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
    $(this).find('form').find("input[name=tipo]")[0].defaultValue = datos.tipo;
    $(this).find('form').find("input[name=numero_cuenta]")[0].defaultValue = datos.numero_cuenta;
    $(this).find('form').find("input[name=banco]")[0].defaultValue = datos.banco;
    $(this).find('form').find("input[name=correo]")[0].defaultValue = datos.correo;
    $(this).find('form').find("input[name=rut]")[0].defaultValue = datos.rut;
    $(this).find('form').find("input[name=estado]")[0].defaultValue = datos.estado;
    $(this).find('form').find("input[name=empresa_id]")[0].defaultValue = datos.empresa_id;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
});
$('.onShowEdicionCorreo').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('correo');
    $(this).find('form').find("input[name=email]")[0].defaultValue = datos.email;
    $(this).find('form').find("input[name=empresa_id]")[0].defaultValue = datos.empresa_id;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
});
$('.onShowEdicionCategoria').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('categoria');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = datos.nombre;
    $(this).find('form').find("textarea[name=descripcion]")[0].defaultValue = datos.descripcion;
    $(this).find('form').find("input[name=estado]")[0].defaultValue = datos.estado;
    $(this).find('form').find("input[name=sku]")[0].defaultValue = datos.sku;
    var idForm = this.id.split('_');
    idForm = idForm[1];
    $('#form-editar_' + idForm).trigger('reset');
    ecommerce.validacionGeneral('form-editar_' + idForm);
});

$("#cancelado").click(function() {
    var n = $(this).closest('form').find("input[type=datetime-local], input[type=date], input[type=text], input[type=email], input[type=checkbox], input[type=password], textarea").length;
    for (i = 0; i < n; i++) { 
        $(this).closest('form').find("input[type=datetime-local], input[type=date], input[type=text], input[type=email], input[type=checkbox], input[type=password], textarea")[i].defaultValue = "";
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