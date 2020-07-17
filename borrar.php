<?php
include("session.php");
include("utils/conexion.php");;
	$idArchivo = $_GET['idArchivo'];
	$query = "delete from archivos_r
				where id_archivos = $idArchivo";
	$borrar = $conexion->query($query);
	if (isset($_GET['compag'])) {
		header('location: /reingreso/index.php');
	} else { header('location: /reingreso/index.php'); }
?>