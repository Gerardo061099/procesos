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

function regRem($prod_id,$remanente_id) {
  include('conexion.php');
  $registraRem = mysqli_query($conexion,"INSERT INTO $tb_rem_produccion (prod_id,remanente_id) VALUES ($prod_id,$remanente_id)");
  return $registraRem;
}

function remProduccion($ultimaproduccion,$remanente) {
  include('conexion.php');
  $consulta = mysqli_query($conexion,"SELECT r.nombre AS nombre, r.peso_kg AS peso FROM $tb_rem_produccion rp INNER JOIN $tb_produccion p ON p.id = rp.prod_id INNER JOIN $tb_remanente r ON r.id = rp.remanente_id WHERE p.fecha_produccion = '$ultimaproduccion' AND r.nombre = '$remanente' AND  r.descripcion = 'sobrante'");
  return $consulta;
}

function remUtilizado() {
  include('conexion.php');
  $queryRemU = mysqli_query($conexion,"SELECT r.nombre AS nombre,r.descripcion AS descripcion,r.peso_kg AS peso FROM $tb_rem_produccion rp INNER JOIN $tb_produccion p ON rp.prod_id = p.id INNER JOIN $tb_remanente r ON rp.remanente_id = r.id WHERE rp.id = (SELECT MAX(rp.id) FROM $tb_produccion)");
  return $queryRemU;
}

function addRem($data,$today_date) {

  include('conexion.php');
  $nombreRem = $data['nombre'];
  $desc = 'utilizado';
  $pesoRem = $data['peso'];

  mysqli_query($conexion,"INSERT INTO $tb_remanente (nombre,descripcion,peso_kg) VALUES ('$nombreRem','$desc',$pesoRem)");

  $query_rem = consultaRem();
  $query_result_r = mysqli_fetch_assoc($query_rem);
  $remanente_id = $query_result_r['id'];

  $query_produccion = consultaProduccion($today_date);
  $query_result_p = mysqli_fetch_assoc($query_produccion);
  $prod_id = $query_result_p['id'];

  $registroRem = regRem($prod_id,$remanente_id);
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
      $consultaRem = mysqli_query($conexion,"SELECT r.nombre AS nombre,r.descripcion AS descripcion,r.peso_kg AS peso FROM $tb_rem_produccion rp INNER JOIN $tb_produccion p ON rp.prod_id = p.id INNER JOIN $tb_remanente r ON rp.remanente_id = r.id WHERE p.fecha_produccion = '$fecha_hoy' AND r.nombre = '$rema_name' AND r.descripcion = 'utilizado'");
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