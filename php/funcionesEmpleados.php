 <?php
 /**
  * 
  */

  /***
   * 
   */


function AllEmpleados(){
    include('conexion.php');
    $listaEmpleados = mysqli_query($conexion,"SELECT e.id,e.nombre,e.apellidos,e.num_empleado,te.tipo_empleado AS tipo,e.status,a.area_id AS area FROM $tb_empleados e INNER JOIN $tb_tipoEmpleado te ON e.tipo_id = te.id INNER JOIN $tb_area a ON e.area_id = a.id WHERE e.status = 1");
    return $listaEmpleados;

}