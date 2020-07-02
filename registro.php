<?php
   // include_once("session.php");
    require("utils/conexion.php");
    $matricula=$_POST['matricula'];
    $nombre=$_POST['nombre'];
    $paterno=$_POST['paterno'];
    $materno=$_POST['materno'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $contrasena=sha1($_POST['contrasena']);

    $query ="INSERT INTO reingreso_r(id_reingreso, nombre, a_paterno, a_materno, correo, telefono, contrasena,  estatus, tipo, matricula) VALUES ('', '$nombre', '$paterno', '$materno', '$correo', '$telefono', '$contrasena', 1, 'Estudiante', '$matricula')";
	$result = $conexion->query($query);

	if ($result)      
		{
		mysqli_close ($conexion);
		header("Location:login.php");
        $query1="INSERT INTO pasos_r (id_pasos, id_reingreso,idPaso_r,estatus) VALUES ('','',2,1)";
        $result = $conexion->query($query1);
		} else {
         echo'<script type="text/javascript">
        alert("Ésta matrícula ya está registrada");
        </script>';  
		//echo ("Error al guardar en Base de Datos: ". mysqli_error($conexion));
		}

    $query1="INSERT INTO pasos_r (id_pasos, id_reingreso,idPaso_r,estatus) VALUES ('',$id_reingreso,2,1)";
    $result = $conexion->query($query1);

?>