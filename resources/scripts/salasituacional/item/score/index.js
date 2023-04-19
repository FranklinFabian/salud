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
            colors: ['#9c27b0','#f44336','#ff7f27']
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
            colors: ['#f44336'],

            dataLabels: {
                enabled: true,
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
                max: 4000
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

        $.getJSON(HOST_URL + '/salasituacional/item/general/grafico_sive/', function(response) {
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
            //grafico_rhd();
            //grafico_banco_oxigeno();
            //grafico_sive();
            //grafico_rnve();

        },

    };
}();

jQuery(document).ready(function () {
    KTApexChartsDemo.init();

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });

});




