"use strict";

window.loadWindow = function(id, tipo) {
    window.location.href = HOST_URL + '/administracion/usuario/tab/' + id + '/' + tipo ;
};

var table;
var KTDatatablesDataSourceAjaxServer = function() {
    var initTable1 = function() {
        table = $('#kt_datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/administracion/usuario',
                type: 'GET'
            },
            //ajax: 'administracion/usuarios',
            columns: [
                { data: 'id', name: 'm.id', title: 'Acciones' },
                { data: 'name', name: 'm.name', title: 'Nombre' },
                { data: 'estado', name: 'm.estado', title: 'Estado' },
                /* data: 'fecha_formateada', name: 'ci.fecha_formateada', title: 'Fecha' },
                { data: 'estado', name: 'ci.estado', title: 'Estado' }*/
                //{data: 'Actions', responsivePriority: -1},
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    width: "300px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var boton = '<div align="center"><a href="javascript:loadWindow(\''+full.id+'\',\'update\');" class="btn btn-outline-primary ">'+
                            '<i class="flaticon2-menu-4"></i>&nbsp;Ingresar'+
                            '</a>';
                        return boton;
                    }
                },
            ],
        });
    };

    return {

        //main function to initiate the module
        init: function() {
            initTable1();
        },

    };

}();

jQuery(document).ready(function() {
    KTDatatablesDataSourceAjaxServer.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

