<?php
$host = '192.168.1.78';

$userdb = 'stacks';
$claveus = 'stacks147852369';
$nombredb = 'produccion_aluxsa';

$tb_aluminio_utilizado = 'aluminio_utilizado';
$tb_consumos = 'consumos';
$tb_costos_consumos = 'costos_consumos';
$tb_empleados = 'empleados';
$tb_perdidas = 'perdidas';
$tb_piezas = 'piezas';
$tb_pzs_x_emp = 'piezas_por_empleados';
$tb_placa_util = 'placa_utilizada';
$tb_remanente = 'remanente';
$tb_resumen_f1 = 'resumen_f1';
$tb_res_consumos = 'resumen_produccion';
$tb_roles = 'roles';
$tb_salarios = 'salarios';
$tb_total_p = 'total_produccion';
$tb_users = 'usuarios';
$conexion = mysqli_connect( $host, $userdb, $claveus, $nombredb );
//printf( 'Conjunto de caracteres inicial: %s\n', $conexion->character_set_name() );
// todo: definimos utf8 como Charset en PHP //
$charset = mysqli_set_charset( $conexion, 'utf8' );
//printf( 'Conjunto de caracteres inicial: %s\n', $conexion->character_set_name() );
//En caso de haber datos erroneos del servidor
if ( $conexion->connect_errno ) {
    echo '<h1>Error en la conexion del servidor</h1>';
}
?>