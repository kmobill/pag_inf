$("#btnColumnas").click(function(){
    columnas();
});
$("#btnLineas").click(function(){
    lineas();
});
$("#btnTorta").click(function(){ 
    $(".modal-header").css("background-color", "#343a40");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Gráfico de Torta");
    $("#modal-1").modal("show");
    torta();
});
$("#btnPrueba").click(function(){
    $(".modal-header").css("background-color", "#dc3545");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Gráfico de pruebas");
    $("#modal-1").modal("show");
    prueba();
});


var chart1, options;
$("#btnBD").click(function(){
    $(".modal-header").css("background-color", "#17a2b8");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Gráfico desde BD");
    $("#modal-1").modal("show");
    
    $.ajax({
        url:"datos/graficos.php",
        type: "POST",
        dataType:"json",
        success:function(data){
            options.series[0].data = data;
            chart1 = new Highcharts.Chart(options);
            console.log(data);
        }
    })    
    datos();
});

function datos(){
    var v_modal = $("#modal_1").modal({show: false});      
    options = {
        chart:{
            renderTo: 'contenedor-modal',
            type: 'column'
        },
        title:{
            text: 'Stock de Productos'
        },
        xAxis:{
            type: 'category'
        },
        yAxis:{
            title:{
                text: ' Cantidad'
            }
        },
        plotOptions: {
            series:{
                borderWidth:1,
                dataLabels:{
                    enabled:true,
                    format:'{point.y:.0f}'
                }
            }
        },
        tooltip:{
            headerFormat:"<span style='font-size:11px'> {series.name}</span><br>",
            pointFormat: "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.0f}</b>"
        },
        series:[{
            name: "Productos",
            colorByPoint:true,
            data:[],
        }]        
    }
    v_modal.on("shown",function(){});
    v_modal.modal("show");
}

function columnas(){
    Highcharts.chart('contenedor',{
       chart:{
        type:'column'
        },
        title:{
            text:'Gráficos de columnas con profundidad'
        },
        xAxis:{
            type:'category'
        },
        yAxis:{
            title:{
                text: 'Cantidad de modelos por Marca'
            },
        },
        series:[{
            name:'Móviles',
            colorByPoint:true,
            data:[{
                name:'Samsung',
                y:5, //cant de modelos
                drilldown:'samsung'
            },{
                name:'Xiaomi',
                y:6,
                drilldown:'xiaomi'
            },{
                name:'Motorola',
                y:4,
                drilldown:'motorola'
            }]
        }],
        drilldown:{
            series:[{
                id:'samsung',
                data:[
                    ['Samsung Galaxy S10', 4],
                    ['Samsung Galaxy S10+', 2],
                    ['Samsung Note 9', 1],
                    ['Samsung J7 Prime', 2],
                    ['Samsung A8', 1]
                ]
            }, {
                id:'xiaomi',
                data:[
                    ['Xiaomi Mi 8', 4],
                    ['Xiaomi Mi 8 Lite', 6],
                    ['Xiaomi Redmi Note 7', 7],
                    ['Xiaomi Redmin Note 6 pro', 1],
                    ['Xiaomi Mi 9', 3],
                    ['Xiaomi Mi A2', 5]
                ]
            },{
                id:'motorola',
                data:[
                    ['Motorola G7 plus', 4],
                    ['Motorola G6', 2],
                    ['Motorola One', 3],
                    ['Motorola Z3 play', 6]
                ]
            }]
        }        
    });
}
function lineas(){
Highcharts.chart('contenedor',{  
    chart:{
            type:'line'
    },
    title:{
        text:'Crecimiento del empleo por Áreas - Energía sola'
    },
    xAxis:{
        allowDecimals: false
    },
    yAxis:{
        title:{
            text:'Número de empleados'
        }
    },
    legend:{
        layout:'vertical',
        align: 'right',
        verticalAlign:'middle'
    },
    plotOptions:{
        series:{
            pointStart:2018
        }
    },
    series:[{
        name:'Instalación',
        data:[1000, 2000, 3000, 3500, 5000]
    },{
        name:'Fabricación',
        data:[1880, 2580, 3900, 4500, 4800]
    },{
        name:'Ventas',
        data:[780, 2000, 3100, 3700, 3900]
    }],    
    
});    
}
function torta(){
    Highcharts.chart('contenedor-modal', {
        chart:{
            type:'pie',
            plotBackgroundColor: '#f8f9fa', //color de fondo del gráfico
            plotBorderwidth: 1,
            plotShadow:false,   
        },
        title:{
          text: 'Navegadores web. Participación en el mercado. Enero 2018.'  
        },
        tooltip:{
            pointFormat:'{series.name}:<b>{point.percentage:.2f}</b>%',
        },
        plotOptions:{
            pie:{
                allowPointSelect:true,
                cursor:'pointer',
                dataLabels:{
                    enabled: true,
                    format: '{point.name}:<b>{point.percentage:.2f}</b>%'                    
                }
            }
        },            
        series: [{
            name: 'Marcas',
            colorByPoint: true,
            data:[{
                name:'Chrome',
                y:61.41,
                sliced:true,
                selected: true
            },{
                name:'IE',
                y:11.84
            },{
                name:'Edge',
                y:4.67
            },{
                name:'Safari',
                y:4.18
            },{
                name:'Sogou Explorer',
                y:1.64
            },{
                name:'Opera',
                y:1.6
            },{
                name:'Otros',
                y:3.81
            }]
        }]               
    });
}
function prueba(){
//1era forma    
/*
Highcharts.chart('contenedor-modal', {
 chart:{
     type: 'line'
 },
    title:{
        text:'Valores mensuales'
    },
    xAxis:{
        categories:['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    series:[{
        data: [2,3,4,6,7,9,6,4,3,2,1,5]
    }],
});
*/

//2da forma
/*Highcharts.chart('contenedor-modal',{
    xAxis:{
        minPadding:0.05,
        maxPadding:0.05
    },
    series:[{
        data:[
            [0, 29.9],
            [1, 71.5],
            [3, 106.4]
        ]
    }]
});  */  
    
//3era forma
Highcharts.chart('contenedor-modal',{
   chart: {
        type:'column'    
   },
   xAxis:{
       categories: ['Rojo', 'Verde', 'Negro']
   },
   series:[{
        data:[
        {
           name:'Color 1',
           color:'#ff0031',
           y:10
        },
        {
          name:'Color 2',
           color:'#28a745',
           y:3
        },
        {
           name:'Color 3',
           color:'blak',
           y:5
        }]
   }]        
});    
    
}