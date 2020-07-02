
<?php
// esto es el index
include("session.php");
include("utils\conexion.php");

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

    <title>Gentallela Alela! | </title>

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

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                     <?php 
                    include("menu.php");
                    ?>
                    
                </div>
            </div>
            <!-- /sidebar menu -->

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
                            <h3>Revisión de candado</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:600px;">
                            <div class="contenedor">
                                <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                
                                                <th>Id </th>
                                                <th>Matrícula</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th></th>
                                                <th>Correo</th>
                                                <td colspan="2">Acción</td>
                                                
                                            </tr>
                                        </thead>
                                       <?php

                                        $query="SELECT * FROM reingreso_r WHERE (SELECT id_reingreso FROM pasos_r WHERE idPaso_r=5)";
                                       // $resultado = $conexion->query($query);
                                        $result=mysqli_query($conexion,$query);

                                        while($fila=mysqli_fetch_array($result)){

                                        
                                       ?>
                                        <tr >  
                                            <td><?php echo $fila['id_reingreso']; ?></td>
                                            <td><?php echo $fila['matricula']; ?></td>
                                            <td><?php echo $fila['nombre']; ?></td>
                                            <td><?php echo $fila['a_paterno']; ?></td>
                                            <td><?php echo $fila['a_materno']; ?></td>
                                            <td><?php echo $fila['correo']; ?></td>
                                            <td><a href="confirm_cand.php?id=<?php echo $fila['id']; ?>"  class="btn" >Confirmar</a></td>
                                        </tr>
                                       <?php
                                       }
                                       ?>
                                        </table>
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