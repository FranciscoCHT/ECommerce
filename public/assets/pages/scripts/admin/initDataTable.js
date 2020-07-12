$(function () {
    var options = {
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'dom': 'rt'+"<'row footerTabla  '<'col-sm-5'i><'col-sm-7'p>>"+'<"clear">',
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }
    
    //////* FUNCIONES TABLA PRODUCTO */////////////////////////////
    var optionProducto = options;                                       /* Asigno las opciones de la tabla de producto y le agrego */
    optionProducto.aoColumnDefs = [                                     /* características personalizadas, para luego darle las opciones a la instancia.*/
        { "searchable": false, "orderable": false, "targets": -1 },
        { "visible": false, "targets": 3 },
    ];
    var tableProducto = $(this).find('#tabla-data-producto').DataTable(optionProducto)

    $(".dataTables_filter").hide();                                     /**/
    $('#searchData').keyup(function(){                                  /*  Esconde el search box de DataTable y se le asigna a uno personalizado */
        tableProducto.search($(this).val()).draw() ;                    /**/
    })

    tableProducto.search('Activo', false, true, false).draw();          /* Filtra el estado Activo inicial para mostrar productos activos,*/
    $(this).find('#estadoFiltro').on('change', function(){              /* luego en cambio de estado, filtra de nuevo.*/
        if (this.value == 0) {
            $estado = 'Activo';
        } else if (this.value == 1) {
            $estado = 'Inactivo';
        }
        tableProducto.search($estado, false, true, false).draw();   //search( input [, regex[ , smart[ , caseInsen ]]] )
    });

    //////* FUNCIONES TABLAS GENERALES *///////////////////////////
    var optionTablas = options;
    optionTablas.aoColumnDefs = [
        { "searchable": false, "orderable": false, "targets": -1 },
    ];
    var table = $(this).find('.tabla-data').DataTable(optionTablas)  // Para tablas generales, se utiliza una clase, debido a que pueden haber múltiples tablas en misma vista.

    $(".dataTables_filter").hide();             /**/
    $('#searchData').keyup(function(){          /*  Esconde el search box de DataTable y se le asigna a uno personalizado */
        table.search($(this).val()).draw() ;    /**/
    })

    //////* FUNCIONES TABLA ADDSTOCK */////////////////////////////
    var optionAddstock = options;
    optionAddstock.aoColumnDefs = [
        { "searchable": false, "orderable": false, "targets": -1 },
        { "visible": false, "targets": 1 },
        { "targets": 3, "className": 'text-right', "render": $.fn.dataTable.render.number( '.', ',', 0, '$ ' ) },
        { "targets": 4, "className": 'text-right' }
    ];
    var tableAddstock = $(this).find('#tabla-data-stock').DataTable(optionAddstock)

    $(".dataTables_filter").hide();                     /**/
    $('#searchData').keyup(function(){                  /*  Esconde el search box de DataTable y se le asigna a uno personalizado */
        tableAddstock.search($(this).val()).draw() ;    /**/
    })

})