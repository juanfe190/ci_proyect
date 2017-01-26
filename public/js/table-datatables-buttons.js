//Data Settings

var language = 
    {
    "aria": {
        "sortAscending": ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    },
    "emptyTable": "No hay datos disponibles en la tabla",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoEmpty": "No entries found",
    "infoFiltered": "(filtered1 from _MAX_ total entries)",
    "lengthMenu": "_MENU_ entradas",
    "search": "Buscar:",
    "zeroRecords": "No matching records found",
    "buttons": {
        "print": "Imprimir",
        "copy": "Copiar",
        "copyTitle": "Copiados a portapapeles",
        "copySuccess": {
            _: 'Copiados %d registros al portapapeles',
            1: 'Copiado 1 registro al portapapeles'
        }
    }
};

var buttons =
    [
        { extend: 'print', className: 'btn dark btn-outline' },
        { extend: 'copy', className: 'btn red btn-outline' },
        { extend: 'pdf', className: 'btn green btn-outline' },
        { extend: 'excel', className: 'btn yellow btn-outline ' }
    ];

var lengthMenu =
    [
        [5, 10, 20, -1],
        [5, 10, 20, "Todos"]
    ];

var pageLength = 5;

//Tables info

var TableDatatablesButtons = function () {

    var rolesIndexTable = function () {
        var table = $('#roles_index_table');

        var oTable = table.dataTable({

            "language": language,

            buttons: buttons,

            responsive: true,

            columnDefs: [ {
                orderable: false,
                targets:   1
            } ],

            "order": [
                [0, 'asc']
            ],
            
            "lengthMenu": lengthMenu,
            "pageLength": pageLength,
            "pagingType": 'bootstrap_extended',

        });

        $('#roles_index_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });
    }

    var usersIndexTable = function () {
        var table = $('#users_index_table');

        var oTable = table.dataTable({

            "language": language,

            buttons: buttons,

            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },

            columnDefs: [ {
                className: 'control',
                orderable: false,
                targets:   0
            }, {
                orderable: false,
                targets:   9
            } ],

            
            order: [1, 'asc'],
            
            "lengthMenu": lengthMenu,
            "pageLength": pageLength,
            "pagingType": 'bootstrap_extended',

             
        });

       $('#users_index_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });
    }

    var categoriesIndexTable = function () {
        var table = $('#categories_index_table');

        var oTable = table.dataTable({
            
            "language": language,

            buttons: buttons,

            responsive: true,

            columnDefs: [ {
                orderable: false,
                targets:   2
            } ],

            order: [1, 'asc'],
            
            "lengthMenu": lengthMenu,
            "pageLength": pageLength,
            "pagingType": 'bootstrap_extended',
             
        });

       $('#categories_index_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });
    }

    var coursesIndexTable = function () {
        var table = $('#courses_index_table');

        var oTable = table.dataTable({
            
            "language": language,

            buttons: buttons,

            responsive: true,

            columnDefs: [ {
                orderable: false,
                targets:   3
            } ],

            order: [0, 'asc'],
            
            "lengthMenu": lengthMenu,
            
            "pageLength": pageLength,
            "pagingType": 'bootstrap_extended', 

             
        });

       $('#courses_index_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });
    }

    var stagesIndexTable = function () {
        var table = $('#stages_index_table');

        var oTable = table.dataTable({
            
            "language": language,

            buttons: buttons,

            responsive: true,

            columnDefs: [ {
                orderable: false,
                targets:   2
            } ],

            
            order: [0, 'asc'],
            
            "lengthMenu": lengthMenu,
            
            "pageLength": pageLength,
            "pagingType": 'bootstrap_extended',

             
        });

       $('#stages_index_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });
    }

    var itemsIndexTable = function () {
        var table = $('#items_index_table');

        var oTable = table.dataTable({
            
            "language": language,

            buttons: buttons,

            responsive: true,

            columnDefs: [ {
                orderable: false,
                targets:   3
            } ],

            order: [0, 'asc'],
            
            "lengthMenu": lengthMenu,
            "pageLength": pageLength,
            "pagingType": 'bootstrap_extended', 

             
        });

       $('#items_index_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            oTable.DataTable().button(action).trigger();
        });
    }

    

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            rolesIndexTable();
            usersIndexTable();
            categoriesIndexTable();
            coursesIndexTable();
            stagesIndexTable();
            itemsIndexTable();
        }

    };

}();

jQuery(document).ready(function() {
    TableDatatablesButtons.init();
});
//# sourceMappingURL=table-datatables-buttons.js.map
