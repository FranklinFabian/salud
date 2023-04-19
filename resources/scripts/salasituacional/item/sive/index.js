"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

var KTApexChartsDemo = function () {
    // Private functions

    var grafico= function () {
        const apexChart = "#grafico_sive";
        var options = {
            series: [],
            chart: {
                type: 'line',
                zoom: {
                    enabled: false
                },
                height: 700,
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: true
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
            colors: ['#ffe88b','#c3c3c3','#585858','#52fff9','#00a8f3','#3f48cc','#ff7f27','#9c27b0','#f44336'],

            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: '.',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: [],
                title: {
                    text: 'Semana Epidemiológica'
                }
            },
            yaxis: {
                title: {
                    text: 'Casos Positivos COVID19'
                },
                min: 5,
                max: 2200
            },
            legend: {
                position: 'top',
                horizontalAlign: 'center',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/sive/grafico/', function(response) {
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
        init: function () {
            grafico();

        },

    };
}();

jQuery(document).ready(function () {
    KTApexChartsDemo.init();

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });

});


