"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';


var KTApexChartsDemo = function () {
    // Private functions

    var grafico_rnve = function () {
        const apexChart = "#grafico_rnve";
        var options = {
            series: [31954, 2, 15464, 12196, 76016,52536,130831,2694],
            chart: {
                width: 700,
                type: 'donut',
            },
            labels: ['ASTRAZENECA-1ra. DOSIS', 'ASTRAZENECA-2da. DOSIS', 'PFIZER-1ra. DOSIS', 'PFIZER-2da. DOSIS', 'SINOPHARM-1ra. DOSIS', 'SINOPHARM-2da. DOSIS', 'SPUTNIK-V-1ra. DOSIS', 'SPUTNIK-V-2da. DOSIS'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            colors: ['#ffe88b','#c3c3c3','#585858','#52fff9','#00a8f3','#3f48cc','#ff7f27','#9c27b0','#f44336']
        };

        /*var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();*/

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

    };

    return {
        // public functions
        init: function () {
            //grafico_rnve();

        },

    };
}();

jQuery(document).ready(function () {
    //KTApexChartsDemo.init();

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });

});


$('.beni').on('click',function(){
    $('#beni').css("fill", "#E7EFB1");
    $("#modal_beni").modal()
});

$('.chuquisaca').on('click',function(){
    $('#chuquisaca').css("fill", "#E7EFB1");
    $("#modal_chuquisaca").modal()
});

$('.cochabamba').on('click',function(){
    $('#cochabamba').css("fill", "#E7EFB1");
    $("#modal_cochabamba").modal()
});

$('.lapaz').on('click',function(){
    $('#lapaz').css("fill", "#E7EFB1");
    $("#modal_lapaz").modal()
});

$('.oruro').on('click',function(){
    $('#oruro').css("fill", "#E7EFB1");
    $("#modal_oruro").modal()
});

$('.pando').on('click',function(){
    $('#pando').css("fill", "#E7EFB1");
    $("#modal_pando").modal()
});

$('.potosi').on('click',function(){
    $('#potosi').css("fill", "#E7EFB1");
    $("#modal_potosi").modal()
});

$('.santacruz').on('click',function(){
    $('#santacruz').css("fill", "#E7EFB1");
    $("#modal_santacruz").modal()
});

$('.tarija').on('click',function(){
    $('#tarija').css("fill", "#E7EFB1");
    $("#modal_tarija").modal()
});



$('#modal_beni').on('hidden.bs.modal', function () {
    $('#beni').css("fill", "#5cd08d");
})

$('#modal_chuquisaca').on('hidden.bs.modal', function () {
    $('#chuquisaca').css("fill", "#4dc0b5");
})

$('#modal_cochabamba').on('hidden.bs.modal', function () {
    $('#cochabamba').css("fill", "#4dc0b5");
})

$('#modal_lapaz').on('hidden.bs.modal', function () {
    $('#lapaz').css("fill", "#4aa0e6");
})

$('#modal_oruro').on('hidden.bs.modal', function () {
    $('#oruro').css("fill", "#4aa0e6");
})

$('#modal_pando').on('hidden.bs.modal', function () {
    $('#pando').css("fill", "#5cd08d");
})

$('#modal_potosi').on('hidden.bs.modal', function () {
    $('#potosi').css("fill", "#4aa0e6");
})

$('#modal_santacruz').on('hidden.bs.modal', function () {
    $('#santacruz').css("fill", "#5cd08d");
})

$('#modal_tarija').on('hidden.bs.modal', function () {
    $('#tarija').css("fill", "#4dc0b5");
})




