<?php
/**
 * 
 */
include('conexion.php');
include('funciones.php');
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$datas = file_get_contents('php://input');
$resultado = json_decode($datas);
$fechahoy = $resultado -> fechahoy;
$ultimaproduccion = $resultado -> ultimaprod;
$remanente = $resultado -> remanente;
$tags = $resultado -> opcion;

switch ($tags) {
    case 1:
        $rem_array = $remanente;
            $queryRem = remanenteUtil($fechahoy,$rem_array,$ultimaproduccion);
            //$queryRem = remProduccion($ultimaproduccion,$remanente);
            if(sizeof($queryRem) > 0) {
                //$response = addRem($datares,$fechahoy);
                $data['status'] = 'ok';
                $data['result'] = $queryRem;
            }
            if(sizeof($queryRem) < 1){
                $data['status'] = 'error';
                $data['result'] = '';
            }
        break;
    case 2:
        $consultafunc = consultaProduccion($fechahoy);
        if (mysqli_num_rows($consultafunc) < 1) {
            mysqli_query($conexion,"INSERT INTO $tb_produccion (fecha_produccion) VALUES ('$fechahoy')");
            $query = mysqli_query($conexion,"SELECT id,fecha_produccion FROM $tb_produccion WHERE fecha_produccion = '$fechahoy'");
            if (mysqli_num_rows($query) > 0) {
                $data['status'] = 'ok';
                $data['result'] = '2';
            }else { 
                $data['status'] = 'error';
                $data['result'] = '0';
            }
        }
        if (mysqli_num_rows($consultafunc) > 0) {
            $data['status'] = 'ok';
            $data['result'] = '1';
        }
        break;
    default:    
        $data['status'] = 'error';
        break;
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>