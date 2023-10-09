 <?php
 /**
  * 
  */

  /***
   * 
   */


function AllEmpleados() {
    include('conexion.php');
    $listaEmpleados = mysqli_query($conexion,"SELECT e.id,e.nombre,e.apellidos,e.num_empleado,te.tipo_empleado AS tipo,e.status_e,a.nombre AS area FROM $tb_empleados e INNER JOIN $tb_tipoEmpleado te ON e.tipo_id = te.id INNER JOIN $tb_area a ON e.area_id = a.id");
    include('close_conexion.php');
    return $listaEmpleados;
}
function getTipo_Empleado() {
    include('conexion.php');
    $conTipo_E = mysqli_query($conexion,"SELECT id,tipo_empleado AS nombre FROM $tb_tipoEmpleado");
    include('close_conexion.php');
    return $conTipo_E;
}
function getAreatoEmpleados() {
    include('conexion.php');
    $conArea = mysqli_query($conexion,"SELECT id,nombre FROM $tb_area");
    include('close_conexion.php');
    return $conArea;
}

function addEmpleado($nombre_e,$apellidos_e,$num_e,$tipo_id,$status,$area_id) {
    include("conexion.php");
    try {
    $addEmpleado = mysqli_query($conexion,"INSERT INTO $tb_empleados (nombre,apellidos,num_empleado,tipo_id,status_e,area_id) VALUES ('$nombre_e','$apellidos_e',$num_e,$tipo_id,$status,$area_id)");
    return $addEmpleado;
    } catch (Exception $e) {
        echo $e;
    }
    include("close_conexion.php");
}

function getIdTipo_e($selected_tipo_e) {
    include('conexion.php');
    $queryTipo_e = mysqli_query($conexion,"SELECT id,tipo_empleado FROM $tb_tipoEmpleado WHERE tipo_empleado = '$selected_tipo_e'");
    include('close_conexion.php');
    return $queryTipo_e;
}

function getIdArea($selected_area) {
    include('conexion.php');
    $queryArea = mysqli_query($conexion,"SELECT id,nombre FROM $tb_area WHERE nombre = '$selected_area'");
    include('close_conexion.php');
    return $queryArea;
}

function deleteRegistro($id_e) {
    include('conexion.php');
    try {
        $delete_em = mysqli_query($conexion,"DELETE FROM $tb_empleados WHERE id = $id_e");
        return $delete_em;
    } catch (Exception $e) {
        echo $e;
    }
    include('close_conexion.php');
}