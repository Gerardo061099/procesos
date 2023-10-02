<?php
include('conexion.php');
include('funcionesEmpleados.php');
$datas = file_get_contents('php://input');
$result = json_decode($datas);
$operacion = $result -> opcion;

switch ($operacion) {
    case 1:
        $resultquery = AllEmpleados();
        $data = mysqli_fetch_all($resultquery,MYSQLI_ASSOC); 
        break;

    default: 
        $data = '';
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
include('close_conexion.php');
?>