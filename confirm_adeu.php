<?php
include("session.php");
include("utils\conexion.php");
$id_reingreso=$_GET=["id"];
$query="UPDATE pasos_r SET `idPaso_r`=4 WHERE `id_reingreso`='$id_reingreso'";
$result = $conexion->query($query);

?>