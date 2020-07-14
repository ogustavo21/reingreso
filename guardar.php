<?php
//conexion a bd
include("session.php");
include("utils/conexion.php");

//cambiar valor en base de datos
  @$archivo=$_FILES['comprobante']['name'];
  @$guardado=$_FILES['comprobante']['tmp_name'];
  @$tipo= $_FILES['comprobante']['type'];
  @$ruta= $_POST['materia'];
  @$user_check = $_SESSION['login_user'];
@$fileArray = array($archivo);
	/*$update = "UPDATE `evidencias` SET `Activo`= 0 WHERE `id` ='$valor' ";
	$query = $mysqli->query($update)  or die ("Error en: " . mysqli_error());
	header("Location:index.php");*/

	//echo $_FILES['comprobante']['name'];
	$user_check = $_SESSION['login_user'];
	$subir ="INSERT INTO `archivos_r` (`id_archivos`,`archivo`,`ruta`,`tipo`,`estatus`,`id_reingreso`,`iddocu`) VALUES ('','$archivo','','$tipo',1,'$user_check',18)";
	$result = $conexion->query($subir);
  	if ($result)      
		{
		mysqli_close ($conexion);
		header("Location:index.php");
			$target = "files/";          
		$fileTarget = $target.$archivo;
		$result = move_uploaded_file($guardado,$fileTarget);
		//echo $archivo;
		} else {
		echo ("Error al guardar en Base de Datos: ". mysqli_error($conexion));
		}

  

    //subir archivos a carpeta files
    $permitidos = array("image/jpg", "image/jpeg", "audio/mp3","image/png","application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	$limite_kb = 29903778555;


	
	//si $archivo está vacío, entonces...
if($archivo==NULL) {
	if (in_array($_FILES['comprobante']['type'], $permitidos) && $_FILES['comprobante']['size'] <= $limite_kb * 1024){
	$ruta = "files/" . $_FILES['comprobante']['name'];
	if (!file_exists($ruta)){
			 $resultado = @move_uploaded_file($_FILES["comprobante"]["tmp_name"], $ruta);
	}
    }
    
}
?>
 