<?php

$host = 'localhost'; //'192.168.68.120';
$userdb = 'root';
$claveus = 'stacks147852369';
$nombredb = 'db_aluxsa';//'produccion_aluxsa';

$tb_materiaPrima = 'materia_prima';
$tb_materiPrima_produccion = 'materia_prima_produccion';
$tb_produccion = 'produccion';
$tb_consumos = 'consumos';
// todo: $tb_costos_consumos = 'costos_consumos';
$tb_empleados = 'empleados';
$tb_piezas = 'piezas';
$tb_area = 'area';
$tb_tipoEmpleado = 'tipo_empleado';
$tb_piezas_produccion = 'piezas_por_empleados';
$tb_remanente = 'remanente';
$tb_rem_produccion = 'remanente_produccion';
$tb_roles = 'roles';
$tb_salarios = 'salarios';
$tb_users = 'usuarios';

$conexion = mysqli_connect($host, $userdb, $claveus, $nombredb);
//printf( 'Conjunto de caracteres inicial: %s\n', $conexion->character_set_name() );
// todo: definimos utf8 como Charset en PHP //
$charset = mysqli_set_charset( $conexion, 'utf8' );
//printf( 'Conjunto de caracteres inicial: %s\n', $conexion->character_set_name() );
//En caso de haber datos erroneos del servidor
if ( mysqli_connect_errno() ) {
    echo 'Error al conectarse con el servidor'. mysqli_connect_error();
} 

?>