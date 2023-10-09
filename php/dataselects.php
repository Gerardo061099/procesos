<?php
/**
 * 
 */
    include('funcionesEmpleados.php');
 /**
  * Code by: Gerardo Jiménez Castillo 
  */

$datos = file_get_contents("php://input");
$result = json_decode($datos);
$selected_tipo_e = $result -> nom_tipo;

    try {
        $id_tipo = getIdTipo_e($selected_tipo_e);
        $data = mysqli_fetch_all($id_tipo,MYSQLI_ASSOC);
    } catch (Exception $e) {
        echo $e;
    }

print json_encode($data,JSON_UNESCAPED_UNICODE);
