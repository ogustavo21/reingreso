<?php
//include("conexion.php");
//conexion a la base de datos
include("utils/conexion.php");

session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conexion,$_POST['matricula']);
      $mypassword = sha1(mysqli_real_escape_string($conexion,$_POST['password'])); 
      
     echo  $sql = "SELECT matricula FROM reingreso_r WHERE correo = '$myusername' and contrasena = '$mypassword'";
      $result = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: index.php");
      }else {
         $error = "El usuario o contreseña es inválido";
      }
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portafolio Docente | </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                	<!--login form-->
                    <form method="POST" action="#">
                        <h1>Iniciar Sesión</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Matrícula" name="matricula" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required="" />
                        </div>
                        <div>
                            <input type="submit" value="Entrar">
                              <a href="#toregister" class="to_register"> Regístrate </a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h4> Universidad de Navojoa</h4>

                                <p>©2020 Todos los derechos reservados.Universidad de Navojoa. Depto. de Sistemas y Tecnología.</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    <form method="POST" action="registro.php">
                        <h1>Registro</h1>
                         <div>
                            <input name="matricula" type="text" class="form-control" placeholder="Matrícula" required="" />
                        </div>
                        <div>
                            <input name="nombre" type="text" class="form-control" placeholder="Nombre(s)" required="" />
                        </div>
                        <div>
                            <input name="paterno" type="text" class="form-control" placeholder="Apellido Paterno" required="" />
                        </div>
                        <div>
                            <input name="materno" type="text" class="form-control" placeholder="Apellido Materno" required="" />
                        </div>
                         <div>
                            <input name="telefono" type="text" class="form-control" placeholder="Teléfono" required="" />
                        </div>
                         <div>
                            <input name="correo" type="email" class="form-control" placeholder="Correo" required="" />
                        </div>
                         <div>
                            <input name="contrasena" type="password" class="form-control" placeholder="Contraseña" required="" />
                        </div>
                        <div>
                          <input type="submit" class="form-control" value="Registrarse" />
                            <a class="btn btn-default submit" href="registro.php">Registrarse</a>
                            <br><br><a href="#tologin" class="to_register"> Entrar </a>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>