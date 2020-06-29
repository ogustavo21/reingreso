<?php
// esto es el index
 $conexion = mysqli_connect ("localhost","root", "", "admisiones_bd");
  $conexion->set_charset('utf8');
if ($conexion -> connect_errno)
{
    die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}


?>