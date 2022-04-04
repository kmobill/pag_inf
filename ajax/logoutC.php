<?php

require '../config/connection.php';
session_start();
date_default_timezone_set("America/Lima");
$_SESSION['usu_1'];
$_SESSION['name_1'];
$_SESSION['state_1'];
$enddate = date('Y-m-d H:i:s');
$_SESSION['workgroup_1'];
$_SESSION['idSession_1'];

$deleteSession = ejecutarConsulta("DELETE FROM session WHERE "
//        . "SessionId = '$_SESSION[idSession]' and "
        . "Usuario = '$_SESSION[usu_1]' ");

// -- eliminamos la sesión del usuario
if (isset($_SESSION['usu_1'])) {
    unset($_SESSION['usu_1']);
    unset($_SESSION['name_1']);
    unset($_SESSION['state_1']);
    unset($_SESSION['workgroup_1']);
    unset($_SESSION['idSession_1']);
}
if(isset($_SESSION['usu_1']) == false){
    session_regenerate_id();
}
session_destroy();
header('location: ../views/login.php');
exit();
?>
