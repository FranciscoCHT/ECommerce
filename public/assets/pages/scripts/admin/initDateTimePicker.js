$(function () {
    $(this).find('.datetime').datetimepicker({
        locale: 'es-do',
        format: 'YYYY-MM-DD HH:mm',
        minDate: '2000-01-01 00:00',
        maxDate: '2099-12-12 23:59',
        showTodayButton: true,
        showClear: true,
        tooltips: {
            today: 'Ir a hoy',
            clear: 'Borrar selección',
            close: 'Cerrar el calendario',
            selectTime: 'Seleccione hora',
            selectMonth: 'Seleccione mes',
            prevMonth: 'Mes anterior',
            nextMonth: 'Mes siguiente',
            selectYear: 'Seleccione año',
            prevYear: 'Año anterior',
            nextYear: 'Año siguiente',
            selectDecade: 'Seleccione década',
            prevDecade: 'Década anterior',
            nextDecade: 'Década siguiente'
        }
    });
})