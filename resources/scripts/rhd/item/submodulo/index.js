"use strict";

/*window.loadWindow = function(id, tipo) {
    window.location.href = HOST_URL + '/administracion/usuario/tab/' + id + '/' + tipo ;
};*/

var table;
var KTDatatablesDataSourceAjaxServer = function() {
    var initTable1 = function() {
        table = $('#submodule_datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/administracion/usuario/submodulo/datatable/' + 1 + '/' + 1 ,
                type: 'GET'
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
                        var boton = '<div align="center"><a href="javascript:loadWindow(\''+full.id+'\',\'update\');" class="btn btn-info btn-sm kt-margin-r-5-desktop kt-margin-r-5-tablet-and-mobile kt-margin-b-5-tablet-and-mobile" style="width: 95px;">'+
                            '<i class="fa flaticon-edit">&nbsp;Ingresar</i>'+
                            '</a>';
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

