<?php
if ( isset( $_POST[ 'btn1' ] ) ) {
    $_SESSION[ 'sesion' ] = 0;
    //No a inisiado sesion
    $mail = $_POST[ 'user' ];
    $pwd = $_POST[ 'pwd' ];
    if ( $mail == '' || $pwd == '' ) {
        //Revisamos si algun campo está vacio
        $_SESSION[ 'sesion' ] = 2;
    } else {
        include( 'conexion.php' );
        $_SESSION[ 'sesion' ] = 3;

        $resultado = mysqli_query( $conexion, "SELECT password_user FROM $tb_users WHERE name_user = '$mail'" );
        $consulta = mysqli_fetch_array( $resultado );
        $pwd_verify = $consulta[ 'password_user' ];
        if ( password_verify( $pwd, $pwd_verify ) ) {
            $_SESSION[ 'sesion' ] = 1;
            include( 'cerrar_conexion.php' );
        }
    }
}
if ( $_SESSION[ 'sesion' ]<1 || $_SESSION[ 'sesion' ]>1 ) {
    header( 'Location:index.php' );
}

?>