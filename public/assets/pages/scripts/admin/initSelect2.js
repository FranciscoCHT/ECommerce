$(function () {
    $('.select2').select2({
        allowClear: true
    });
})
$('.onShowCrearSelect').on('show.bs.modal', function () {
    $(this).find('.select2').select2({
        allowClear: true
    });
})
$('.onShowEditarSelect').on('show.bs.modal', function () {
    $(this).find('.select2').select2({
        allowClear: true
    });
})