<?php
/**
 * 
*/
include('funcionesEmpleados.php');
/**
 * Code by: Gerardo Jimenez Castillo
 */
$datos = file_get_contents('php://input');
$result = json_decode($datos);
$operacion = $result -> opcion;
$nombre = $result -> nombre;
$apellidos = $result -> apellidos;
$num_e = $result -> num_e;
$area = $result -> area_e;
$tipo_e = $result -> tipo_t;
$registro_id = $result -> registro_id;
$status_e = $result -> status_e;
$delete_id = $result -> id_delete;

switch ($operacion) {
    case 1:
        $resultquery = AllEmpleados();
        $data = mysqli_fetch_all($resultquery,MYSQLI_ASSOC); 
        break;
    case 2:
        $resultadd_e = addEmpleado($nombre,$apellidos,$num_e,$tipo_e,$status_e,$area);
        if ($resultadd_e == true) {
            //$result = AllEmpleados();
            $data = '1';//mysqli_fetch_all($result,MYSQLI_ASSOC);
        } 
        if ($resultadd_e == null) {
            $data = '0';
        }
        break;
    case 3:


        break;
    case 4:
        $result_delete = deleteRegistro($delete_id);
        if ($result_delete == true) {
            $data = "1";
        } 
        if ($result_delete == null){
            $data = "0";
        }
        break;
    default: 
        $data = '';
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
?>