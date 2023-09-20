<?php
/**
 * 
 */
include('funcionesgraphics.php');
/**
 * By: Gerardo Jimenez Castillo
 */
$data = file_get_contents('php://input');
$decode_data = json_decode($data);

$año = $decode_data -> año;
$meses = $decode_data -> meses;

$array_meses = $meses;
$array_pzasTotalPorMes = [];

for ($i=0; $i < sizeof($array_meses); $i++) { 

    $mes = $array_meses[$i];
    $result_query = totalPiezas($mes,$año);
    
    if (mysqli_num_rows($result_query) > 0) {
        $getResult = mysqli_fetch_assoc($result_query);
    }
    if (mysqli_num_rows($result_query) < 1) {
        $getResult['total'] = 0;
    }
    $totalmes = (int) $getResult['total'];
    array_push($array_pzasTotalPorMes,$totalmes);

}
if (sizeof($array_pzasTotalPorMes) > 0) {
    $dataRes['status'] = 'ok';
    $dataRes['result'] = $array_pzasTotalPorMes;
}
if (sizeof($array_pzasTotalPorMes) == 0) {
    $dataRes['status'] = 'error';
    $dataRes['result'] = '';
}
print(json_encode($dataRes, JSON_UNESCAPED_UNICODE));
