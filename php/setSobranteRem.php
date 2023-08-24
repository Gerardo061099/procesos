<?php
/**
 *  Archivos externos
 */
include('funciones.php');
/**
 * Codigo by: Gerardo Jimenez Castillo
 */

$data = file_get_contents('php://input');
$res = json_decode($data);
$nombre = $res -> nombre;
$peso = $res -> peso;
$desc = $res -> descripcion;
$fecha = $res -> fechahoy;

function addRemanente($nombre,$peso_kg,$descripcion,$fechaprod) {
    include('conexion.php');
    $produccion_id = consultaProduccion($fechaprod);
    $res_produccion_id = mysqli_fetch_assoc($produccion_id);
    $id_prod = $res_produccion_id['id'];
    $registraRem = mysqli_query($conexion,"INSERT INTO $tb_remanente (nombre,descripcion,peso_kg) VALUES ('$nombre','$descripcion',$peso_kg)");
    if ($registraRem) {
        $remExistente = consultaRem();
        if (mysqli_num_rows($remExistente) > 0) {
            $rem_id = mysqli_fetch_assoc($remExistente);
            $id_remanente = $rem_id['id'];
            $addRem = mysqli_query($conexion,"INSERT INTO $tb_rem_produccion (prod_id,remanente_id) VALUES ($id_prod,$id_remanente)");
            if ($addRem == true) {
                $response = '1';
            }
            if ($addRem == false) {
                $response = '0';
            }
        }
        if (mysqli_num_rows($remExistente) < 1) {
            $response = '0';
        }
    }
    if (!$registraRem) {
        $response = '0';
    }
    return $response;
    //echo "Se ejecutó mi funcion. Datos recibidos: ".$nombreRem." ".$descripcion." ".$pesoRem;
}

if (isset($fecha)) {
    $resultado = addRemanente($nombre,$peso,$desc,$fecha);
    echo $resultado;
}else{
    echo '0';
}

?>