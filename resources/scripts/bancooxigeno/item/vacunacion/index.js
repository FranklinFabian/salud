"use strict";

window.loadWindow = function(id, type) {
    var pid = $('#pid').val();
    $.get(HOST_URL + '/bancooxigeno/item/vacunacion/' + id + '/' + type + '/' + pid + '/edit', function (data) {
        $("#modal-content").html(data);
        $("#form_modal").modal("show");
    });
};

window.itemDelete = function(id){
    //alert(123123);
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
        url : HOST_URL + '/bancooxigeno/item/vacunacion/' + id,
        type: 'DELETE'
    }).done(function(response){
        if (response == 1){
            Swal.fire({
                icon: 'success',
                title: 'El registro fue borrado satisfactoriamente',
                showConfirmButton: false,
                timer: 2000
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'El registro no puede ser eliminado, primero debe borrar los registros relacionados',
                showConfirmButton: false,
                timer: 4000
            });
        }
        window.table.draw();
    });

}



var table;

var KTDatatablesDataSourceAjaxServer = function() {
    var pid = $('#pid').val();
    var initTable1 = function() {
        window.table = $('#vacunacion_datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/bancooxigeno/item/vacunaciondatatable/' + pid,
                /*data: {
                    // parameters for custom backend script demo
                    columnsDef: [
                        'OrderID', 'Country',
                        'ShipAddress', 'CompanyName', 'ShipDate',
                        'Status', 'Type', 'Actions'],
                },*/
            },
            //ajax: 'administracion/usuarios',
            columns: [
                { data: 'id', name: 'bv.id', title: 'Acciones' },
                { data: 'vacuna', name: 'bcv.nombre', title: 'Vacuna' },
                { data: 'dosis', name: 'bcd.nombre', title: 'Dosis' },
                { data: 'cantidad_recibida', name: 'bv.cantidad_recibida', title: 'Cantidad Recibida' },
                { data: 'cantidad_usada', name: 'bv.cantidad_usada', title: 'Cantidad Usada' },
                { data: 'mujeres_gestantes', name: 'bv.mujeres_gestantes', title: 'Mujeres Gestantes Vacunadas' },

            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    width: "300px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var boton = '<div align="center"><a href="javascript:loadWindow(\''+full.id+'\',\'update\');" class="btn btn-sm btn-outline-primary mr-2" style="width:110px;">'+
                            '<i class="fa flaticon-edit">&nbsp;Editar</i>'+
                            '</a>'+

                            '<a href="javascript:itemDelete(\''+data+'\');" class="btn btn-sm btn-outline-danger" style="width:110px;">'+
                            '<i class="fa flaticon-delete">&nbsp;Eliminar</i>'+
                            '</a>'+
                            '</div>';

                        return boton;
                    }
                },
             /*   {
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return '\
							<div class="dropdown dropdown-inline">\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	                                <i class="la la-cog"></i>\
	                            </a>\
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
									<ul class="nav nav-hoverable flex-column">\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
									</ul>\
							  	</div>\
							</div>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>\
							</a>\
						';
                    },
                },*/
               /* {
                    width: '75px',
                    targets: -3,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {'title': 'Pending', 'class': 'label-light-primary'},
                            2: {'title': 'Delivered', 'class': ' label-light-danger'},
                            3: {'title': 'Canceled', 'class': ' label-light-primary'},
                            4: {'title': 'Success', 'class': ' label-light-success'},
                            5: {'title': 'Info', 'class': ' label-light-info'},
                            6: {'title': 'Danger', 'class': ' label-light-danger'},
                            7: {'title': 'Warning', 'class': ' label-light-warning'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                    },
                },*/
                /*{
                    width: '75px',
                    targets: -2,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {'title': 'Online', 'state': 'danger'},
                            2: {'title': 'Retail', 'state': 'primary'},
                            3: {'title': 'Direct', 'state': 'success'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                            '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                    },
                },*/
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
});

function loadNewWindow(){
    alert(123);
}


