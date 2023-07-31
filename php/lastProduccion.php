<?php
/**
 * 
 */
include('funciones.php');
/**
 *  Codigo by: Gerardo Jimenez Castillo
 */
$fechaUltimaProd = ultimaProduccion();
if (mysqli_num_rows($fechaUltimaProd) > 0) {
    $dataresult =  mysqli_fetch_assoc($fechaUltimaProd);
    $data['status'] = 'ok';
    $data['result'] = $dataresult;
} else {
    $data['status'] = 'error';
    $data['result'] = '';
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>