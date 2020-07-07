<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reincripciones | UNAV </title>

    <!-- Bootstrap core CSS -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/icheck/flat/green.css" rel="stylesheet">
    <!-- editor -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="../css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="../css/editor/index.css" rel="stylesheet">
    <!-- select2 -->
    <link href="../css/select/select2.min.css" rel="stylesheet">
    <!-- switchery -->
    <link rel="stylesheet" href="../css/switchery/switchery.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
    

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

                        <a href="index.html" class="site_title"> <img src="../eDocenteLogo.png" alt=""> </a>
                    </div>
                    <div class="clearfix"></div>

                        <?php
    $nivel_dir="../"; 
    include ($nivel_dir.'utils/conexion.php');
    @$user_check = $_SESSION['login_user'];
    $query = $conexion -> query("SELECT tipo FROM reingreso_r WHERE matricula=$user_check");
    $tipo_usuario = mysqli_fetch_array($query);
    $admin = array(0=>"admin","tipo"=>"admin");
    ?>

<!-- menu prile quick info -->
    <div class="profile">
        <div class="profile_pic">
            <img src="../images/picture.jpg" alt="..." class="img-circle profile_img">
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

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-check-square-o"></i> Reingreso </a>
                                </li>
                                <li id="revision" style=""><a href="revisar_adeu.php"><i class="fa fa-bar-chart"></i> Revisión de adeudo </a>
                                </li>
                                <li id="revision" style=""><a href="revisar_admision.php"><i class="fa fa-bar-chart"></i> Revisión de correo </a>
                                </li>
                                <li id="revision" style=""><a href="revisar_candado.php"><i class="fa fa-bar-chart"></i> Revisión de candado </a>
                                </li>
                                <?php 
                                if ($tipo_usuario==$admin) {
                                ?>  
                                    <li id="revision" style=""><a href="revisar_adeu.php"><i class="fa fa-bar-chart"></i> Revisión de adeudo </a>
                                    </li>  
                                     <li id="reportes" style=""><a href="reportes.php"><i class="fa fa-bar-chart"></i> Reportes </a>
                                    </li>  
                                <?php
                                } else {
                                ?>
                                <script>
                                    document.getElementById("reportes").style.display = "block";
                                </script>
                               <?php  } 
                               ?>
                                
                            </ul>
                        </div>
                     

                    </div>
                    <!-- /sidebar menu -->
                    
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                   <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i>Usuario
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            <span>Configuración</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Ayuda</a>
                                    </li>
                                    <li><a href="../outss.php"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>