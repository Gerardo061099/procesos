<?php
/**
 * 
 */
include("conexion.php");
include("funciones.php");
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
$area = $result -> area;

$query = mysqli_query($conexion,"SELECT id FROM $tb_produccion WHERE fecha_produccion = '$fecha'");
$resultados = mysqli_fetch_assoc($query);
$produccion_id = $resultados['id'];
switch ($opcion) {
    case 1:
        $materiaP_id = mysqli_query($conexion,"SELECT id FROM $tb_materiaPrima WHERE nombre = '$nombre'");
        $response = mysqli_fetch_assoc($materiaP_id);
        $materiaPrima = $response['id'];
        $area_id = searchAreaID($area);
            if (mysqli_num_rows($materiaP_id) > 0) {
                mysqli_query($conexion,"INSERT INTO $tb_materiPrima_produccion (prod_id,m_p_id,area_id,peso_kg) VALUES ($produccion_id,$materiaPrima,$area_id,$cantidad)");
                echo "Insercion exitosa";
            }
        break;
    case 2:
        $remanente_id = mysqli_query($conexion,"SELECT id FROM $tb_remanente WHERE nombre = '$nombre'");
        $resp = mysqli_fetch_assoc($remanente_id);
        $rem_id = $resp['id'];
        $area_id = searchAreaID($area);
            if (mysqli_num_rows($remanente_id) > 0) {
                mysqli_query($conexion,"INSERT INTO $tb_rem_produccion (prod_id,remanente_id,area_id,descripcion,peso_kg) VALUES ($produccion_id,$rem_id,$area_id,'$descripcion',$cantidad)");
                echo "Insercion exitosa";
            }
        break;
    default:
        echo "Error!!!";
        break;
}

    
?>