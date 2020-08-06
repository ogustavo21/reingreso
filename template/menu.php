    <?php

   $tipo_usuario = $_SESSION['tipo'];
    $user_check = $_SESSION['login_user'];
    ?>


<div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;" align="center">

                        <a href="#" class="site_title"> <img src="/reingreso/template/logoadmisiones.png" alt=""> </a>
                    </div>
                    <div class="clearfix"></div>


<!-- menu prile quick info -->
    <div class="profile">
        <div class="profile_pic">
            <img src="/reingreso/images/user.png" alt="..." class="img-circle profile_img">
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
                                
                                <?php 
                                
                                if ($tipo_usuario=="Estudiante") {
                                ?>  
                                    <li id="reportes" style=""><a href="/reingreso/index.php"><i class="fa fa-bar-chart"></i> Reinscripcion </a>
                                    </li>  
                                    <li><a><i class="fa fa-table"></i> Estadística <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="/reingreso/adminpage/reportes.php">Reporte</a>
                                        </li>
                                        <li><a href="/reingreso/adminpage/grafica.php">Gráfica</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                } else {
                                ?>
                                 <li id="revision" style=""><a href="/reingreso/adminpage/consola.php"><i class="fa fa-bar-chart"></i> Panel de control </a>
                                    </li>  
                                    <li id="revision" style=""><a href="/reingreso/adminpage/listado.php"><i class="fa fa-bar-chart"></i> Listado </a>
                                    </li> 
                                    
                               <?php  } 
                               ?>
                                
                            </ul>
                        </div>
                     

                    </div>
                    <!-- /sidebar menu -->
                    
                        <!-- /menu footer buttons -->
                </div>
            </div>