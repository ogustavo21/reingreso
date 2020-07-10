<?php
    require("utils/conexion.php");
    session_start();
      $token=$_GET['token'];
      $sql = "SELECT * FROM reingreso_r WHERE token = $token ";
      $result = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $id_reingreso = $row['id_reingreso'];
      $count = mysqli_num_rows($result);
       if($count == 1) {
                      $query1="INSERT INTO pasos_r (id_pasos, id_reingreso,idPaso_r,estatus) VALUES ('',$id_reingreso,2,1)";
                      $result = $conexion->query($query1);
        $msg="Tu registro se completo exitosamente";
       
      }else {
        $msg="Hubo una error en la validación";

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

    <title>Reinscripciones | UNAV </title>

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
                        <h1><?php echo $msg?></h1>
                        
                        <div class="clearfix"></div>
                         <a href="/reingreso/login.php" class="to_register"> LOGIN </a>
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
           
        </div>
    </div>

</body>

</html>