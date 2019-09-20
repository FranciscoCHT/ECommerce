$(function () {
    $.fn.select2.defaults.set('language', 'es');
    // if (!$(this).find('.select2').hasClass("select2-hidden-accessible")) {
    //     $(this).find('.select2').select2({
    //         allowClear: true,
    //         minimumResultsForSearch: Infinity
    //     });
    // }
    // if (!$(this).find('.select2search').hasClass("select2-hidden-accessible")) {
    //     $(this).find('.select2search').select2({
    //         allowClear: true
    //     });
    // }   

    $('.onShowAddStock').on('show.bs.modal', function () {
        if (!$(this).find('.select2ProductStock').hasClass("select2-hidden-accessible")) {
            $(this).find('.select2ProductStock').select2({
                allowClear: true
            });
        }
    })
    
    $('.onShowCrearSelect').on('show.bs.modal', function () {
        if (!$(this).find('.select2').hasClass("select2-hidden-accessible")) {
            $(this).find('.select2').select2({
                allowClear: true,
                minimumResultsForSearch: Infinity // Para que no muestre el buscador del SelectBox
            });
        }
        if (!$(this).find('.select2search').hasClass("select2-hidden-accessible")) {
            $(this).find('.select2search').select2({
                allowClear: true
            });
        }  
    })
    
    $('.onShowEditarSelect').on('show.bs.modal', function () {
        if (!$(this).find('.select2').hasClass("select2-hidden-accessible")) {
            $(this).find('.select2').select2({
                allowClear: true,
                minimumResultsForSearch: Infinity // Para que no muestre el buscador del SelectBox
            });
        }
        if (!$(this).find('.select2search').hasClass("select2-hidden-accessible")) {
            $(this).find('.select2search').select2({
                allowClear: true
            });
        }  
    })

    if (!$(this).find('.selectTabla').hasClass("select2-hidden-accessible")) {
        $(this).find('.selectTabla').select2({
            minimumResultsForSearch: Infinity // Para que no muestre el buscador del SelectBox
        });
    }
})