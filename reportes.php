<?php
include("session.php");
    include_once 'conexion.php';

    $sentencia_select=$mysqli->prepare('SELECT * FROM archivos ORDER BY id ASC');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();
    if (!$resultado) {
    }
    // metodo buscar
    if(isset($_POST['btn_buscar'])){
        $buscar_text=$_POST['buscar'];
        $select_buscar=$mysqli->prepare('
        SELECT * FROM archivos WHERE matricula LIKE :campo OR categoria LIKE :campo;'
        );

        $select_buscar->execute(array(
            ':campo' =>"%".$buscar_text."%"
        ));

        $resultado=$select_buscar->fetchAll();

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
                        <a href="index.html" class="site_title"></i> <img src="eDocenteLogo.png" alt=""></a>
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
                    <?php 
                    include("menu.php");
                    ?>
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
                            <h3>Reportes</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:800px;">
                                <div class="x_title">
                                    
                                    <div class="clearfix"></div>
                                    <div class="c_content">

                                        <div class="barra__buscador col-md-3 form-group">
                                            <form action="" class="formulario form-inline" method="post">
                                            <input class="form-control col-md-3" type="text" name="buscar" placeholder="Buscar por matrícula" value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" width="200px">
                                            <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                                            </form>
                                        </div>
                                        
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                
                                                <th>Id </th>
                                                <th>Matrícula</th>
                                                <th>Categoría</th>
                                                <th>Opción</th>
                                                <th>Archivo/Respuesta</th>
                                                <th>Materia</th>
                                                <th>Periodo</th>
                                                <td colspan="2">Acción</td>
                                                
                                            </tr>
                                        </thead>
                                        <?php foreach($resultado as $fila):?>
                                        <tr >  
                                            <td><?php echo $fila['id']; ?></td>
                                            <td><?php echo $fila['matricula']; ?></td>
                                            <td><?php echo $fila['categoria']; ?></td>
                                            <td><?php echo $fila['opcion']; ?></td>
                                            <td><?php echo $fila['archivo']; ?></td>
                                            <td><?php echo $fila['id_materia']; ?></td>
                                            <td><?php echo $fila['id_periodo']; ?></td>
                                            <td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn" >Editar</a></td>
                                            <td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn">Eliminar</a></td>
                                        </tr>
                                        <?php endforeach ?>
                                        </table>
                                    </div>
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