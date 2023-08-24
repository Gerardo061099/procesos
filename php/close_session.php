<?php
session_start();
session_unset();
session_destroy();

//error 4 cerro sesion exitosamente
header( 'Location: ../index.php' );
?>