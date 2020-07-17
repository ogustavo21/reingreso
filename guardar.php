<?php
//conexion a bd
include("session.php");
include("utils/conexion.php");



//////////////


					$target_dir = "files/";
					$nombreArchivo = $_FILES["inputComprobante"]["name"];
					$nombreOriginal = $nombreArchivo;
					$idRegistro = $_SESSION['login_user'];
					$iddocu = 36;
					$nombre_docu = "Comprobante de Reingreso";
					  $queryN = "select nombre, a_paterno, a_materno, id_reingreso from reingreso_r where matricula = $idRegistro";
					$buscar = $conexion->query($queryN);
						while ($n = $buscar->fetch_array()) {
							$nombre = 	$n['nombre'];
							$aPaterno = $n['a_paterno'];
							$aMaterno = $n['a_materno'];
							$idPersona = $n['id_reingreso'];
						}
					//$queryIdPersona = "select * from persona where id_registro = $idRegistro";
					//$idPersonaB = $conexion->query($queryIdPersona);
					//	while ($asd = $idPersonaB->fetch_array()) {
					//		$idPersona = $asd['id_persona'];
					//	}
					echo $nombreArchivo = $idRegistro.'_'.$nombre.'_'.$aPaterno.'_'.$aMaterno.'_'.$nombreArchivo;
					$target_dir = $target_dir . basename( $nombreArchivo);
					$uploadOk=1;
					//Verificar si ya existe el archivo
					if (file_exists($target_dir . $_FILES["inputComprobante"]["name"])) {
					    echo "Disculpa, tu archivo ya existe.";
					    $uploadOk = 0;
					}

					// Check file size
					/*if ($uploadFile_size > 500000) {
					    echo "Sorry, your file is too large.";
					    $uploadOk = 0;
							}

					// Only GIF files allowed 
					if (!($uploadFile_type == "image/gif")) {
					    echo "Sorry, only GIF files are allowed.";
					    $uploadOk = 0;
					    }*/

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    echo "Perdón, no se subió su archivo.";
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["inputComprobante"]["tmp_name"], $target_dir)) {
							if (isset($_POST['actualizar'])) {
								$queryArchivos = "UPDATE archivos_r SET ruta = '".$nombreArchivo."'
								where id_reingreso = '".$idPersona."'";

							} else {
								echo $queryArchivos = "insert into archivos_r 
									(archivo, ruta, tipo, id_reingreso, iddocu) values 
									('$nombre_docu', '$nombreArchivo', 'pago', '$idPersona', '$iddocu' )";
							}
							
									$meter = $conexion->query($queryArchivos);

									$actualizarPaso = $conexion->query("update pasos_r set idPaso_r = 8 where id_reingreso = $idPersona");


					    echo '<h1>El archivo '.$nombreOriginal.' ha sido subido exitosamente.</h1>
					    <br><br>';
					        header("location: index.php");

						} else {
					    echo "Lo sentimos, hubo un error al intentar subir su archivo.";
					    header("location: index.php");
							}
						}
				?>

 