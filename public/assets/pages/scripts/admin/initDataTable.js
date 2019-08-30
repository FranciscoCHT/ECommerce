$(function () {
    var tableProducto = $(this).find('#tabla-data-producto').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'dom': 'rt'+"<'row footerTabla  '<'col-sm-5'i><'col-sm-7'p>>"+'<"clear">',
        "columnDefs": [
            { "searchable": false, "orderable": false, "targets": -1 },
            { "visible": false, "targets": 3 },
        ],
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
    })

    $(".dataTables_filter").hide();             /**/
    $('#searchData').keyup(function(){          /*  Esconde el search box de DataTable y se le asigna a uno personalizado */
        tableProducto.search($(this).val()).draw() ;    /**/
    })

    tableProducto.search('Activo', false, true, false).draw();      /* Filtra el estado Activo inicial para mostrar productos activos,*/
    $(this).find('#estadoFiltro').on('change', function(){  /* luego en cambio de estado, filtra de nuevo.*/
        if (this.value == 0) {
            $estado = 'Activo';
        } else if (this.value == 1) {
            $estado = 'Inactivo';
        }
        tableProducto.search($estado, false, true, false).draw();   //search( input [, regex[ , smart[ , caseInsen ]]] )
    });
    

    var table = $(this).find('#tabla-data').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'dom': 'rt'+"<'row footerTabla  '<'col-sm-5'i><'col-sm-7'p>>"+'<"clear">',
        "columnDefs": [
            { "searchable": false, "orderable": false, "targets": -1 },
        ],
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
    })

    $(".dataTables_filter").hide();             /**/
    $('#searchData').keyup(function(){          /*  Esconde el search box de DataTable y se le asigna a uno personalizado */
        table.search($(this).val()).draw() ;    /**/
    })

})