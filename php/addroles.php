<?php
$role = $_POST['role'];
$id_user = $_POST['id_user'];
$operacion = $_POST['operacion'];
include("conexion.php");
        $query1 = mysqli_query($conexion,"SELECT nombre FROM $tb_roles WHERE nombre = '$role'");
        $result = mysqli_fetch_array($query1);
        $nombre = $result['nombre'];
        if ($nombre == "") {
            mysqli_query($conexion,"INSERT INTO $tb_roles (nombre,create_at) VALUES ('$role',now())");
            $query2 = mysqli_query($conexion,"SELECT id FROM $tb_roles WHERE id = (SELECT MAX(id) FROM $tb_roles) AND create_at = (SELECT MAX(create_at) FROM $tb_roles)");
            $res = mysqli_fetch_array($query2);
            $id = $res['id'];
            if (mysqli_query($conexion,"UPDATE $tb_users SET id_role = '$id' WHERE id = '$id_user'")) {
                echo "Role asignado";
            } else {
                echo "Role no asignado";
            }
        }
        else{
            echo "El role ya existe";
        }
?>