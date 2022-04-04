<?php

require '../config/connection.php';

Class pedidosM {

    public function _construct() { /* Constructor */
    }

    function selectAll($fecha) { //mostrar todos los registros
        $sql = "SELECT ID, IDENTIFICACION, NOMBRES, SECTOR, CONCAT(CALLEPRINCIPAL, ' ',NUMERACION, ' ',CALLESECUNDARIA) AS DIRECCION, "
                . "CASE WHEN ESTADOPEDIDO = 'P' THEN 'PENDIENTE' "
                . "WHEN ESTADOPEDIDO = 'F' THEN 'FINALIZADO' "
                . "WHEN ESTADOPEDIDO = 'C' THEN 'CANCELADO' END AS ESTADO "
                . "FROM PEDIDOS.CLIENTES WHERE FechaInicio like '%$fecha%' ";
        return ejecutarConsulta($sql);
    }

    function insert($txtIdentificacion, $txtNombreCliente, $txtCelular, $txtConvencional, $txtCorreo, $txtSector, $txtCallePrincipal, $txtNumeracion, $txtCalleSecundaria, $txtReferencia, $txtFormaPago, $txtTipoFacturacion, $txtFechaInicio, $date, $ESTADO) { //inserción de datos
        $sql = "INSERT INTO pedidos.clientes(Identificacion, Nombres, Celular, Convencional, Correo, Sector, CallePrincipal, CalleSecundaria, Numeracion, Referencia, FormaDePago, TipoFacturacion, FechaInicio, FechaFin, EstadoPedido) VALUES"
                . "('$txtIdentificacion', '$txtNombreCliente','$txtCelular', '$txtConvencional', '$txtCorreo', '$txtSector', '$txtCallePrincipal', '$txtCalleSecundaria', '$txtNumeracion', '$txtReferencia', '$txtFormaPago','$txtTipoFacturacion','$txtFechaInicio','$date','$ESTADO')";
        return ejecutarConsulta($sql);
    }
    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM pedidos.clientes where id = '$Id'";
        return ejecutarConsultaSimple($sql);
    }
    
    function insertCalificacionHistorica($IDC) { //mostrar todos los registros
        $sql = "insert into monitoreo.calificacioneshistorico select * from monitoreo.calificaciones where id = '$IDC' ";
        return ejecutarConsulta11($sql);
    }

}

?>