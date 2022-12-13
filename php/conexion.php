<?php
$host = "localhost";        
$userdb = "stacks";
$claveus = "stacks147852369";
$nombredb = "produccion_f1";

$tb_users = "usuarios";
$tb_alum = "aluminio_utilizado";
$tb_con = "consumos";
$tb_emp = "empleados";
$tb_pizs = "piezas";
$tb_pzs_x_emp = "piezas_por_empleados";
$tb_placa_util = "placa_utilizada";
$tb_rem = "remanente1";
$tb_res_consumos ="resumen_consumos";
$tb_res_f1 = "resumen_f1";
$tb_res_produc = "resumen_produccion";
$tb_roles = "role";
$tb_total_p = "total_produccion";
$conexion = mysqli_connect($host,$userdb,$claveus,$nombredb);
//printf("Conjunto de caracteres inicial: %s\n", $conexion->character_set_name());
// todo: definimos utf8 como Charset en PHP //
$charset = mysqli_set_charset($conexion, "utf8");
//printf("Conjunto de caracteres inicial: %s\n", $conexion->character_set_name());
//En caso de haber datos erroneos del servidor
if ($conexion->connect_errno) {
    echo "Problemas de conexion con el servidor...";
} 