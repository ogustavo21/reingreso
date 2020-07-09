<?php  
session_start();
//$user_check = $_SESSION['login_user'];
include("../utils/conexion.php");
$mboton="";
$nombre="";
$id=0;
$pasoguardar="";

                // consulta para obetener tipo y carrera
                //$query91 = "SELECT * from registro where id_registro='".$_SESSION['k_username']."' ";    
               // $result1 = $conexion->query($query91);
                //$rowTotal = $result1->fetch_assoc();

                 $matricula= $_SESSION['login_user'];
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


                // filtrar tipos
                if ($tipo=="Finanzas") {
                            $pasoActual=2;
                            $pasoguardar=3;
                            $mboton="Convenio";
                            $activo1="";
                            $activo2="";
                            $activo3="";
                     if(isset($_REQUEST['x']) && $_REQUEST['x']==465465465){
                            $pasoActual=2;
                            $pasoguardar=3;
                            $mboton="Convenio";
                            $activo1="active";
                            $activo2="";
                            $activo3="";
                        }
                    //$x=$_REQUEST['x'];
                        if(isset($_REQUEST['x']) && $_REQUEST['x']==5465465465){
                            $pasoActual=6;
                            $pasoguardar=7;
                            $mboton="Calculo";
                            $activo2="active";
                            $activo1="";
                            $activo3="";
                        }
                         if(isset($_REQUEST['x']) && $_REQUEST['x']==89756687654){
                            $pasoActual=8;
                            $pasoguardar=9;
                            $mboton="Pagado";
                            $activo3="active";
                            $activo1="";
                            $activo2="";
                        } 


                    }
                if ($tipo=="Admision")
                    {
                    $pasoActual=3;
                    $pasoguardar=4;
                    $mboton="Revisado";

                    }
                if ($tipo=="Servicios") {
                    $pasoActual=4;
                    $pasoguardar=5;
                    $mboton="Documentación";

                    }
                if ($tipo=="Escuela")
                    {
                    $pasoActual=5;
                    $pasoguardar=6;
                    $mboton="Carga";

                    }
                             
      // lista por carrera y pasos
           $sql = "SELECT * FROM reingreso_r INNER JOIN pasos_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where idPaso_r=$pasoActual $carrconsul ";
        $result = mysqli_query($conexion,$sql);
      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      //$count = mysqli_num_rows($result);

        if ($tipo=="Finanzas") {
         ?>
        

         
                                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="<?php echo $activo1;?>"><a onclick="refresh('465465465')" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Convenio</a>
                                                </li>
                                                <li role="presentation" class="<?php echo $activo2;?>" ><a onclick="refresh('5465465465')" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Calculo de cobro</a>
                                                </li>
                                               <li role="presentation" class="<?php echo $activo3;?>" ><a onclick="refresh('89756687654')" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Verifica pago</a>
                                                </li>
                                            </ul>
                                      </div>
         <?php }?>
                                    <!-- start project list -->
                                    <table class=" table table-striped responsive-utilities jambo_table" id="tabla">
                                        <thead>
                                            <tr class="headings">
                                                <th style="width: 1%">#</th>
                                                <th style="width: 20%">Nombre</th>
                                                <th>Correo</th>
                                                <th>Matricula</th>
                                                <th>-----</th>
                                                <th style="width: 10%">Estatus</th>
                                                <th style="width: 10%"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></th>
                                            </tr>
                                        </thead>
                                        <?php
            while($key=$result->fetch_array(MYSQLI_ASSOC)) {
        $id=$key['id_reingreso'];
        $matricula=$key['matricula'];
            # code...
         $porcentaje= number_format(($key['idPaso_r']*100)/9, 0, '.', '');
        ?>
                                        <tbody>
                                            
                                            <tr>
                                                <td>#</td>
                                                <td>
                                                    <a><?php echo $nombre=$key['nombre']." ".$key['a_paterno']." ".$key['a_materno'];?></a>
                                                    <br>
                                                    <small><?php echo $key['telefono'];?></small>
                                                </td>
                                                <td>
                                                    <a><?php echo $key['correo'];?></a>
                                                </td>
                                                <td>
                                                    <a><?php echo $key['matricula'];?></a>
                                                </td>
                                                <td class="project_progress">
                                                     <div class="progress progress_sm">

                                                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo  $porcentaje;?>" aria-valuenow="74" style="width: <?php echo  $porcentaje; ?>%;"></div>
                                                    </div>
                                                    <small><?php echo  $porcentaje;?>% Complete</small>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="myFunction()" class="btn btn-success btn-xs"  ><?php echo $mboton;?></button>
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

                                            <!-- modals -->
                                                        <div class="modal fade bs-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel"> Datos Académicos</h4>
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

                                    <!-- end project list -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
function myFunction() {
  var r = confirm("Acción a realizar: <?php echo $mboton;?>  -- <?php echo $nombre;?>");
  if (r == true) {
   
//$(document).ready(function(){
  //$("button").click(function(){
    $.post("inserta_pasos.php",
    {
      id: <?php echo $id; ?>,
      pasoguardar: <?php echo $pasoguardar; ?>
    },
    function(data,status){
     alert(data);
     $('#tablita').load('tabla.php')
     
    });
  //});
//});

  } else {
    //
  }
  
}

function refresh(dat){
  $('#tablita').load('tabla.php?x='+dat)

}

//manda informacion de la matricula
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