var tabla;
function init() { /* función inicial */
    $("#mensaje").hide();
}

function limpiar_formulario() {
    $("#mensaje").html("");
}

$("#btnVentas").click(function () {
    limpiar_formulario();
    $("#mensaje").show();
    $.ajax({
        url: "../ajax/pedidosC.php?action=ventasPorDia",
        type: 'get',
        success: function (data) {
            $("#mensaje").html("VENTAS REALIZADAS: " + data);
        }
    });
});

$("#btnPedidos").click(function () {
    limpiar_formulario();
    $("#mensaje").show();
    $.ajax({
        url: "../ajax/pedidosC.php?action=pedidosPorDia",
        type: 'get',
        success: function (data) {
            $("#mensaje").html("PEDIDOS REALIZADOS: " + data);
        }
    });
});

$("#btnPromedio").click(function () {
    limpiar_formulario();
    $("#mensaje").show();
    $.ajax({
        url: "../ajax/pedidosC.php?action=promedioPorDia",
        type: 'get',
        success: function (data) {
            $("#mensaje").html("PROMEDIO POR PEDIDO: " + data);
        }
    });
});

init(); /* ejecuta la función inicial */
