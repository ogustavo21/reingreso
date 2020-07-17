<?php
include("session.php");
include("utils/conexion.php");

$matr=$_SESSION['login_user'];
$sql="UPDATE `pasos_r` SET `idPaso_r`=2 INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr'";
$result = $conexion->query($sql);
echo $result;
header("location: index.php");
?>