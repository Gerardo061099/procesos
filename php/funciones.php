<?php
/**
 *  Funciones 
 */

/**
 * Codigo by: Gerardo Jimenez Castillo
 */


function consultaProduccion($date) {
    include('conexion.php');
    $query = mysqli_query($conexion,"SELECT id FROM $tb_produccion WHERE fecha_produccion = '$date'");
    return $query;
}

function consultaRem() {
  include('conexion.php');
  $consultaRem = mysqli_query($conexion,"SELECT id FROM $tb_remanente WHERE id = (SELECT MAX(id) FROM $tb_remanente)");
  return $consultaRem;
}

function ultimaProduccion() {
  include('conexion.php');
  $ultimaProduccion = mysqli_query($conexion,"SELECT fecha_produccion FROM $tb_produccion WHERE fecha_produccion = (SELECT MAX(fecha_produccion) FROM $tb_produccion)");
  return $ultimaProduccion;
}

function regRem($prod_id,$remanente_id,$desc,$peso,$area_id) {
  include('conexion.php');
  $registraRem = mysqli_query($conexion,"INSERT INTO $tb_rem_produccion (prod_id,remanente_id,area_id,descripcion,peso_kg) VALUES ($prod_id,$remanente_id,$area_id,$desc,$peso)");
  return $registraRem;
}

function remProduccion($ultimaproduccion,$remanente) {
  include('conexion.php');
  $consulta = mysqli_query($conexion,"SELECT r.nombre AS nombre, rp.peso_kg AS peso FROM $tb_rem_produccion rp INNER JOIN $tb_produccion p ON p.id = rp.prod_id INNER JOIN $tb_remanente r ON r.id = rp.remanente_id WHERE p.fecha_produccion = '$ultimaproduccion' AND r.nombre = '$remanente' AND  rp.descripcion = 'sobrante'");
  return $consulta;
}

function remUtilizado() {
  include('conexion.php');
  $queryRemU = mysqli_query($conexion,"SELECT r.nombre AS nombre,rp.descripcion AS descripcion,rp.peso_kg AS peso FROM $tb_rem_produccion rp INNER JOIN $tb_produccion p ON rp.prod_id = p.id INNER JOIN $tb_remanente r ON rp.remanente_id = r.id WHERE rp.id = (SELECT MAX(rp.id) FROM $tb_produccion)");
  return $queryRemU;
}
function searchAreaID($nameArea) {
  include('conexion.php');
  $getidarea = mysqli_query($conexion,"SELECT id FROM $tb_area WHERE nombre = '$nameArea'");
  if (mysqli_num_rows($getidarea) > 0) {
    $getresultquery = mysqli_fetch_assoc($getidarea);
    $res_id = $getresultquery['id'];
    $area_id = intval($res_id);
  }
  if (mysqli_num_rows($getidarea) < 1) {
    $area_id = 0;
  }
  return $area_id;
}
function remanenteID($nombreRemanente) {
  include('conexion.php');
  $remanenteIdquey = mysqli_query($conexion,"SELECT id FROM $tb_remanente WHERE nombre = '$nombreRemanente'");
  $resultqueryID = mysqli_fetch_assoc($remanenteIdquey);
  $remanente_id = $resultqueryID;
  return $remanente_id;
}
function addRem($data,$today_date) {

  include('conexion.php');
  $nombreRem = $data['nombre'];
  $desc = 'utilizado';
  $area = 'Fundicion 1';
  $pesoRem = $data['peso'];

  $remanente_id = remanenteID($nombreRem);
  $area_id = searchAreaID($area);
  $query_produccion = consultaProduccion($today_date);
  $query_result_p = mysqli_fetch_assoc($query_produccion);
  $prod_id = $query_result_p['id'];

  $registroRem = regRem($prod_id,$remanente_id,$desc,$pesoRem,$area_id);
  if($registroRem == true) {
    $utilizado = remUtilizado();
    $response = mysqli_fetch_assoc($utilizado);
  }
  if ($registroRem == false) {
    $response = '';
  }
  return $response;
}

function remanenteUtil($fecha_hoy,$reman_array,$last_prod) {
  include('conexion.php');
    $cantidad_rem = [];
    for ($i = 0; $i < sizeof($reman_array); $i++) { 
      $rema_name = $reman_array[$i];
      $consultaRem = mysqli_query($conexion,"SELECT r.nombre AS nombre,rp.descripcion AS descripcion,rp.peso_kg AS peso FROM $tb_rem_produccion rp INNER JOIN $tb_produccion p ON rp.prod_id = p.id INNER JOIN $tb_remanente r ON rp.remanente_id = r.id WHERE p.fecha_produccion = '$fecha_hoy' AND r.nombre = '$rema_name' AND rp.descripcion = 'utilizado'");
      if (mysqli_num_rows($consultaRem) > 0 ) {
        $result = mysqli_fetch_assoc($consultaRem);
      }
      if (mysqli_num_rows($consultaRem) < 1) {
        $responseSurplus = remProduccion($last_prod,$rema_name);
        if(mysqli_num_rows($responseSurplus) > 0 ) {
          $resultSurplus = mysqli_fetch_assoc($responseSurplus);
          $result = addRem($resultSurplus,$fecha_hoy);
        }
        if (mysqli_num_rows($responseSurplus) < 1) {
          $result['peso'] = '0';
        }
      }
      $name_rem = $result['peso'];
      array_push($cantidad_rem,$name_rem);
    }
    return $cantidad_rem;
}



?>