<?php
    include("session.php");
    include_once 'conexion.php';
    if(isset($_GET['id'])){
        $id=(int) $_GET['id'];

        $buscar_id=$mysqli->prepare('SELECT * FROM archivos WHERE id=:id LIMIT 1');
        $buscar_id->execute(array(
            ':id'=>$id
        ));
        $resultado=$buscar_id->fetch();
    }else{
        header('Location: index.php');
    }


    if(isset($_POST['guardar'])){
        $matricula=$_POST['matricula'];
        $categoria=$_POST['categoria'];
        $opcion=$_POST['opcion'];
        $archivo=$_POST['archivo'];
        $respuesta=$_POST['respuesta'];
        $id=(int) $_GET['id'];
        		if ($archivo==NULL) {
        			$update = "UPDATE archivos SET matricula='$matricula', categoria='$categoria', opcion='$opcion', archivo ='$respuesta'  WHERE id ='$id' ";
	        		$result = $mysqli->query($update);
		        	if ($result)      
					{
					mysqli_close ($mysqli);
					header("Location:reportes.php");
					} 	
        			
        		}else{
        			$update = "UPDATE archivos SET matricula='$matricula', categoria='$categoria', opcion='$opcion', archivo ='$archivo'  WHERE id ='$id' ";
	        		$result = $mysqli->query($update);
	        		if ($result)      
					{
					mysqli_close ($mysqli);
					header("Location:reportes.php");
					} 	
        		}
               
        }
    
$user_check = $_SESSION['login_user'];
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


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;" align="center">
                        <a href="index.html" class="site_title"><img src="eDocenteLogo.png" alt=""></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <?php 
                            echo "<h2>$user_check</h2>";
                             ?>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <?php 
                     include("menu.php");
                    ?>
                    <!-- /sidebar menu -->  
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <?php 
                 include("navbar.php");
                ?>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Editar</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:600px;">
                            <div class="contenedor">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="">Id</label><input class="form-control" type="text" name="id" value="<?php if($resultado) echo $resultado['id']; ?>" class="input__text" disabled>
                                        <label for="">Matrícula</label><input class="form-control" type="text" name="matricula" value="<?php if($resultado) echo $resultado['matricula']; ?>" class="input__text">
                                        <label for="">Categoría</label> <input class="form-control" type="text" name="categoria" value="<?php if($resultado) echo $resultado['categoria']; ?>" class="input__text">
                                        <label for="">Opción</label> <input class="form-control" type="text" name="opcion" value="<?php if($resultado) echo $resultado['opcion']; ?>" class="input__text">
                                   		<label for="">Archivo</label><input class="btn"  type="file" name="archivo" value="<?php if($resultado) echo $resultado['archivo']; ?>" class="input__text">
                                   		<label for="">Respuesta</label> <input class="form-control" type="text" name="respuesta" value="<?php if($resultado) echo $resultado['archivo']; ?>" class="input__text">
                                    </div>
                                    <div class="btn__group">
                                        <a href="reportes.php" class="btn btn__danger">Cancelar</a>
                                        <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer content -->
                <?php
                 include("footer.php");
                ?>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>

    <script src="js/custom.js"></script>

    <!-- moris js -->
    <script src="js/moris/raphael-min.js"></script>
    <script src="js/moris/morris.js"></script>
    <script src="js/moris/example.js"></script>

</body>

</html>