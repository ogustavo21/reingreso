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
                            <form action="#" method="POST" >
                                <select name="carreras" class="form-control">
                                <?php $sql="SELECT * FROM carrera ORDER BY id_carrera ASC";
                                    $resultado=mysqli_query($conexion,$sql);
                                    while ($lista=mysqli_fetch_array($resultado)) {
                                    echo "string";
                                ?>    
                                    <option value="<?php echo $lista['id_carrera']; ?>" ><?php echo $lista['carrera']; ?></option>
                                    <?php } ?>
                                </select> 
                                
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                
                                <select name="pasos" class="form-control">
                                <?php $sql="SELECT * FROM tpaso ORDER BY idPaso ASC";
                                    $resultado=mysqli_query($conexion,$sql);
                                    while ($lista=mysqli_fetch_array($resultado)) {
                                    echo "string";
                                ?>    
                                    <option value="<?php echo $lista['idPaso']; ?>" ><?php echo $lista['tpaso']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" class="btn btn-default" name="Buscar" value="Buscar">
                                
                            </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>


<?php
                $carr= $_POST['carreras']; 
                 $paso=$_POST['pasos'];
                 //echo "$paso";
                 //echo "$carr";                          
                 $tipo = $_SESSION['tipo'];//$rowTotal["tipo"];
                 $carrera =$_SESSION['id_carrera'];//$_SESSION['carrera'];
                
                ////elegir la consulta con carreras
                if ($carrera>0){
                    if ($carrera==12){
                    $carrconsul = " and id_carrera in (12,13,14)";
                    }elseif ($carrera==9){
                    $carrconsul = " and id_carrera in (9,15,16,17,18,19,20,21,22,23)";
                    }else {
                    $carrconsul = " and id_carrera=$carrera";  
                    }
                    
                }else{$carrconsul = "";}

                    
                            $sql = "SELECT * FROM registro INNER JOIN pasos ON registro.id_registro=pasos.id_registro INNER JOIN tpaso ON tpaso.idPaso=pasos.id_tpaso iNNER JOIN persona ON registro.id_registro=persona.id_registro where pasos.estatus=0 AND pasos.id_tpaso=$paso AND persona.id_carrera=$carr ORDER BY registro.id_registro DESC ";
                            if($paso==0){
                                    $sql = "SELECT * FROM `resgitro` where id_registro not in (SELECT id_registro from pasos)";

                                 }
                    
        
                
                $result = mysqli_query($conexion,$sql);
                 $num=$result->num_rows;
        // lista por carrera y pasos
            


?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Total de Alumnos: <?php echo $num;?></h2><br>
                                     <div class="clearfix"></div>
                                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Ã—</span>
                                    </button>¡Se muestran resultados con el estatus actual validadoÂ!
                                </div>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                   
                                    <div id="tablita">
                                        

                                    <!-- start project list -->
                                    <table class=" table table-striped responsive-utilities jambo_table" id="tabla">
                                        <thead>
                                            <tr class="headings">
                                                <th style="width: 1%">#</th>
                                                <th style="width: 20%">Nombre</th>
                                                <th>Correo</th>
                                                <th>Matricula</th>
                                                <th>-----</th>
                                                <th style="width: 10%">Actual</th>
                                                <th style="width: 10%"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></th>
                                            </tr>
                                        </thead>
                                        <?php

                
            while($key=$result->fetch_array(MYSQLI_ASSOC)) {
        $id=$key['id_registro'];
        $matricula=$key['matricula'];
            # code...

        $porcentaje= number_format(($key['id_tpaso']*100)/9, 0, '.', '');
        
        ?>
                                        <tbody>
                                            
                                            <tr>
                                                <td><?php echo $key['id_registro'];?></td>
                                                <td>
                                                    <a><?php echo $nombre=$key['nombre']." ".$key['a_paterno']." ".$key['a_materno'];?></a>
                                                    <br>
                                                    <small><?php echo $key['telefono'];?></small>
                                                </td>
                                                <td>
                                                    <a><?php echo $key['correo'];?></a>
                                                </td>
                                                <td>
                                                    <span ><?php echo $key['matricula']; ?></span>
                                                   
                                                </td>
                                                <td class="project_progress">
                                                    <div class="progress progress_sm">
                                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo  $porcentaje;?>" aria-valuenow="74" style="width: <?php echo  $porcentaje; ?>%;"></div>
                                                    </div>
                                                    <small><?php echo  $porcentaje; ?>% Complete</small>
                                                </td>
                                                <td>
                                                    <a><?php echo $key['abreviatura'];?></a>
                                                </td>
                                                <td>
                                                   <button type="button" class="btn btn-info btn-xs edit" onclick="matricula(<?php echo $key['matricula']; ?>)" data-toggle="modal" data-target=".bs-example-modal-lg">Info</button>
                                                          
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                                            <!-- modals -->
                                                        <div class="modal fade bs-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">Ãƒâ€”</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel"> Datos AcadÃƒÂ©micos</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4></h4>
                                                                        <div id="datos"></div>
                                                                       
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <!-- modals -->
           


        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>
        <script type="text/javascript">
            
function matricula(matricula) {
     var matriculax=matricula;

$.post("info.php",
    {
      matricula:matriculax,
    },
    function(data,status){
    // $('#matriculas').val(data);
      $("#datos").html(data); 
    });

}
        </script>

 <!-- footer content -->
            <?php
            include("../template/footer.php");
            ?>
            <!-- /footer content -->