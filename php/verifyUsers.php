<?php
/**
 * 
 */
include( 'conexion.php' );
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$mail = $_POST[ 'mail' ];
$password = $_POST[ 'password' ];

if ( $mail != '' && $password != '' ) {
    $resultado = mysqli_query( $conexion, "SELECT password_user FROM $tb_users WHERE name_user = '$mail'" );
    $consulta = mysqli_fetch_array( $resultado );
    $pwd_verify = $consulta[ 'password_user' ];
    if ( password_verify( $password, $pwd_verify ) ) {
        $password_encrypt = PASSWORD_HASH( $password, PASSWORD_BCRYPT );
        $query = mysqli_query( $conexion, "SELECT name_user FROM $tb_users WHERE name_user = '$mail'" );
        $result = mysqli_fetch_array( $query );
        $usuario = $result[ 'name_user' ];
        echo $usuario;
    } else {
        echo '0';
    }
} else {
    echo '0';
}
?>
