<?php
//conexion a bd
include("session.php");
require 'conexion.php';

//cambiar valor en base de datos
  @$archivo=$_FILES['archivo']['name'];
  @$guardado=$_FILES['archivo']['tmp_name'];
  @$paso=$_POST['paso'];
  @$valor= $_POST['valor'];
  @$sel_materia= $_POST['materia'];
  @$user_check = $_SESSION['login_user'];

  //Insert de Profesionalización PASO 1
  if ($paso==2) {
	/*$update = "UPDATE `registro` SET `Activo`= 0 WHERE `nombre` ='$valor' ";
	$query = $mysqli->query($update)  or die ("Error en: " . mysqli_error());
	header("Location:index.php");*/
	$user_check = $_SESSION['login_user'];
	$subir ="INSERT INTO `archivos` (`id`,`matricula`,`categoria`,`opcion`,`archivo`,`id_materia`,`id_periodo`) VALUES ('',$user_check,'Profesionalizacion Docente','$valor','$archivo',0,0)";
	$result = $mysqli->query($subir);
	if ($result)      
		{
		mysqli_close ($mysqli);
		header("Location:index.php");
		} else {
		echo ("Error al guardar en Base de Datos: ". mysqli_error($mysqli));
		}
	//Insert de Evidencias de desarrollo PASO 2	
  } elseif ($paso==3) {
  	@$archivo1=$_FILES['archivo1']['name'];
  	@$guardado1=$_FILES['archivo1']['tmp_name'];
	/*$update = "UPDATE `evidencias` SET `Activo`= 0 WHERE `id` ='$valor' ";
	$query = $mysqli->query($update)  or die ("Error en: " . mysqli_error());
	header("Location:index.php");*/
	$user_check = $_SESSION['login_user'];
	$subir ="INSERT INTO `archivos` (`id`,`matricula`,`categoria`,`opcion`,`archivo`,`id_materia`,`id_periodo`) VALUES ('','$user_check','Evidencias de Desarrollo','$valor','$archivo1','$sel_materia',1)";
	$result = $mysqli->query($subir);
  	if ($result)      
		{
		mysqli_close ($mysqli);
		header("Location:index.php");
		} else {
		echo ("Error al guardar en Base de Datos: ". mysqli_error($mysqli));
		}
	//Insert de conclusiones PASO 3	
  } elseif ($paso==4) {
  	$c1=$_POST['c1']; //los input tienen el mismo nombre
  	$subir ="INSERT INTO `archivos` (`id`,`matricula`,`categoria`,`opcion`,`archivo`,`id_materia`,`id_periodo`) VALUES ('',$user_check,'Conclusiones','1','$c1','$sel_materia',1) ";
	$result = $mysqli->query($subir);
	if ($result)      
		{
		mysqli_close ($mysqli);
		header("Location:index.php");
		} else {
		echo ("Error al guardar en Base de Datos: ". mysqli_error($mysqli));
		}
  }   

    //subir archivos a carpeta files
    $permitidos = array("image/jpg", "image/jpeg", "audio/mp3","image/png","application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	$limite_kb = 29903778555;
	//si $archivo está vacío, entonces...
if($archivo==NULL){
if ($paso==3){
	if (in_array($_FILES['archivo1']['type'], $permitidos) && $_FILES['archivo1']['size'] <= $limite_kb * 1024){
	$ruta = "files/" . $_FILES['archivo1']['name'];	
	if (!file_exists($ruta)){
			 $resultado = @move_uploaded_file($_FILES["archivo1"]["tmp_name"], $ruta);
	}
    }
    }
}else {
	if ($paso==2){
	if (in_array($_FILES['archivo']['type'], $permitidos) && $_FILES['archivo']['size'] <= $limite_kb * 1024){
	$ruta = "files/" . $_FILES['archivo']['name'];
	if (!file_exists($ruta)){
			 $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
	}
    }
    }
}
?>
 