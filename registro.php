<?php
   // include_once("session.php");
    require("utils/conexion.php");

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
                        echo $carreraAca=$obj[$key]->CARRERA_ID;
                        echo "<br>";
                    }

                    if ($nombreAcademica==null) {
                                    echo'<script type="text/javascript">
                              alert("Tu matricula no existe en el sistema");
                              </script>';
                                header("location: login.php?error='No existe'");
                    }else{
                            $idcarrera=carrera($carreraAca);

                            $query ="INSERT INTO reingreso_r(id_reingreso, nombre, a_paterno, a_materno, correo, telefono, contrasena,  estatus, tipo, id_carrera, matricula) VALUES ('', '$nombre', '$paterno', '$materno', '$correo', '$telefono', '$contrasena', 1, 'Estudiante', '$idcarrera','$matricula')";
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


function carrera($idcarrera){
     $carrera=0;
 switch ($idcarrera) {
      
case 20802:
            $carrera=1;
            break;
case 20101:
            $carrera=5;
            break;
case 20203:
            $carrera=11;
            break;
case 20204:
            $carrera=11;
            break;
case 20201:
            $carrera=11;
            break;
case 20202:
            $carrera=11;
            break;
case 20301:
            $carrera=10;
            break;
case 20409:
            $carrera=20;
            break;
case 20405:
            $carrera=17;
            break;
case 20404:
            $carrera=16;
            break;
case 20403:
            $carrera=15;
            break;
case 20402:
            $carrera=19;
            break;
case 20401:
            $carrera=18;
            break;
case 20601:
            $carrera=6;
            break;
case 20901:
            $carrera=26;
            break;
case 20904:
            $carrera=26;
            break;
case 20902:
            $carrera=26;
            break;
case 20903:
            $carrera=26;
            break;
case 20905:
            $carrera=26;
            break;
case 20906:
            $carrera=26;
            break;
case 21201:
            $carrera=8;
            break;
case 21301:
            $carrera=25;
            break;
case 20215:
            $carrera=24;
            break;
case 20208:
            $carrera=13;
            break;
case 20205:
            $carrera=13;
            break;
case 20207:
            $carrera=13;
            break;
case 20206:
            $carrera=13;
            break;
case 20410:
            $carrera=12;
            break;
case 20408:
            $carrera=12;
            break;
case 20407:
            $carrera=14;
            break;
case 20406:
            $carrera=13;
            break;
case 20703:
            $carrera=4;
            break;
case 20702:
            $carrera=4;
            break;
case 20701:
            $carrera=4;
            break;
case 20704:
            $carrera=4;
            break;
case 20801:
            $carrera=2;
            break;
case 20705:
            $carrera=3;
            break;
    }
return $carrera;

}

?>