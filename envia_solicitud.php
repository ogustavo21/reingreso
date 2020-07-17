<?php
include("session.php");
include("utils/conexion.php");

$matr=$_POST['matr'];
 $sql="UPDATE `pasos_r`, reingreso_r  SET `idPaso_r`=2  where reingreso_r.id_reingreso=pasos_r.id_reingreso and reingreso_r.matricula='$matr'";
$result = $conexion->query($sql);
echo $result;
header("location: index.php");
?>