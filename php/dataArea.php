<?php
/**
 * 
 */
include('funcionesEmpleados.php');
 /**
  * 
  */

  $get_area_e = getAreatoEmpleados();
  if (mysqli_num_rows($get_area_e) > 0) {
    $data = mysqli_fetch_all($get_area_e,MYSQLI_ASSOC);
  }
  print json_encode($data,JSON_UNESCAPED_UNICODE);