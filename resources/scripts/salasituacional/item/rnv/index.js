"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

var chart;


var KTApexChartsDemo = function () {
    // Private functions

    var grafico= function (id_departamento) {
        const apexChart = "#grafico";
        var options = {
            series: [],
            chart: {
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                },
                type: 'bar',
                height: 750,
                width: "100%"
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    endingShape: 'rounded',
                    barHeight: '100%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['transparent']
            },
            xaxis: {
                categories: [],
            },
            legend: {
                position: "right",
                verticalAlign: "top",
                containerMargin: {
                    left: 35,
                    right: 60
                }
            },
            yaxis: {
                title: {
                    text: 'Vacunas por Ente Gestor'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return  val + " Vacunas";
                    }
                }
            },
            noData: {
                text: 'Cargando....',
                align: 'center',
                verticalAlign: 'middle',
                offsetX: 0,
                offsetY: 0,
                style: {
                    color: undefined,
                    fontSize: '20px',
                    fontFamily: undefined
                }
            },
            colors: ['#ffe88b','#c3c3c3','#585858','#52fff9','#00a8f3','#3f48cc','#ff7f27','#9c27b0','#f44336']
        };

        chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/rnv/grafico/' + id_departamento , function(response) {
            chart.updateSeries(response.serie);
            chart.updateOptions( {

                xaxis: {
                    categories: response.categoria
                }
            });
        });

    };



    return {
        // public functions
        init: function (id_departamento) {
            grafico(id_departamento);

        },

    };
}();

jQuery(document).ready(function () {
    var id_departamento = $("#id_departamento").val();
    KTApexChartsDemo.init(id_departamento);

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });

});

$("#generar_reporte").on('click', function () {
    chart.destroy();
    var id_departamento = $("#id_departamento").val();
    KTApexChartsDemo.init(id_departamento);
});



