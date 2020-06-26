    <?php
    include_once("session.php");
    @$user_check = $_SESSION['login_user'];
    $conexion = mysqli_connect ("localhost","root", "", "admisiones_bd");
    $conexion->set_charset('utf8');
    $query = $conexion -> query("SELECT tipo FROM reingreso_r WHERE matricula=$user_check");
    $tipo_usuario = mysqli_fetch_array($query);
    $admin = array(0=>"admin","tipo"=>"admin");
    ?>


     <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-check-square-o"></i> Reingreso </a>
                                </li>
                                
                                <?php 
                                if ($tipo_usuario==$admin) {
                                ?>  
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