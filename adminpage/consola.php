<?php

include("../session.php");
include("../utils/conexion.php");
include("../template/todo.php");
?>


            <!-- page content -->

            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            
                            <h3><?php echo $_SESSION['tipo'] ?> <small><?php if( $_SESSION['id_carrera']!="") {
                //consulta para obetener tipo y carrera
                $query91 = "SELECT * from carrera where id_carrera='".$_SESSION['id_carrera']."' ";    
                $result1 = $conexion->query($query91);
                $rowTotal = $result1->fetch_assoc();
                 echo "  ".$rowTotal["carrera"];} ?></small></h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Alumnos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p>Por favor, revisa cuidadosamente a el alumno y seleciona la opcion deseada</p>
                                    <div id="tablita"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<script type="text/javascript">
    $(document).ready(function(){
$('#tablita').load('tabla.php')

    });
</script>


           


        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

 <!-- footer content -->
            <?php
            include("../template/footer.php");
            ?>
            <!-- /footer content -->