<?php

session_start();
require '../config/connection.php';
date_default_timezone_set("America/Lima");
$date = date('Y-m-d H:i:s');
$userId = $_SESSION['usu_1'];

switch ($_GET["action"]) {
    case 'opcional':
        $result = ejecutarConsulta("SELECT CASE WHEN ATRIBUTO = '' THEN 'INDETERMINADO' ELSE ATRIBUTO END AS ATRIBUTO, COUNT(CASE WHEN ATRIBUTO = '' THEN 'INDETERMINADO' ELSE ATRIBUTO END) AS NUMERO FROM bgr.canalesdecomunicacion GROUP BY CASE WHEN ATRIBUTO = '' THEN 'INDETERMINADO' ELSE ATRIBUTO END ORDER BY ATRIBUTO");
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '{name:\'' . $row["ATRIBUTO"] . '\', y:' . $row["NUMERO"] . '},';
        }
        break;

    case 'tipoComentario':
        $result = ejecutarConsulta("SELECT CASE WHEN TIPOCOMENTARIO = '' THEN 'INDETERMINADO' ELSE TIPOCOMENTARIO END AS TIPOCOMENTARIO, COUNT(CASE WHEN TIPOCOMENTARIO = '' THEN 'INDETERMINADO' ELSE TIPOCOMENTARIO END)AS NUMERO FROM bgr.canalesdecomunicacion GROUP BY CASE WHEN TIPOCOMENTARIO = '' THEN 'INDETERMINADO' ELSE TIPOCOMENTARIO END ORDER BY TIPOCOMENTARIO DESC");
        while ($row = mysqli_fetch_array($result)) {
            $response[] = array("value" => $row['NUMERO'], "label" => $row['TIPOCOMENTARIO']);
        }
        echo json_encode($response);
        break;

    case 'tipoComentarioAnio':
        $result = ejecutarConsulta("SELECT 
                                        DATE_FORMAT(FECHACONTACTO,'%Y') AS ANIO,
                                        IFNULL((SELECT COUNT(TIPOCOMENTARIO) FROM BGR.CANALESDECOMUNICACION C WHERE C.TIPOCOMENTARIO = C1.TIPOCOMENTARIO AND C.TIPOCOMENTARIO = 'POSITIVO'),0) AS POSITIVO,
                                        IFNULL((SELECT COUNT(TIPOCOMENTARIO) FROM BGR.CANALESDECOMUNICACION C WHERE C.TIPOCOMENTARIO = C1.TIPOCOMENTARIO AND C.TIPOCOMENTARIO = 'NEGATIVO'),0) AS NEGATIVO,
                                        IFNULL((SELECT COUNT(TIPOCOMENTARIO) FROM BGR.CANALESDECOMUNICACION C WHERE C.TIPOCOMENTARIO = C1.TIPOCOMENTARIO AND C.TIPOCOMENTARIO = 'NEUTRO'),0) AS NEUTRO
                                FROM bgr.canalesdecomunicacion C1
                                WHERE TIPOCOMENTARIO <> '' AND TIPOCOMENTARIO <> 'INDETERMINADO'
                                ORDER BY FECHACONTACTO DESC");
        while ($row = mysqli_fetch_array($result)) {
            $response[] = array("y" => $row['ANIO'], "a" => $row['POSITIVO'], "b" => $row['NEGATIVO'], "c" => $row['NEUTRO']);
        }
        echo json_encode($response);
        break;

    case 'atributos':
        $result = ejecutarConsulta("SELECT ATRIBUTO, COUNT(ATRIBUTO) AS NUMERO FROM bgr.canalesdecomunicacion GROUP BY ATRIBUTO ORDER BY ATRIBUTO");
        while ($row = mysqli_fetch_array($result)) {
            $response[] = array('name' => $row['ATRIBUTO'], 'y' => intval($row['NUMERO']), 'drilldown' => $row['ATRIBUTO']);
        }
        echo json_encode($response);
        break;
}