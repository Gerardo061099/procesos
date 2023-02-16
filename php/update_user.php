<?php
include("conexion.php");
$id = $_POST['idmodal'];
$nombre = $_POST['nombremodal'];
$apellidos = $_POST['apellidosmodal'];
$n_control = $_POST['num_empleadomodal'];
$mail = $_POST['usuariomodal'];
$pass = $_POST['pwdmodal'];
$estado = $_POST['estadomodal'];
$role = $_POST['rolemodal'];
//consulta id_role
$consulta = mysqli_query($conexion,"SELECT id_role FROM $tb_users WHERE id = $id");
$res = mysqli_fetch_array($consulta);
$id_role = $res['id_role'];
if ($pass != "") {
    $pass_encrypt = PASSWORD_HASH($pass,PASSWORD_BCRYPT);
    $query = mysqli_query($conexion,"UPDATE $tb_users SET nombre = '$nombre', apellidos = '$apellidos', name_user = '$mail', password_user = '$pass_encrypt', numero_empleado = '$n_control', to_update = now() WHERE id = '$id'");
    if($query == true){
        if ($estado == "Activo") {
            $estado_a = "1";
        }else {
            $estado_a = "0";
        }
        mysqli_query($conexion,"UPDATE $tb_roles SET nombre = '$role', active = '$estado_a',update_at = now() WHERE id = '$id_role'");
        echo "1";
    }else{
        echo "0";
    }
}else{
    $query = mysqli_query($conexion,"UPDATE $tb_users SET nombre = '$nombre', apellidos = '$apellidos', name_user = '$mail', numero_empleado = '$n_control', to_update = now() WHERE id = '$id'");
    if($query == true){
        if ($estado == "Activo") {
            $estado_a = "1";
        }else {
            $estado_a = "0";
        }
        mysqli_query($conexion,"UPDATE $tb_roles SET nombre = '$role', active = '$estado_a',update_at = now() WHERE id = '$id_role'");
        echo "1";
    }else{
        echo "0";
    }
    echo "0";
}
include('close_conexion.php');
?>