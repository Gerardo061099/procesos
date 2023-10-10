<?php


function totalPiezas($mes,$año){
    include('conexion.php');

    $query = mysqli_query($conexion,"SELECT SUM(aceptadas) AS total,CONCAT(YEAR(fecha),'-',MONTH(fecha)) AS Fecha FROM $tb_piezas_produccion WHERE YEAR(fecha) = '$año' AND MONTH(fecha) = '$mes'");
    
    return $query;
}