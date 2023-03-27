<?php
include( 'conexion.php' );
$nombre = $_POST[ 'nombre' ];
$apellidos = $_POST[ 'apellidos' ];
$n_control = $_POST[ 'numero_control' ];
$user = $_POST[ 'user' ];
$pass = $_POST[ 'pass' ];
$pass_encrypt = PASSWORD_HASH( $pass, PASSWORD_BCRYPT );
$query = mysqli_query( $conexion, "INSERT INTO $tb_users  (nombre,apellidos,user,pass,numero_empleado,create_at) values ('$nombre','$apellidos','$user','$pass_encrypt','$n_control',now())" );
if ( $query == true ) {
    echo '1';
} else {

    echo '0';
}
include( 'close_conexion.php' );
?>