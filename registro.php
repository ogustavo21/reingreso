<?php
    include_once("session.php");
    require 'conexion.php';

    @$nombre=$_POST['nombre'];
    @$paterno=$_POST['paterno'];
    @$materno=$_POST['materno'];
    @$correo=$_POST['correo'];
    @$telefono=$_POST['telefono'];
    @$contrasena=$_POST['contrasena'];

    $query =("INSERT INTO reingreso_bd (id_reingreso, nombre, a_paterno, a_materno, correo, telefono, contrasena, fecha, estatus) VALUES '',$nombre, $paterno, $materno, $correo, $telefono, $contrasena, CURRENT_TIMESTAMP, 1");
	$result = $mysqli->query($query);
	if ($result)      
		{
		mysqli_close ($mysqli);
		header("Location:login.php");
		} else {
		echo ("Error al guardar en Base de Datos: ". mysqli_error($mysqli));
		}
?>