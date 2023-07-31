<?php 
/**
 * 
 */
include('conexion.php');
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$opcion = $_POST['opcion'];
$resgitro_id = $_POST['registro_id'];
$id = $_POST['id'];
$pieza = $_POST['pieza'];
$aceptadas = $_POST['aceptadas'];
$rechazadas = $_POST['rechazadas'];
switch ($opcion) {
    case 1:
        $query1 = "SELECT p_p_e.id AS id,e.num_empleado AS num_empleado ,e.Nombre AS nombre, e.Apellidos  AS apellidos, p.clave AS clave, p_p_e.Aceptadas AS Aceptadas, p_p_e.Rechazadas AS Rechazadas FROM $tb_piezas_produccion p_p_e INNER JOIN $tb_empleados e ON p_p_e.id_emp = e.id INNER JOIN $tb_piezas p ON p_p_e.id_pz = p.id WHERE fecha = curdate()";
        $consulta = mysqli_query($conexion, $query1);
        $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
        break;
    case 2:
        $query = mysqli_query($conexion,"SELECT id FROM $tb_piezas WHERE clave = '$pieza'");
        $result = mysqli_fetch_array($query);
        $pieza_id = $result['id'];
        if ($pieza_id != '') {
            mysqli_query($conexion,"INSERT INTO $tb_piezas_produccion (id_emp,id_pz,Aceptadas,Rechazadas,fecha) VALUES ('$id','$pieza_id','$aceptadas','$rechazadas',now())");
            $consulta = mysqli_query($conexion,"SELECT * FROM $tb_piezas_produccion WHERE fecha = curdate()");
            if (mysqli_num_rows($consulta) > 0) {
                $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
            } else {
                $data = '';
            }
        } 
        if ($pieza_id == '') {
            mysqli_query($conexion,"INSERT INTO $tb_piezas (clave) VALUES ('$pieza')");
            $query = mysqli_query($conexion,"SELECT id FROM $tb_piezas WHERE clave = '$pieza'");
            $result = mysqli_fetch_array($query);
            $pieza_id = $result['id'];
            if ($pieza_id != '') {
                mysqli_query($conexion,"INSERT INTO $tb_piezas_produccion (id_emp,id_pz,Aceptadas,Rechazadas,fecha) VALUES ('$id','$pieza_id','$aceptadas','$rechazadas',now())");
                $consulta = mysqli_query($conexion,"SELECT * FROM $tb_piezas_produccion WHERE fecha = curdate()");
                if (mysqli_num_rows($consulta) > 0) {
                    $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                } else {
                    $data = '';
                }
            }
        }
        break;
    case 3: 
        mysqli_query($conexion,"DELETE FROM $tb_piezas_produccion WHERE id = '$id'");
        break;

    case 4:
        $query = mysqli_query($conexion,"SELECT id FROM $tb_piezas WHERE clave = '$pieza'");
        $result = mysqli_fetch_array($query);
        $pieza_id = $result['id'];
        if ($pieza_id != '') {
            mysqli_query($conexion,"UPDATE $tb_piezas_produccion SET id_emp = '$id', id_pz = '$pieza_id', Aceptadas = '$aceptadas', Rechazadas = '$rechazadas' WHERE id = '$resgitro_id'");
            $consulta = mysqli_query($conexion,"SELECT * FROM $tb_piezas_produccion WHERE fecha = curdate()");
                if (mysqli_num_rows($consulta) > 0) {
                    $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                } else {
                    $data = '';
                }
        }
        if ($pieza_id == '') {
            mysqli_query($conexion,"INSERT INTO $tb_piezas (clave) VALUES ('$pieza')");
            $query = mysqli_query($conexion,"SELECT id FROM $tb_piezas WHERE clave = '$pieza'");
            $result = mysqli_fetch_array($query);
            $pieza_id = $result['id'];
            if ($pieza_id != '') {
                mysqli_query($conexion,"UPDATE $tb_piezas_produccion SET id_emp = '$id', id_pz = '$pieza_id', Aceptadas = '$aceptadas', Rechazadas = '$rechazadas' WHERE id = '$resgitro_id'");
                $consulta = mysqli_query($conexion,"SELECT * FROM $tb_piezas_produccion WHERE fecha = curdate()");
                if (mysqli_num_rows($consulta) > 0) {
                    $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                } else {
                    $data = '';
                }
            }
        }
        break;

    default:
        $data = '';
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
include('close_conexion.php');

?>