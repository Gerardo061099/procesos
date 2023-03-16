<?php
include( 'conexion.php' );
$id = $_POST[ 'idEmpleado' ];
$clavePieza = $_POST[ 'clavePieza' ];
$pzasAcept = $_POST[ 'pzasAcept' ];
$pzasRech = $_POST[ 'pzasRech' ];

if ( $id != '' && $clavePieza != '' && $pzasAcept != '' && $pzasRech != '' ) {
    // consultamos si la clave de la pieza ya existe, si el numero filas es mayor a 0 solo consultamos el id
    $consultaId = mysqli_query( $conexion, "SELECT id FROM $tb_piezas WHERE clave = '$clavePieza'" );
    $idUser = mysqli_query($conexion,"SELECT id FROM $tb_empleados WHERE Num_empleado = $id");
    if ( $consultaId -> num_rows > 0 && $idUser -> num_rows > 0 ) {
        $result = mysqli_fetch_array( $consultaId );
        $idPieza = $result[ 'id' ];
        $respUser = mysqli_fetch_array($idUser);
        $idempleado = $respUser['id'];
        $addProduction = mysqli_query( $conexion, "INSERT INTO $tb_pzs_x_emp (id_emp,id_pz,Aceptadas,Rechazadas) VALUES ($idempleado,$idPieza,$pzasAcept,$pzasRech)" );
        if ( $addProduction == true ) {
            //Si se insertaron los datos correctamente mandamos 1 como respuesta
            echo '1';
        } else {
            //Contrariedad si los datos no se insertaron
            echo '0';
        }
    } 

    // Si el numero de filas es igual a 0 significa que no existe la pieza, necesitamos insertarla en la BD
    if ( $consultaId -> num_rows == 0 ) {
        $newPieza = mysqli_query( $conexion, "INSERT INTO $tb_piezas (clave) VALUES ('$clavePieza')" );
        if ( $newPieza == true ) {
            $consultaId = mysqli_query( $conexion, "SELECT id FROM $tb_piezas WHERE clave = '$clavePieza'" );
            $result = mysqli_fetch_array( $consultaId );
            $idPieza = $result[ 'id' ];
            $idUser = mysqli_query($conexion,"SELECT id FROM $tb_empleados WHERE Num_empleado = $id");
            $respUser = mysqli_fetch_array($idUser);
            $idempleado = $respUser['id'];
            $addProduction = mysqli_query( $conexion, "INSERT INTO $tb_pzs_x_emp (id_emp,id_pz,Aceptadas,Rechazadas) VALUES ($idempleado,$idPieza,$pzasAcept,$pzasRech)" );
            if ( $addProduction == true ) {
                //Si se insertaron los datos correctamente mandamos 1 como respuesta
                echo '1';
            } else {
                //Contrariedad si los datos no se insertaron
                echo '0';
            } 
        }else{
            echo '0';
        }
    }
} else {
    echo 'Datos vacios';
}
?>