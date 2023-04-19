"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';


var KTApexChartsDemo = function () {
    // Private functions

    var grafico_rhd = function () {
        const apexChart = "#grafico_rhd";
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
                    horizontal: false,
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
                    text: 'Disponibilidad Camas UTI por Departamento a Nivel Nacional'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return  val + " Camas";
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
                    fontSize: '14px',
                    fontFamily: undefined
                }
            },
            colors: ['#3f48cc','#ff7f27','#f44336']
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/general/grafico_rhd/', function(response) {
            chart.updateSeries(response.serie);
            chart.updateOptions( {
                xaxis: {
                    categories: response.categoria
                }
            });
        });
    };


    var grafico_banco_oxigeno = function () {
        const apexChart = "#grafico_banco_oxigeno";
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
                    horizontal: false,
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
                    text: 'Disponibilidad de Tubos de Oxígeno por Departamento a Nivel Nacional'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return  val + " Tubos";
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
                    fontSize: '14px',
                    fontFamily: undefined
                }
            },
            colors: ['#52fff9','#00a8f3','#3f48cc','#ff7f27','#9c27b0','#f44336']
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/general/grafico_banco_oxigeno/', function(response) {
            chart.updateSeries(response.serie);
            chart.updateOptions( {
                xaxis: {
                    categories: response.categoria
                }
            });
        });
    };

    var grafico_sive= function () {
        const apexChart = "#grafico_sive";
        var options = {
            series: [],
            chart: {
                type: 'line',
                zoom: {
                    enabled: false
                },
                height: 350,

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
            colors: ['#f44336','#0ed145','#3f48cc'],

            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth'
            },

            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            /*markers: {
                size: 1
            },*/
            xaxis: {
                categories: [],
                title: {
                    text: 'Semana Epidemiológica'
                }
            },
            yaxis: {
                title: {
                    text: 'Casos Positivos COVID19 a Nivel Nacional'
                },
                min: 5,
                max: 7000
            },
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/general/grafico_sive/', function(response) {
            chart.updateSeries(response.serie);
            chart.updateOptions( {
                xaxis: {
                    categories: response.categoria
                }
            });
        });
    };

    var grafico_sive_positivos= function () {
        const apexChart = "#grafico_sive_positivos";
        var options = {
            series: [],
            chart: {
                type: 'line',
                zoom: {
                    enabled: false
                },
                height: 350,

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
            colors: ['#0ed145','#f44336','#3f48cc'],

            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth'
            },

            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            /*markers: {
                size: 1
            },*/
            xaxis: {
                categories: [],
                title: {
                    text: 'Semana Epidemiológica'
                }
            },
            yaxis: {
                title: {
                    text: 'Casos Positivos COVID19 a Nivel Nacional'
                },
                min: 5,
                max: 3700
            },
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/general/grafico_sive_positivos/', function(response) {
            chart.updateSeries(response.serie);
            chart.updateOptions( {
                xaxis: {
                    categories: response.categoria
                }
            });
        });
    };


    var grafico_rhd_utis= function () {
        const apexChart = "#grafico_rhd_utis";
        var options = {
            series: [],
            chart: {
                type: 'line',
                zoom: {
                    enabled: false
                },
                height: 350,

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
            colors: ['#3f48cc','#f44336'],

            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth'
            },

            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            /*markers: {
                size: 1
            },*/
            xaxis: {
                categories: [],
                title: {
                    text: 'Fecha del Reporte'
                }
            },
            yaxis: {
                title: {
                    text: 'Camas UTI a Nivel Nacional'
                },
                min: 5,
                max: 400
            },
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/general/grafico_rhd_utis/', function(response) {
            chart.updateSeries(response.serie);
            chart.updateOptions( {
                xaxis: {
                    categories: response.categoria
                }
            });
        });
    };

    var grafico_rnve = function () {
        const apexChart = "#grafico_rnve";
        var options = {
            series: [],
            chart: {
                width: 700,
                type: 'donut',
            },
            labels: [],
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

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/salasituacional/item/general/grafico_rnve/', function(response) {
            chart.updateOptions( {
                series : response.serie,
                labels : response.categoria,
            });
        });


    };


    return {
        // public functions
        init: function () {
            grafico_rhd();
            grafico_banco_oxigeno();
            grafico_sive();
            grafico_rhd_utis();
            grafico_rnve();
            grafico_sive_positivos();
        },

    };
}();

jQuery(document).ready(function () {
    KTApexChartsDemo.init();

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });

});




