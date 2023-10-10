<?php
/**
 * 
 */
include('funcionestoProdution.php'); 
/**
 * code by: Gerardo Jiménez Castillo
 * mail: ger4rdojimenezc4zs@gmail.com
 */

$arreglodatos = getTotalPiezasProducidas();
if (sizeof($arreglodatos) > 0) {
    $data = $arreglodatos;
}
if (sizeof($arreglodatos) == 0 ) {
    $data =  [(object) array("Total_A" => 0,"Total_R" => 0)];
    //$data = [["Total_A" => 0,"Total_R" => 0]];
}
print json_encode($data,JSON_UNESCAPED_UNICODE);
