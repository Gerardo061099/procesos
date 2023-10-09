<?php
/**
 * 
 */
include('funcionesEmpleados.php');
 /**
  * Code by: Gerardo Jimenez Castillo
  */

$get_tipo_e = getTipo_Empleado();
if (mysqli_num_rows($get_tipo_e) > 0) {
    $data = mysqli_fetch_all($get_tipo_e,MYSQLI_ASSOC);
}

print json_encode($data,JSON_UNESCAPED_UNICODE);
