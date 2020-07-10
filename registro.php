<?php
   // include_once("session.php");
    require("utils/conexion.php");

    /*$query1="INSERT INTO pasos_r (id_pasos, id_reingreso,idPaso_r,estatus) VALUES ('',$id_reingreso,2,1)";
    $result = $conexion->query($query1);*/
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
      $myusername = mysqli_real_escape_string($conexion,$_POST['matricula']);
      $mypassword = sha1(mysqli_real_escape_string($conexion,$_POST['contrasena'])); 
       
      
      $sql = "SELECT * FROM reingreso_r WHERE matricula = '$myusername' and contrasena = '$mypassword'";
      $result = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$tipo = $row['tipo'];
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         echo'<script type="text/javascript">
                  alert("El usuario o contraseña ya existe");
                  </script>';
         header("location: login.php");
       
      }else {

                //////
                    $matricula=$_POST['matricula'];
                    $nombre=$_POST['nombre'];
                    $paterno=$_POST['paterno'];
                    $materno=$_POST['materno'];
                    $correo=$_POST['correo'];
                    $telefono=$_POST['telefono'];
                    $contrasena=sha1($_POST['contrasena']);

                    $url = "http://189.194.95.69:3000/personales/".$matricula;
                    $json = file_get_contents($url);
                    $obj = json_decode($json);

                    foreach ($obj as $key => $value) {
                        echo $nombreAcademica=$obj[$key]->NOMBRE;
                        echo "<br>";
                    }

                    if ($nombreAcademica==null) {
                                    echo'<script type="text/javascript">
                              alert("Tu matricula no existe en el sistema");
                              </script>';
                                header("location: login.php?error='No existe'");
                    }else{

                            $query ="INSERT INTO reingreso_r(id_reingreso, nombre, a_paterno, a_materno, correo, telefono, contrasena,  estatus, tipo, matricula) VALUES ('', '$nombre', '$paterno', '$materno', '$correo', '$telefono', '$contrasena', 1, 'Estudiante', '$matricula')";
                            $result = $conexion->query($query);

                            if ($result)      
                                {
                                    $_SESSION['matricula'] = $matricula;
                                    $_SESSION['nombre'] = $nombre;
                                    header("location: phpmailer/mail.php");

                                 


                                } else {
                                     echo'<script type="text/javascript">
                                    alert("Hubo un problema en el Registro");
                                    </script>';
                                    header("location: login.php?error='Problema al registrarse'");
                                    //echo ("Error al guardar en Base de Datos: ". mysqli_error($conexion));
                                }

                        }

                //////

                 
      }// usuario ya creado

   }//request




?>