"use strict";

window.loadWindow = function(id, tipo) {
    window.location.href = HOST_URL + '/bancooxigeno/item/tab/' + id + '/' + tipo ;
};

window.itemDelete = function(id){
    Swal.fire({
        title: 'Esta seguro de borrar el registro?',
        text: "Recuerde que el registro se eliminará permanentemente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar!!!',
        cancelButtonText: "No, cancelar"
    }).then(function(result) {
        if (result.value) {
            itemDeleteAction(id);
        }
    });
};

function itemDeleteAction(id){
    $.ajax({
        url : HOST_URL + '/bancooxigeno/item/general/' + id,
        type: 'DELETE'
    }).done(function(response){
        if (response === 1){
            Swal.fire({
                icon: 'success',
                title: 'El registro fue borrado satisfactoriamente',
                showConfirmButton: false,
                timer: 2000
            });
            window.table.draw();
        }else{
            Swal.fire({
                icon: 'error',
                title: 'El registro no puede ser eliminado, primero debe borrar los registros relacionados',
                showConfirmButton: false,
                timer: 4000
            });
        }
    });
}
window.itemPrint = function(id){
    window.open(HOST_URL + '/bancooxigeno/item/ficha/' + id, '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');
};

var table;
var KTDatatablesDataSourceAjaxServer = function() {
    var initTable1 = function() {
        window.table = $('#kt_datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/bancooxigeno/item',
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'bi.id', title: 'Acciones' },
                { data: 'codigo', name: 'bi.codigo', title: 'Código' },
                { data: 'establecimiento', name: 'ce.nombre', title: 'Establecimiento' },
                { data: 'fecha_formateada', name: 'bi.fecha', title: 'Fecha' },
                { data: 'estado', name: 'bi.estado', title: 'Estado' }
                //{data: 'Actions', responsivePriority: -1},
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    width: "350px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var ingresar='<a href="javascript:itemPrint(\''+data+'\');" class="btn btn-outline-success btn-sm mr-2 ">'+
                            '<i class="fa flaticon-technology ">&nbsp;Imprimir</i>'+
                            '</a>';
                        if (full.estado === 'Abierto'){
                            ingresar += '<a href="javascript:loadWindow(\''+full.id+'\',\'update\');" class="btn btn-outline-primary btn-sm mr-2">'+
                                '<i class="fa flaticon2-menu-4">&nbsp;Ingresar</i>'+
                                '</a>'+
                                '<a href="javascript:itemDelete(\''+data+'\');" class="btn btn-outline-danger btn-sm">'+
                                '<i class="fa flaticon-delete">&nbsp;Eliminar</i>'+
                                '</a>';
                        } else {
                            ingresar += '';
                        }

                        return '<div align="center"> ' + ingresar + ' </div>';
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

