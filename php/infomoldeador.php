<?php
$numeroControl = $_POST[ 'numerOperador' ];
$data = array();
include( 'conexion.php' );
if ( !empty( $numeroControl ) ) {
    $query = $conexion->query( "SELECT nombre,apellidos,area FROM $tb_empleados WHERE num_empleado = $numeroControl AND area= 'Fundicion 1'" );
    if ( $query -> num_rows > 0 ) {
        $userData = $query -> fetch_assoc();
        $data[ 'status' ] = 'ok';
        $data[ 'result' ] = $userData;
    } else {
        $data[ 'status' ] = 'error';
        $data[ 'result' ] = '';
    }
    echo json_encode( $data );
} else {
    echo 'error';
}

