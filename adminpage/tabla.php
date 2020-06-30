<?php  
include("../utils/conexion.php");

                // consulta para obetener tipo y carrera
                //$query91 = "SELECT * from registro where id_registro='".$_SESSION['k_username']."' ";    
               // $result1 = $conexion->query($query91);
                //$rowTotal = $result1->fetch_assoc();
                $tipo = "Finanzas";//$rowTotal["tipo"];
                $carrera = 0;//$_SESSION['carrera'];
                
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
                    $activo1="active";

                    //$x=$_REQUEST['x'];
                        if(isset($_REQUEST['x']) && $_REQUEST['x']==5465465465){
                            $pasoActual=6;
                            $pasoguardar=7;
                            $mboton="Calculo";
                            $activo2="active";
                            $activo1="";
                        }
                         if(isset($_REQUEST['x']) && $_REQUEST['x']==89756687654){
                            $pasoActual=8;
                            $pasoguardar=9;
                            $mboton="Pagado";
                            $activo3="active";
                            $activo1="";
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
        echo  $sql = "SELECT * FROM reingreso_r INNER JOIN pasos_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where idPaso_r=$pasoActual $carrconsul ";
        $result = mysqli_query($conexion,$sql);
      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      //$count = mysqli_num_rows($result);
         ?>
         
         <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="<?php echo $activo1;?>"><a onclick="refresh('123')" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Convenio</a>
                                                </li>
                                                <li role="presentation" class="<?php echo $activo2;?>" ><a onclick="refresh('5465465465')" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Calculo de cobro</a>
                                                </li>
                                               <li role="presentation" class="<?php echo $activo3;?>" ><a onclick="refresh('89756687654')" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Verifica pago</a>
                                                </li>
                                            </ul>
         </div>
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
            # code...
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
                                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="77" aria-valuenow="74" style="width: 77%;"></div>
                                                    </div>
                                                    <small>77% Complete</small>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="myFunction()" class="btn btn-success btn-xs"  ><?php echo $mboton;?></button>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
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




</script>