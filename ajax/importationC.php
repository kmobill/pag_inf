<?php

session_start();
require '../config/connection.php';
date_default_timezone_set("America/Lima");
$dateNow = date('Y-m-d H:i:s');
$date = date('Y-m-d H:i:s');
$userId = $_SESSION['usu_1'];

switch ($_GET["action"]) {
    case 'listCampaigns':
        $campaign = isset($_POST['search']) ? LimpiarCadena($_POST["search"]) : "";
        $result = ejecutarConsulta("SELECT DISTINCT CampaignId 'Id' FROM campaignresultmanagement where CampaignId like '%$campaign%' order by CampaignId");
        while ($row = mysqli_fetch_array($result)) {
            $response[] = array("value" => $row['Id'], "label" => $row['Id']);
        }
        echo json_encode($response);
        break;

    case 'bases':
        $campaign = isset($_POST['camp']) ? LimpiarCadena($_POST["camp"]) : "";
        $result = ejecutarConsulta("SELECT distinct(LastUpdate) 'LastUpdate' FROM contactimportcontact where campaign = '$campaign' order by LastUpdate");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["LastUpdate"] . '">' . $row["LastUpdate"] . '</option>';
        }
        break;

    case 'canalescomunicacion':
        if (substr($_FILES['excel']['name'], -3) === "csv") {
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 0);
            set_time_limit(0);
            $fecha = date('Y-m-d');
            $hora = time();
            $carpeta = "../documents/";
            $excel = $fecha . "_" . $hora . "_" . $_FILES['excel']['name'];
            move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");
            $row = 0; //variable que permite discriminar el encabezado del archivo csv
            $fp = fopen("$carpeta$excel", "r"); //abrir archivo
            $users = $fp; //leo el archivo que contiene los datos del producto
            $nameExcel = isset($_POST["import"]) ? LimpiarCadena($_POST["import"]) : "";
            $canal = isset($_POST["canal"]) ? LimpiarCadena($_POST["canal"]) : "";

            while (($datos = fgetcsv($users, 100000, ";")) !== FALSE) {//Leo linea por linea del archivo hasta un maximo de 1000 caracteres por linea leida usando coma(,) o (;) como delimitador
                $row++;
                if ($row > 1) {
                    $linea[] = array(//Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
                        'IDENTIFICACION' => utf8_encode($datos[0]),
                        'TELEFONO_CONTACTO' => utf8_encode($datos[1]),
                        'FECHA_CONTACTO' => utf8_encode($datos[2]),
                        'HORA_CONTACTO' => utf8_encode($datos[3]),
                        'MENSAJE' => utf8_encode($datos[4]),
                    );
                }
            }
            fclose($users); //Cierra el archivo
            $ingresado = 0; //Variable que almacenara los insert exitosos
            $error = 0; //Variable que almacenara los errores en almacenamiento
            $duplicado = 0; //Variable que almacenara los registros duplicados
            foreach ($linea as $indice => $value) { //Iteracion el array para extraer cada uno de los valores almacenados en cada items
                $canal = $canal;
                $LastUpdate = $nameExcel;
                $IDENTIFICACION = $value['IDENTIFICACION'];
                $TELEFONO_CONTACTO = $value['TELEFONO_CONTACTO'];
                $FECHA_CONTACTO = $value['FECHA_CONTACTO'];
                $HORA_CONTACTO = $value['HORA_CONTACTO'];
                $MENSAJE = $value['MENSAJE'];

                if ($insert = ejecutarConsulta("INSERT INTO canalesdecomunicacion(ImportId, TipoCanal, Tmstmp, Identificacion, ContactAddress, FechaContacto, HoraContacto, Mensaje, User) VALUES "
                        . "('$nameExcel', '$canal', '$date', '$IDENTIFICACION', '$TELEFONO_CONTACTO', '$FECHA_CONTACTO', '$HORA_CONTACTO', '$MENSAJE', '$userId')")) {
                    $msj = '<font color=green>Dato <b>' . $nameExcel . '</b> Guardado</font><br/>';
                    $ingresado += 1;
                    $query = ejecutarConsulta("SELECT ID FROM BGR.CANALESDECOMUNICACION WHERE MENSAJE = '$MENSAJE' ORDER BY ID DESC LIMIT 1");
                    $row = mysqli_fetch_array($query, MYSQLI_BOTH);
                    $idComentario = $row["ID"];
                    $result = ejecutarConsulta("SELECT ID, COMENTARIONEGATIVO, TIPOCOMENTARIO, ATRIBUTO FROM BGR.COMENTARIOS ORDER BY TIPOCOMENTARIO DESC");
                    ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP AS (select 'TIPOCOMENTARIO' as TIPOCOMENTARIO,'TIPOCOMENTARIO' as ATRIBUTO);");
                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                        $comentario = $row['COMENTARIONEGATIVO'];
                        $idPalabrasClaves = $row['ID'];
                        $query1 = ejecutarConsulta("SELECT MENSAJE, TIPOCOMENTARIO, ATRIBUTO FROM BGR.CANALESDECOMUNICACION WHERE ID = '$idComentario' AND MENSAJE LIKE '%$comentario%' ");
                        $tipoComentario = $row["TIPOCOMENTARIO"];
                        $atributo = $row["ATRIBUTO"];
                        if ($tipoComentario != '' && $atributo != '') {
                            ejecutarConsulta("INSERT INTO BGR.TMP SELECT '$tipoComentario', '$atributo'; ");
//                            echo ("INSERT INTO BGR.TMP SELECT '$tipoComentario', '$atributo'; ");
                        }
                    }
                    $data = ejecutarConsulta("SELECT TIPOCOMENTARIO, ATRIBUTO FROM BGR.TMP WHERE TIPOCOMENTARIO <> '' AND TIPOCOMENTARIO <> 'TIPOCOMENTARIO' ORDER BY TIPOCOMENTARIO  LIMIT 1;");
                    $rowData = mysqli_fetch_array($data, MYSQLI_BOTH);
                    $tipoComentarioF = $rowData["TIPOCOMENTARIO"];
                    $atributoF = $rowData["ATRIBUTO"];
                    $numRowC = $data->num_rows;
                    if ($tipoComentarioF == '' && $atributoF == '') {
                        ejecutarConsulta("UPDATE BGR.CANALESDECOMUNICACION SET TIPOCOMENTARIO = 'INDETERMINADO', ATRIBUTO = 'INDETERMINADO' WHERE ID = '$idComentario' ");
                    } else {
                        ejecutarConsulta("UPDATE BGR.CANALESDECOMUNICACION SET TIPOCOMENTARIO = '$tipoComentarioF', ATRIBUTO = '$atributoF' WHERE ID = '$idComentario' ");
                    }
                    ejecutarConsulta("DROP TABLE BGR.TMP");
                }//fin del if que comprueba que se guarden los $datos
                else {//sino ingresa el producto
                    echo $msj = '<font color=red>Dato <b>' . $nameExcel . ' </b> no almacenado' . mysqli_error() . '</font><br/>';
                    $error += 1;
                }
            }
            echo "<b>La importación $nameExcel  tiene el siguiente detalle:</b><br/>";
            echo "<font color=green>" . $ingresado . " Datos almacenados con éxito<br/>";
            echo "<font color=#F3D305>" . $duplicado . " Datos duplicados<br/>";
            echo "<font color=red>" . $error . " Errores de almacenamiento<br/>";
            $vContactDetails = ejecutarConsulta("INSERT INTO cck.contactimportdetail(VCC, ImportId, UpdateNum, "
                    . "Date, ImportUser, ValidContacts, NewContacts, UpdatedContacts, "
                    . "InvalidContacts, DuplicatesContacts) "
                    . "VALUES ('1','$LastUpdate','1','$dateNow','$userId','$ingresado','$ingresado',"
                    . "'0','$error','$duplicado')");

            $vContactImport = ejecutarConsulta("INSERT INTO cck.contactimport(VCC, ID, DBProvider,"
                    . "Updates, Status, ServiceId) "
                    . "VALUES ('1','$LastUpdate','$LastUpdate','1',"
                    . "case when $error = 0  then 'COMPLETE' else 'INCOMPLETE' end,'NULL')");
        }

        break;
        
        case 'audios':
            $nameaudio = $_FILES['excel']['name'];
            
            if ($nameaudio == 'Saludo.wav') {
                echo 'Gracias por comunicarse con la cooperativa cape. Es un placer atenderle para consulta de Saldos de Cuenta digite Uno consulta de creditos digite dos quejas y Reclamos digite tres bloqueo de tarjetas de debito digite cuatro cape en Línea digite cinco deposito a plazo fijo digite seis informacion general digite siete agencias digite ocho';
            } else {
                echo 'Recuerda que como socio pues acceder a creditos sin garantes de hasta 25000 dolares, reactiva tus suenos y planifica tu futuro con tu cooperativa cape';
            }
            
//        if (substr($_FILES['excel']['name'], -3) === "csv") {
//            ini_set('memory_limit', '-1');
//            ini_set('max_execution_time', 0);
//            set_time_limit(0);
//            $fecha = date('Y-m-d');
//            $hora = time();
//            $carpeta = "../documents/";
//            $excel = $fecha . "_" . $hora . "_" . $_FILES['excel']['name'];
//            move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");
//            $row = 0; //variable que permite discriminar el encabezado del archivo csv
//            $fp = fopen("$carpeta$excel", "r"); //abrir archivo
//            $users = $fp; //leo el archivo que contiene los datos del producto
//            $nameExcel = isset($_POST["import"]) ? LimpiarCadena($_POST["import"]) : "";
//            $canal = isset($_POST["canal"]) ? LimpiarCadena($_POST["canal"]) : "";
//
//            while (($datos = fgetcsv($users, 100000, ";")) !== FALSE) {//Leo linea por linea del archivo hasta un maximo de 1000 caracteres por linea leida usando coma(,) o (;) como delimitador
//                $row++;
//                if ($row > 1) {
//                    $linea[] = array(//Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
//                        'IDENTIFICACION' => utf8_encode($datos[0]),
//                        'TELEFONO_CONTACTO' => utf8_encode($datos[1]),
//                        'FECHA_CONTACTO' => utf8_encode($datos[2]),
//                        'HORA_CONTACTO' => utf8_encode($datos[3]),
//                        'MENSAJE' => utf8_encode($datos[4]),
//                    );
//                }
//            }
//            fclose($users); //Cierra el archivo
//            $ingresado = 0; //Variable que almacenara los insert exitosos
//            $error = 0; //Variable que almacenara los errores en almacenamiento
//            $duplicado = 0; //Variable que almacenara los registros duplicados
//            foreach ($linea as $indice => $value) { //Iteracion el array para extraer cada uno de los valores almacenados en cada items
//                $canal = $canal;
//                $LastUpdate = $nameExcel;
//                $IDENTIFICACION = $value['IDENTIFICACION'];
//                $TELEFONO_CONTACTO = $value['TELEFONO_CONTACTO'];
//                $FECHA_CONTACTO = $value['FECHA_CONTACTO'];
//                $HORA_CONTACTO = $value['HORA_CONTACTO'];
//                $MENSAJE = $value['MENSAJE'];
//
//                if ($insert = ejecutarConsulta("INSERT INTO canalesdecomunicacion(ImportId, TipoCanal, Tmstmp, Identificacion, ContactAddress, FechaContacto, HoraContacto, Mensaje, User) VALUES "
//                        . "('$nameExcel', '$canal', '$date', '$IDENTIFICACION', '$TELEFONO_CONTACTO', '$FECHA_CONTACTO', '$HORA_CONTACTO', '$MENSAJE', '$userId')")) {
//                    $msj = '<font color=green>Dato <b>' . $nameExcel . '</b> Guardado</font><br/>';
//                    $ingresado += 1;
//                    $query = ejecutarConsulta("SELECT ID FROM BGR.CANALESDECOMUNICACION WHERE MENSAJE = '$MENSAJE' ORDER BY ID DESC LIMIT 1");
//                    $row = mysqli_fetch_array($query, MYSQLI_BOTH);
//                    $idComentario = $row["ID"];
//                    $result = ejecutarConsulta("SELECT ID, COMENTARIONEGATIVO, TIPOCOMENTARIO, ATRIBUTO FROM BGR.COMENTARIOS ORDER BY TIPOCOMENTARIO DESC");
//                    ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP AS (select 'TIPOCOMENTARIO' as TIPOCOMENTARIO,'TIPOCOMENTARIO' as ATRIBUTO);");
//                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
//                        $comentario = $row['COMENTARIONEGATIVO'];
//                        $idPalabrasClaves = $row['ID'];
//                        $query1 = ejecutarConsulta("SELECT MENSAJE, TIPOCOMENTARIO, ATRIBUTO FROM BGR.CANALESDECOMUNICACION WHERE ID = '$idComentario' AND MENSAJE LIKE '%$comentario%' ");
//                        $tipoComentario = $row["TIPOCOMENTARIO"];
//                        $atributo = $row["ATRIBUTO"];
//                        if ($tipoComentario != '' && $atributo != '') {
//                            ejecutarConsulta("INSERT INTO BGR.TMP SELECT '$tipoComentario', '$atributo'; ");
////                            echo ("INSERT INTO BGR.TMP SELECT '$tipoComentario', '$atributo'; ");
//                        }
//                    }
//                    $data = ejecutarConsulta("SELECT TIPOCOMENTARIO, ATRIBUTO FROM BGR.TMP WHERE TIPOCOMENTARIO <> '' AND TIPOCOMENTARIO <> 'TIPOCOMENTARIO' ORDER BY TIPOCOMENTARIO  LIMIT 1;");
//                    $rowData = mysqli_fetch_array($data, MYSQLI_BOTH);
//                    $tipoComentarioF = $rowData["TIPOCOMENTARIO"];
//                    $atributoF = $rowData["ATRIBUTO"];
//                    $numRowC = $data->num_rows;
//                    if ($tipoComentarioF == '' && $atributoF == '') {
//                        ejecutarConsulta("UPDATE BGR.CANALESDECOMUNICACION SET TIPOCOMENTARIO = 'INDETERMINADO', ATRIBUTO = 'INDETERMINADO' WHERE ID = '$idComentario' ");
//                    } else {
//                        ejecutarConsulta("UPDATE BGR.CANALESDECOMUNICACION SET TIPOCOMENTARIO = '$tipoComentarioF', ATRIBUTO = '$atributoF' WHERE ID = '$idComentario' ");
//                    }
//                    ejecutarConsulta("DROP TABLE BGR.TMP");
//                }//fin del if que comprueba que se guarden los $datos
//                else {//sino ingresa el producto
//                    echo $msj = '<font color=red>Dato <b>' . $nameExcel . ' </b> no almacenado' . mysqli_error() . '</font><br/>';
//                    $error += 1;
//                }
//            }
//            echo "<b>La importación $nameExcel  tiene el siguiente detalle:</b><br/>";
//            echo "<font color=green>" . $ingresado . " Datos almacenados con éxito<br/>";
//            echo "<font color=#F3D305>" . $duplicado . " Datos duplicados<br/>";
//            echo "<font color=red>" . $error . " Errores de almacenamiento<br/>";
//            $vContactDetails = ejecutarConsulta("INSERT INTO cck.contactimportdetail(VCC, ImportId, UpdateNum, "
//                    . "Date, ImportUser, ValidContacts, NewContacts, UpdatedContacts, "
//                    . "InvalidContacts, DuplicatesContacts) "
//                    . "VALUES ('1','$LastUpdate','1','$dateNow','$userId','$ingresado','$ingresado',"
//                    . "'0','$error','$duplicado')");
//
//            $vContactImport = ejecutarConsulta("INSERT INTO cck.contactimport(VCC, ID, DBProvider,"
//                    . "Updates, Status, ServiceId) "
//                    . "VALUES ('1','$LastUpdate','$LastUpdate','1',"
//                    . "case when $error = 0  then 'COMPLETE' else 'INCOMPLETE' end,'NULL')");
//        }

        break;
}
?>