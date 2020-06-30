<?php 
include("../utils/conexion.php");

$id=$_REQUEST['id'];
$pasoguardar=$_REQUEST['pasoguardar'];


	$query ="UPDATE pasos_r SET `idPaso_r` = '$pasoguardar' WHERE id_reingreso = $id";
	$result = $conexion->query($query);
	if ($result)      
		{
		echo "Se actualizo correctamente"; 
		} else {
		echo ("Error al guardar en Base de Datos: ". mysqli_error($conexion));
		}
        
?>