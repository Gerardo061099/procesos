<?php
/**
 * 
 */
include('conexion.php');
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$datas = file_get_contents('php://input');
$result = json_decode($datas);
$matricula = $result -> numerOperador;
$data = array();
$query = mysqli_query($conexion, "SELECT e.id AS id,e.nombre AS nombre,e.apellidos AS apellidos,a.nombre AS area FROM $tb_empleados e INNER JOIN $tb_area a ON e.area_id = a.id WHERE e.num_empleado = $matricula AND a.nombre = 'Fundicion 1'");
if (mysqli_num_rows($query) > 0) {
    $userData = mysqli_fetch_assoc($query);
    $data['status'] = 'ok';
    $data['result'] = $userData;
} else {
    $data['status'] = 'error';
    $data['result'] = '';
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
/**
 * $query -> num_rows
 * $query -> fetch_assoc()
 */
