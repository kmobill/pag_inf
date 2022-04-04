
'use strict';

function init() { /* función inicial */
    // [ Donut-chart ] Start
    $.ajax({
        url: "../ajax/dashboardC.php?action=tipoComentario",
        method: "POST",
        dataType: "json",
        success: function (data)
        {
            var graph = Morris.Donut({
                element: 'morris-donut-chart',
                data: data,
                colors: [
                    '#1de9b6',
                    '#A389D4',
                    '#04a9f5',
                    '#1dc4e9',
                ],
                resize: true,
                formatter: function (x) {
                    return "Cantidad : " + x
                }
            });
            graph.setData(data);
        }

    });
    // [ Donut-chart ] end

    // [ bar-simple ] chart start
    $.ajax({
        url: "../ajax/dashboardC.php?action=tipoComentarioAnio",
        method: "POST",
        dataType: "json",
        success: function (data)
        {
            Morris.Bar({
                element: 'morris-bar-chart',
                data: data,
                xkey: 'y',
                barSizeRatio: 0.70,
                barGap: 3,
                resize: true,
                responsive: true,
                ykeys: ['a', 'b', 'c'],
                labels: ['Positivo', 'Negativo', 'Neutro'],
                barColors: ["0-#1de9b6-#1dc4e9", "0-#899FD4-#A389D4", "#04a9f5"]
            });
        }

    });
    // [ bar-simple ] chart end

    // [ line-chart ] start
    $.ajax({
        url: "../ajax/dashboardC.php?action=atributos",
        method: "POST",
        dataType: "json",
        success: function (data)
        {
            Highcharts.chart('line-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Cantidad de atributos'
                    },
                },
                series: [{
                        name: 'Atributos',
                        colorByPoint: true,
                        data: data,
                    }],
            });
        }

    });
    // [ line-chart ] end

}

init(); /* ejecuta la función inicial */