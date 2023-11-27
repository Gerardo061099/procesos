<?php 
/**
 * 
 */
include('conexion.php');
include('funcionestoProdution.php');
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$opcion = $_POST['opcion'];
$registro_id = $_POST['registro_id'];
$id_delete = $_POST['id_delete'];
$id_emp = $_POST['id'];
$numero_empleado = $_POST['num_control'];
$pieza = $_POST['pieza'];
$aceptadas = $_POST['aceptadas'];
$rechazadas = $_POST['rechazadas'];
switch ($opcion) {
    case 1:
        $consulta = getAllproduction();
        $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
        break;
    case 2:
        $pieza_id = getPzaexistente($pieza);
        if ($pieza_id != 0) {
            addRegisterprod($id_emp,$pieza_id,$aceptadas,$rechazadas);
            $consulta = getAllregister();
            if (mysqli_num_rows($consulta) > 0) {
                $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
            } else {
                $data = '';
            }
        } 
        if ($pieza_id == 0) {
            $pieza_id = addPiezas($pieza);
            if ($pieza_id != '') {
                addRegisterprod($id_emp,$pieza_id,$aceptadas,$rechazadas);
                $consulta = getAllregister();
                if (mysqli_num_rows($consulta) > 0) {
                    $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                } else {
                    $data = '';
                }
            }
        }
        break;
    case 3: 
        mysqli_query($conexion,"DELETE FROM $tb_piezas_produccion WHERE id = $id_delete");
        break;
    case 4:
        $pieza_id = getPzaexistente($pieza);
        $querymatriculaEmp = searchNumEmpleado($numero_empleado);
        if ($pieza_id != 0) {
            updateRegister($querymatriculaEmp,$pieza_id,$aceptadas,$rechazadas,$registro_id);
            $consulta = getAllregister();
                if (mysqli_num_rows($consulta) > 0) {
                    $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                } else {
                    $data = '';
                }
        }
        if ($pieza_id == 0) {
            $pieza_id = addPiezas($pieza);
            if ($pieza_id != '') {
                updateRegister($querymatriculaEmp,$pieza_id,$aceptadas,$rechazadas,$registro_id);
                $consulta = getAllregister();
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