$(function () {
    $(this).find('.select2search').select2({
        allowClear: true
    });
    $(this).find('.select2').select2({
        allowClear: true,
        minimumResultsForSearch: Infinity
    });
    $('.onShowCrearSelect').on('show.bs.modal', function () {
        $(this).find('.select2search').select2({
            allowClear: true
        });
        $(this).find('.select2').select2({
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
    })
    $('.onShowEditarSelect').on('show.bs.modal', function () {
        $(this).find('.select2search').select2({
            allowClear: true
        });
        $(this).find('.select2').select2({
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
    })
})