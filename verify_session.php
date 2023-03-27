<?php
session_start();
include( 'php/conexion.php' );
$mail = $_POST[ 'user' ];
$pwd = $_POST[ 'pwd' ];
    $resultado = mysqli_query($conexion, "SELECT u.id AS id,r.nombre AS rolename,u.pass AS pass FROM $tb_users u INNER JOIN $tb_roles r ON u.id_role = r.id WHERE user = '$mail'");
    $consulta = mysqli_fetch_array($resultado);
    $pwd_verify = $consulta['pass'];
    if (isset($_POST['btn1'])) {
        $_SESSION['sesion'] = 0;
        //No a inisiado sesion
        if ($mail == '' || $pwd == '') {
            //Revisamos si algun campo está vacio
            $_SESSION['sesion'] = 2;
        } else {
            $_SESSION['sesion'] = 3;
            if (password_verify($pwd, $pwd_verify)) {
                $_SESSION['sesion'] = 1;
            }
        }
    }
if ( $_SESSION[ 'sesion' ]<1 || $_SESSION[ 'sesion' ]>1 ) {
    header( 'Location: index.php' );
}
if ( $_SESSION[ 'sesion' ] == 1 ) {
$_SESSION[ 'id_user' ] = $consulta[ 'id' ];
$_SESSION[ 'role' ] = $consulta[ 'rolename' ];
    header( 'Location: principal.php' );
}

?>