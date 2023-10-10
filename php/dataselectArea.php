<?php
/**
 * 
 */
    include('funcionesEmpleados.php');
 /**
  * Code by: Gerardo Jiménez Castillo
  */

$datos = file_get_contents('php://input');
$result = json_decode($datos);
$selected_area = $result -> nom_area;

    try {
        $queryArea = getIdArea($selected_area);
        $data = mysqli_fetch_all($queryArea,MYSQLI_ASSOC);
    } catch (Exception $e) {
        echo $e;
    }

print json_encode($data,JSON_UNESCAPED_UNICODE);