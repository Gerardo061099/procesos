<?php
/**
 * 
 */
include("conexion.php");
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$data = file_get_contents('php://input');
$result = json_decode($data);
$nombre = $result -> nombre;
$cantidad = $result -> cantidad;
$descripcion = $result -> descripcion;
$opcion = $result -> op;
$fecha = $result -> fecha;

$query = mysqli_query($conexion,"SELECT id FROM $tb_produccion WHERE fecha_produccion = '$fecha'");
$resultados = mysqli_fetch_assoc($query);
$produccion_id = $resultados['id'];
switch ($opcion) {
    case 1:
        $insertaMP = mysqli_query($conexion,"INSERT INTO $tb_materiaPrima (nombre,peso_kg) VALUES ('$nombre','$cantidad')");
        if ($insertaMP = true) {
            $materiaP_id = mysqli_query($conexion,"SELECT id FROM $tb_materiaPrima WHERE id = (SELECT MAX(id) FROM $tb_materiaPrima)");
            $response = mysqli_fetch_assoc($materiaP_id);
            $materiaPrima = $response['id'];
            if (mysqli_num_rows($materiaP_id) > 0) {
                mysqli_query($conexion,"INSERT INTO $tb_materiPrima_produccion (prod_id,m_p_id) VALUES ('$produccion_id','$materiaPrima')");
                echo "Insercion exitosa";
            }
        } else {
            return "Error";
        }
        break;
    case 2:
        $query = mysqli_query($conexion,"INSERT INTO $tb_remanente (nombre,descripcion,peso_kg) VALUES ('$nombre','$descripcion','$cantidad')");
        if ($query = true) {
            $remanente_id = mysqli_query($conexion,"SELECT id FROM $tb_remanente WHERE id = (SELECT MAX(id) FROM $tb_remanente)");
            $resp = mysqli_fetch_assoc($remanente_id);
            $rem_id = $resp['id'];
            if (mysqli_num_rows($remanente_id) > 0) {
                mysqli_query($conexion,"INSERT INTO $tb_rem_produccion (prod_id,remanente_id) VALUES ('$produccion_id','$rem_id')");
                echo "Insercion exitosa";
            }
        } else {
            return 'Error';
        }
        break;
    default:
        echo "Error!!!";
        break;
}

    
?>