<?php
/**
 * 
 */
include('conexion.php');
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$tipoConsulta = $_POST['tipoConsulta'];
$data = array();
switch ($tipoConsulta) {
    case 1:
        $query = mysqli_query($conexion, "SELECT SUM(aceptadas) AS TotalAceptadas, SUM(rechazadas) AS TotalRechazadas FROM $tb_piezas_produccion WHERE fecha = curdate()");
        if (mysqli_num_rows($query) > 0) {
            $resulData = mysqli_fetch_assoc($query);
            $data['status'] = 'ok';
            $data['result'] = $resulData;
        } else {
            $data['status'] = 'error';
            $data['resukt'] = '';
        }

        break;

    default:
        $data['status'] = 'error';
        $data['resukt'] = '';
        break;
}
echo json_encode($data);
include('close_conexion.php');
