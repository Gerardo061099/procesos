<?php
include('conexion.php');
$id = $_POST['id'];
$role = $_POST['role'];
$opcion = $_POST['opcion'];

switch ($opcion) {
    case 1:
        $queryUsers = mysqli_query($conexion,"SELECT id,nombre,apellidos,user,numero_empleado,id_role,create_at FROM $tb_users WHERE id_role is null");
        $data = $queryUsers -> fetch_all(MYSQLI_ASSOC);
        break;
    
    case 2:
        // Verificamos si el role existe en la tabla roles
        $query1 = mysqli_query($conexion, "SELECT id,nombre FROM $tb_roles WHERE nombre = '$role'");
        $result = mysqli_fetch_array($query1);
        // Si no existe el role la condicion se cumple
        if ($result['nombre'] == '') {
            // Insertamos el nuevo role
            mysqli_query($conexion, "INSERT INTO $tb_roles (nombre,create_at) VALUES ('$role',now())");
            // Obtenemos su ID para actualizar el campo id_role en la tabla de usuarios con el registro que le corresponde
            $query2 = mysqli_query($conexion, "SELECT id FROM $tb_roles WHERE id = (SELECT MAX(id) FROM $tb_roles) AND create_at = (SELECT MAX(create_at) FROM $tb_roles)");
            $res = mysqli_fetch_array($query2);
            $id_role = $res['id'];
            if (mysqli_query($conexion, "UPDATE $tb_users SET id_role = '$id_role' WHERE id = '$id'")) {
                $queryUserWithRole = mysqli_query($conexion,"SELECT u.id,u.Nombre,u.Apellidos,u.user,u.numero_empleado,r.nombre AS rolename,r.active AS estado,u.create_at FROM $tb_users u INNER JOIN $tb_roles r WHERE u.id_role = r.id");
                $data = $queryUserWithRole -> fetch_all(MYSQLI_ASSOC);
            } else {
                $data = '';
            }
        } else {
            /**
             *  Si el role existe se verifica que este asignado a un usuario
             */
            $id_role = $result['id'];
            $queryUserRoleAsigned = mysqli_query($conexion,"SELECT id FROM $tb_users WHERE id_role = '$id_role'");
            // Si existe un usuario con ese role dejamos la var $data vacia
            if($queryUserRoleAsigned -> num_rows > 0){
                $data = '';
            }
            else {
                /**
                 *  Si no esta asignado pero si existe lo asignamos al usuario que corresponde la var $id
                 *  despues consultamos si se realizo laa actualización
                 */ 
                mysqli_query($conexion, "UPDATE $tb_users SET id_role = '$id_role' WHERE id = '$id'");
                $queryUserWithRole = mysqli_query($conexion, "SELECT u.id,u.Nombre,u.Apellidos,u.user,u.numero_empleado,r.nombre AS rolename,r.active AS estado,u.create_at FROM $tb_users u INNER JOIN $tb_roles r WHERE u.id_role = r.id");
                $data = $queryUserWithRole->fetch_all(MYSQLI_ASSOC);
            }
        }
        break;

    default:
        $data = '';
        break;
}
print json_encode($data,JSON_UNESCAPED_UNICODE);
include('close_conexion.php');

?>