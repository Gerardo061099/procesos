<?php 
/**
 * 
 */

/**
 * Codigo by: Gerardo Jimenez Castillo
 */

function getAllproduction(){
    include('conexion.php');
    $producciontotal = mysqli_query($conexion,"SELECT p_p_e.id AS id,e.num_empleado AS num_empleado ,e.Nombre AS nombre, e.Apellidos  AS apellidos, p.clave AS clave, p_p_e.Aceptadas AS Aceptadas, p_p_e.Rechazadas AS Rechazadas FROM $tb_piezas_produccion p_p_e INNER JOIN $tb_empleados e ON p_p_e.id_emp = e.id INNER JOIN $tb_piezas p ON p_p_e.id_pz = p.id WHERE fecha = curdate()");
    include('close_conexion.php');
    return $producciontotal;
}
 function getAllregister(){
    include('conexion.php');
    $allreg = mysqli_query($conexion,"SELECT * FROM $tb_piezas_produccion WHERE fecha = curdate()");
    include('close_conexion.php');
    return $allreg;
 }
 function getPzaexistente($clavepieza){
    include('conexion.php');
    $query = mysqli_query($conexion,"SELECT id FROM $tb_piezas WHERE clave = '$clavepieza'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_array($query);
        $pieza_id = $result['id'];
    } else {
        $pieza_id = 0;
    }
    include('close_conexion.php');
    return (int)$pieza_id;
 }
 function addPiezas($pieza){
    include('conexion.php');
    mysqli_query($conexion,"INSERT INTO $tb_piezas (clave) VALUES ('$pieza')");
    $verifypza = getPzaexistente($pieza);
    include('close_conexion.php');
    return $verifypza;
 }
 function searchNumEmpleado($num_emp){
    include('conexion.php');
    $getNumEmpleado = mysqli_query($conexion,"SELECT id FROM $tb_empleados WHERE num_empleado = $num_emp");
    if (mysqli_num_rows($getNumEmpleado) > 0) {
        $result = mysqli_fetch_assoc($getNumEmpleado);
        $empleado_num_c = $result['id'];
    }else {
        $empleado_num_c = 0;
    }
    
    include('close_conexion.php');
    return (int)$empleado_num_c;
 }

 function addRegisterprod($id,$pieza_id,$aceptadas,$rechazadas) {
    include('conexion.php');
    mysqli_query($conexion,"INSERT INTO $tb_piezas_produccion (id_emp,id_pz,Aceptadas,Rechazadas,fecha) VALUES ($id,$pieza_id,$aceptadas,$rechazadas,now())");
    include('close_conexion.php');
 }
 // updateRegistred recibe como parametros (id_del_empleado,id_de_pieza,
 // No._piezas aceptadas,No._piezas rechazadas)
 function updateRegister($querymatriculaEmp,$pieza_id,$aceptadas,$rechazadas,$registro_id) {
    include('conexion.php');
    mysqli_query($conexion,"UPDATE $tb_piezas_produccion SET id_emp = '$querymatriculaEmp', id_pz = '$pieza_id', Aceptadas = '$aceptadas', Rechazadas = '$rechazadas' WHERE id = '$registro_id'");
    include('close_conexion.php');
 }

function getTotalPiezasProducidas() {
   include('conexion.php');
   $query = mysqli_query($conexion,"SELECT SUM(ppe.aceptadas) AS Total_A,SUM(ppe.rechazadas) AS Total_R,ppe.fecha FROM $tb_piezas_produccion ppe INNER JOIN $tb_empleados e ON ppe.id_emp = e.id INNER JOIN $tb_piezas p ON ppe.id_pz = p.id WHERE fecha = curdate() GROUP BY fecha");
   $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
   include('close_conexion.php');
   return $result;
}
