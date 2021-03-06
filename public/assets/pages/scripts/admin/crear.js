$(document).ready(function () {
    ecommerce.validacionGeneral('form-crear');
});

$('.onShowCrear').on('show.bs.modal', function () {
    $('#form-crear').trigger('reset');
    var validator = $('#form-crear').validate();
    validator.resetForm();
})

$('.onShowAddStock').on('show.bs.modal', function () { //Reseteo de formulario al presionar el botón correspondiente
    $('#form-addStock').trigger('reset');              //y luego volver a inicializar el validador.
    var validator = $('#form-addStock').validate();
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
    $(this).find('form').find("select[name=tipo]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=tipo]").find("option[value=" + datos.tipo + "]").attr('selected','selected');
    $(this).find('form').find("input[name=rut]")[0].defaultValue = checkNull(datos.rut);
    $(this).find('form').trigger('reset');    
});
$('.onShowEdicionMetodo').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('metodo_pago');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("select[name=estado]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=estado]").find("option[value=" + datos.estado + "]").attr('selected','selected');
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
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("input[name=descuento]")[0].defaultValue = checkNull(datos.descuento);
    $(this).find('form').find("select[name=estado]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=estado]").find("option[value=" + datos.estado + "]").attr('selected','selected');
    $(this).find('form').find("input[name=fecha_inicio]")[0].defaultValue =  checkNull(datos.fecha_inicio);
    $(this).find('form').find("input[name=fecha_termino]")[0].defaultValue =  checkNull(datos.fecha_termino);
    $(this).find('form').trigger('reset');
});
$('.onShowEdicionCuenta').on('show.bs.modal', function () {
    var datos = $(this).find('form').data('cuenta_bancaria');
    $(this).find('form').find("input[name=nombre]")[0].defaultValue = checkNull(datos.nombre);
    $(this).find('form').find("select[name=tipo]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=tipo]").find("option[value='" + datos.tipo + "']").attr('selected','selected');
    $(this).find('form').find("input[name=numero_cuenta]")[0].defaultValue = checkNull(datos.numero_cuenta);
    $(this).find('form').find("input[name=banco]")[0].defaultValue = checkNull(datos.banco);
    $(this).find('form').find("input[name=correo]")[0].defaultValue = checkNull(datos.correo);
    $(this).find('form').find("input[name=rut]")[0].defaultValue = checkNull(datos.rut);
    $(this).find('form').find("select[name=estado]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=estado]").find("option[value=" + datos.estado + "]").attr('selected','selected');
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
    $(this).find('form').find("select[name=estado]").find("option:selected").removeAttr("selected");
    $(this).find('form').find("select[name=estado]").find("option[value=" + datos.estado + "]").attr('selected','selected');
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