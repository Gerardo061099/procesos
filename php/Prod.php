<?php
/**
 * 
 */
include('conexion.php');
/**
 * Codigo by: Gerardo Jimenez Castillo
 */

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$numControl = $_POST['numControl'];
$mail = $_POST['usuario'];
$pass = $_POST['pass'];
$estado = $_POST['estado'];
$role = $_POST['role'];

$pieza = $_POST['pieza'];
$aceptadas = $_POST['aceptadas'];
$concepto = $_POST['concepto'];
$cantidad = $_POST['cantidad'];

$opcion = $_POST['opcion'];

switch ($opcion) {
        //? 
    case 1:
        $query1 = "SELECT p_p_e.id AS id, e.Nombre AS nombre, e.Apellidos  AS apellidos, p.clave AS clave, p_p_e.Aceptadas AS Aceptadas, p_p_e.Rechazadas AS Rechazadas FROM $tb_piezas_produccion p_p_e INNER JOIN $tb_empleados e ON p_p_e.id_emp = e.id INNER JOIN $tb_piezas p ON p_p_e.id_pz = p.id WHERE fecha = curdate()";
        $consulta = mysqli_query($conexion, $query1);
        $data = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
        //$data = $consulta->fetch_all(MYSQLI_ASSOC);
        break;
        //? Consumos de producción
    case 2:
        $newConsumos = mysqli_query($conexion, "INSERT INTO $tb_consumos (concepto,cantidad,fecha) VALUES ('$concepto','$cantidad',now())");
        $consultarConsumos = mysqli_query($conexion, "SELECT * from $tb_consumos WHERE fecha = curdate()");
        $data = mysqli_fetch_all($consultaConsumos, MYSQLI_ASSOC);
        break;

    case 3:
        $queryConsumos = mysqli_query($conexion, "SELECT * from $tb_consumos WHERE fecha = curdate()");
        $data = mysqli_fetch_all($queryConsumos, MYSQLI_ASSOC);
        break;

    case 4:
        $editarConsumos = mysqli_query($conexion, "UPDATE $tb_consumos SET concepto = '$concepto', cantidad = '$cantidad' WHERE id = '$id'");
        $consultaConsumos = mysqli_query($conexion, "SELECT * from $tb_consumos WHERE fecha = curdate()");
        $data = mysqli_fetch_all($consultaConsumos, MYSQLI_ASSOC);
        break;

    case 5:
        $eliminarConsumos = mysqli_query($conexion, "DELETE FROM $tb_consumos WHERE id = '$id'");
        break;

    case 6:
        $queryUsers = mysqli_query($conexion, "SELECT u.id,u.Nombre,u.Apellidos,u.user,u.numero_empleado,r.nombre AS rolename,r.active AS estado,u.create_at FROM $tb_users u INNER JOIN $tb_roles r WHERE u.id_role = r.id");
        $data = mysqli_fetch_all($queryUsers, MYSQLI_ASSOC);
        break;

        //? Usuarios del sistema 7 - 10
    case 7:
        //*new user
        $pass_encrypt = password_hash($pass, PASSWORD_BCRYPT);
        $num_emp_db = mysqli_query($conexion, "SELECT numero_empleado FROM $tb_users WHERE numero_empleado = $numControl");
        if (mysqli_num_rows($num_emp_db) > 0) {
            $data = '';
        } else {
            $insert = mysqli_query($conexion, "INSERT INTO $tb_users (nombre,apellidos,user,pass,numero_empleado,create_at) VALUES ('$nombre','$apellidos','$mail','$pass_encrypt','$numControl',now())");
            $queryUsers = mysqli_query($conexion, "SELECT * FROM $tb_users");
            if (mysqli_num_rows($queryUsers) > 0) {
                $data = mysqli_fetch_all($queryUsers, MYSQLI_ASSOC);
            } else {
                $data = '';
            }
        }
        break;

    case 8:
        //todo: edit user without password
        $consulta = mysqli_query($conexion, "SELECT id_role FROM $tb_users WHERE id = $id");
        $res = mysqli_fetch_array($consulta);
        $id_role = $res['id_role'];
        $query = mysqli_query($conexion, "UPDATE $tb_users SET nombre = '$nombre', apellidos = '$apellidos', user = '$mail', numero_empleado = '$numControl', update_at = now() WHERE id = '$id'");
        if ($query == true) {
            if ($estado == 'Activo') {
                $estado_a = '1';
            } else {
                $estado_a = '0';
            }
            mysqli_query($conexion, "UPDATE $tb_roles SET nombre = '$role', active = '$estado_a', update_at = now() WHERE id = '$id_role'");
            $queryUsers = mysqli_query($conexion, "SELECT u.id,u.Nombre,u.Apellidos,u.user,u.numero_empleado,r.nombre AS rolename,r.active AS estado,u.create_at FROM $tb_users u INNER JOIN $tb_roles r WHERE u.id_role = r.id");
            $data = mysqli_fetch_all($queryUsers, MYSQLI_ASSOC);
        } else {
            $data = '';
        }
        break;

    case 9:
        //* edit user with password
        $consulta = mysqli_query($conexion, "SELECT id_role FROM $tb_users WHERE id = $id");
        $res = mysqli_fetch_array($consulta);
        $id_role = $res['id_role'];
        $pass_encrypt = password_hash($pass, PASSWORD_BCRYPT);
        $query = mysqli_query($conexion, "UPDATE $tb_users SET nombre = '$nombre', apellidos = '$apellidos', user = '$mail', pass = '$pass_encrypt', numero_empleado = '$numControl', update_at = now() WHERE id = '$id'");
        if ($query == true) {
            if ($estado == 'Activo') {
                $estado_a = '1';
            } else {
                $estado_a = '0';
            }
            mysqli_query($conexion, "UPDATE $tb_roles SET nombre = '$role', active = '$estado_a', update_at = now() WHERE id = '$id_role'");
            $queryUsers = mysqli_query($conexion, "SELECT u.id,u.Nombre,u.Apellidos,u.user,u.numero_empleado,r.nombre AS rolename,r.active AS estado,u.create_at FROM $tb_users u INNER JOIN $tb_roles r WHERE u.id_role = r.id");
            $data = mysqli_fetch_all($queryUsers, MYSQLI_ASSOC);
        } else {
            $data = '';
        }
        break;

    case 10:
        mysqli_query($conexion, "DELETE FROM $tb_users WHERE id = '$id'");
        break;

    case 11:
        $data = '';
        break;
    default:
        $data = '';
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
include('close_conexion.php');
