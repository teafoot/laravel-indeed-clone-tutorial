window.$ = window.jQuery = require('jquery'); //changed
require('datatables.net-bs4');

jQuery(function () {
    $('#lista-vacantes').DataTable({
        // bPaginate: false,
        // bFilter: false,
        // bInfo: false,
        // bSortable: false,
        aoColumnDefs: [
            { "aTargets": [0], "bSortable": true, "bSearchable": true },
            { "aTargets": [1], "bSortable": true, "bSearchable": false },
            { "aTargets": [2], "bSortable": true, "bSearchable": false },
            { "aTargets": [3], "bSortable": false, "bSearchable": false } // 4th column not sortable ; Acciones
        ],
        aaSorting: [[1, 'asc']],// 2nd column (estado) asc (Activo) by default

        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        // pageLength: 50, // doesn't work
    });
});
