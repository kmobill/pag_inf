<?php

session_start();

require '../models/pedidosM.php';
$pedidos = new pedidosM();
date_default_timezone_set("America/Lima");
$date = date('Y-m-d H:i:s');
$fecha = date('Y-m-d');
$userId = $_SESSION['usu_1'];

$Id = isset($_POST["Id"]) ? LimpiarCadena($_POST["Id"]) : "";
$txtIdentificacion = isset($_POST["txtIdentificacion"]) ? LimpiarCadena($_POST["txtIdentificacion"]) : "";
$txtNombreCliente = isset($_POST["txtNombreCliente"]) ? LimpiarCadena($_POST["txtNombreCliente"]) : "";
$txtCelular = isset($_POST["txtCelular"]) ? LimpiarCadena($_POST["txtCelular"]) : "";
$txtConvencional = isset($_POST["txtConvencional"]) ? LimpiarCadena($_POST["txtConvencional"]) : "";
$txtCorreo = isset($_POST["txtCorreo"]) ? LimpiarCadena($_POST["txtCorreo"]) : "";
$txtSector = isset($_POST["txtSector"]) ? LimpiarCadena($_POST["txtSector"]) : "";
$txtCallePrincipal = isset($_POST["txtCallePrincipal"]) ? LimpiarCadena($_POST["txtCallePrincipal"]) : "";
$txtCalleSecundaria = isset($_POST["txtCalleSecundaria"]) ? LimpiarCadena($_POST["txtCalleSecundaria"]) : "";
$txtNumeracion = isset($_POST["txtNumeracion"]) ? LimpiarCadena($_POST["txtNumeracion"]) : "";
$txtReferencia = isset($_POST["txtReferencia"]) ? LimpiarCadena($_POST["txtReferencia"]) : "";
$txtFormaPago = isset($_POST["txtFormaPago"]) ? LimpiarCadena($_POST["txtFormaPago"]) : "";
$txtTipoFacturacion = isset($_POST["txtTipoFacturacion"]) ? LimpiarCadena($_POST["txtTipoFacturacion"]) : "";
$txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
$ESTADO = 'P';

switch ($_GET["action"]) {
    case 'fechaInicio':
        date_default_timezone_set("America/Lima");
        echo(date('Y-m-d H:i:s'));
        break;

    case 'selectAll':
        $respuesta = $pedidos->selectAll($fecha); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->IDENTIFICACION,
                "2" => $registrar->NOMBRES,
                "3" => $registrar->SECTOR,
                "4" => $registrar->DIRECCION,
                "5" => $registrar->ESTADO,
                '<center><li title="Editar" class="fa fa-edit" style="color: purple;" onclick="mostrar_uno(\'' . $registrar->ID . '\')"></i></center>'
            );
        }

        $resultados = array(
            "sEcho" => 1, /* informacion para la herramienta datatables */
            "iTotalRecords" => count($datos), /* envía el total de columnas a visualizar */
            "iTotalDisplayRecords" => count($datos), /* envia el total de filas a visualizar */
            "aaData" => $datos /* envía el arreglo completo que se llenó con el while */
        );
        echo json_encode($resultados);
        break;

    case 'selectById':
        $respuesta = $pedidos->selectById($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        ejecutarConsulta("UPDATE PEDIDOS.CLIENTES SET ESTADOPEDIDO = 'P' WHERE ID = '$Id' ");
        break;

    case 'ventasPorDia':
        $sql = ejecutarConsultaSimple("SELECT COUNT(ESTADOPEDIDO) AS NUM
                            FROM PEDIDOS.CLIENTES WHERE FechaInicio LIKE '%$fecha%'
                            AND ESTADOPEDIDO = 'F'
                            GROUP BY ESTADOPEDIDO; ");
        echo $sql["NUM"];
        break;
    
    case 'pedidosPorDia':
        $sql = ejecutarConsultaSimple("SELECT COUNT(ESTADOPEDIDO) AS NUM
                                        FROM PEDIDOS.CLIENTES WHERE FechaInicio LIKE '%2021-05-17%'
                                        AND ESTADOPEDIDO <> ''; ");
        echo $sql["NUM"];
        break;
    
    case 'promedioPorDia':
        $sql = ejecutarConsultaSimple("SELECT sec_to_time(sum(unix_timestamp(FECHAFIN) - unix_timestamp(FECHAINICIO))/count(ESTADOPEDIDO))AS PROM
                                        FROM PEDIDOS.CLIENTES WHERE FechaInicio LIKE '%2021-05-17%'
                                        AND ESTADOPEDIDO = 'F'; ");
        echo $sql["PROM"];
        break;

    case 'save':
        $IDC = isset($_POST["IDC"]) ? LimpiarCadena($_POST["IDC"]) : "";
        $EstadoP = isset($_POST["txtEstadoPedido"]) ? LimpiarCadena($_POST["txtEstadoPedido"]) : "";
        if ($IDC == '') {
            $respuesta = $pedidos->insert($txtIdentificacion, $txtNombreCliente, $txtCelular, $txtConvencional, $txtCorreo, $txtSector, $txtCallePrincipal, $txtNumeracion, $txtCalleSecundaria, $txtReferencia, $txtFormaPago, $txtTipoFacturacion, $txtFechaInicio, $date, $ESTADO);
            echo $respuesta ? "Registro almacenado" : "Error: registro no se pudo almacenar";
        } else {
            if ($EstadoP <> 'P') {
                $respuesta = "UPDATE PEDIDOS.CLIENTES SET ESTADOPEDIDO='$EstadoP', FechaFin = '$date' WHERE ID = '$IDC' ";
                ejecutarConsulta($respuesta);
                echo $respuesta ? "Registro actualizado" : "Error: registro no se pudo actualizar";
            } else {
                echo 'No hay datos por actualizar en su pedido';
            }
        }
        break;
}
?>

