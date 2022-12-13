<?php
include("php/conexion.php");
$id = $_POST['idmodal'];
$nombre = $_POST['nombremodal'];
$apellidos = $_POST['apellidosmodal'];
$n_control = $_POST['num_empleadomodal'];
$mail = $_POST['usuariomodal'];
$pass = $_POST['pwdmodal'];
$estado = $_POST['estadomodal'];
$role = $_POST['rolemodal'];

$consulta = mysqli_query($conexion,"SELECT id_role FROM $tb_users WHERE id = $id");
$res = mysqli_fetch_array($consulta);
$id_role = $res['id_role'];

if ($pass != "") {
    $pass_encrypt = PASSWORD_HASH($pass,PASSWORD_BCRYPT);
    mysqli_query($conexion,"UPDATE $tb_users SET nombre = '$nombre', apellidos = '$apellidos', name_user = '$mail', password_user = '$pass_encrypt', numero_empleado = '$n_control', to_update = now() WHERE id = '$id'");
    echo "1";
}else{
    echo "0";
}

?>