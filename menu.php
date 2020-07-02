    <?php
    include_once("session.php");
    @$user_check = $_SESSION['login_user'];
    $conexion = mysqli_connect ("localhost","root", "", "admisiones_bd");
    $conexion->set_charset('utf8');
    $query = $conexion -> query("SELECT tipo FROM reingreso_r WHERE matricula=$user_check");
    $tipo_usuario = mysqli_fetch_array($query);
    $admin = array(0=>"admin","tipo"=>"admin");
    ?>

<!-- menu prile quick info -->
    <div class="profile">
        <div class="profile_pic">
            <img src="images/picture.jpg" alt="..." class="img-circle profile_img">
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