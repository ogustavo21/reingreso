<?php
// esto es el index
include("session.php");
include("utils/conexion.php");
include("template/todo.php");

$matr=$_SESSION['login_user'];
$query = "SELECT idPaso_r FROM pasos_r INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr'";
$result =  mysqli_query($conexion,$query);
$row = mysqli_fetch_row($result);
$paso = $row[0];
if ($paso!=0) {
    echo "<script>";
    echo "$(document).ready(function () {
            var paso =  $paso;
            // Smart Wizard 
            $('#wizard').smartWizard('goToStep', paso);
            });";
    echo "</script>";
    for ($i=0; $i < $paso ; $i++) {
    echo "<script>";
    echo "$(document).ready(function () {
            var paso =  $i;
            // Smart Wizard 
            $('#wizard').smartWizard('enableStep', paso);
            });";
    echo "</script>";     
    }    
}

if ($paso>=2) {
    echo "<script>";
    echo "$(document).ready(function () {
            $('#wizard').smartWizard('deshabilitar');
            });";
    echo "</script>";
}

?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Proceso de reinscripción</h3>
                        </div>
                        <div class="title_right">
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
            <div class="row" id="pasos">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:780px;">
                                <div class="x_title  ">
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" h>


                                    <!-- Smart Wizard -->

                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                                <li>
                                                    <a href="#step-1">
                                                        <span class="step_no">1</span>
                                                        <span class="step_descr">
                                                Paso 1<br />
                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-2">
                                                        <span class="step_no">2</span>
                                                        <span class="step_descr">
                                                Paso 2<br />
                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-3">
                                                        <span class="step_no">3</span>
                                                        <span class="step_descr">
                                                Paso 3<br />
                                            </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#step-4">
                                                        <span class="step_no">4</span>
                                                        <span class="step_descr">
                                                Paso 4<br/>
                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-5">
                                                        <span class="step_no">5</span>
                                                        <span class="step_descr">
                                                Paso 5<br/>
                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-6">
                                                        <span class="step_no">6</span>
                                                        <span class="step_descr">
                                                Paso 6<br/>
                                           
                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-7">
                                                        <span class="step_no">7</span>
                                                        <span class="step_descr">
                                                Paso 7<br/>
                                                
                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-8">
                                                        <span class="step_no">8</span>
                                                        <span class="step_descr">
                                                Paso 8<br/>
                                               
                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-9">
                                                        <span class="step_no">9</span>
                                                        <span class="step_descr">
                                                Paso 9<br/>
                                               
                                            </span>
                                                    </a>
                                                </li>
                                        </ul>

                                        <!-- PASO 1 -->
                                        <div id="step-1" class="form-group">
                                           <h1 class="StepTitle">Registro</h1>

                                            <p class="instruccion">
                                            Ya comenzó su proceso de reinscripción, gracias por registrarse. Los pasos de reinscripción que deberá seguir son los siguientes:
                                           </p>
                                           <table id="example" class="table table-striped responsive-utilities jambo_table">
                                                <thead>
                                                    <tr class="headings">
                                                        <th></th>
                                                        <th>Pasos </th> 
                                                    </tr>
                                                </thead>
                                                    <?php $sql="SELECT * FROM tpaso_r ORDER BY id_tpasos_r ASC";
                                                        $resultado=mysqli_query($conexion,$sql);

                                                        while ($lista=mysqli_fetch_array($resultado)) {
                                                            # code...
                                                        
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $lista['id_tpasos_r']; ?></td>
                                                        <td><?php echo $lista['tpaso_r']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                            </table>
                                            <p class="instruccion">
                                            Deberá consultar constantemente el progreso de su reinscripción. Para continuar con el proceso presione "Siguiente".
                                            </p>
                                        </div>
                                        <!-- /PASO 1 -->

                                        <!-- PASO 2 -->
                                        <div id="step-2">
                                            <h1 class="StepTitle">Solicita revisión de adeudo</h1>
                                            <p class="instruccion">
                                                Para que finanzas revise su convenio solicite la revisión de tu cuenta. Los candados que tiene en este momento son:     
                                            </p>
                                            <?php
                                            $url = "http://189.194.95.69:3000/candados/".$matr;
                                            $json = file_get_contents($url);
                                            $obj = json_decode($json);

                                            foreach ($obj as $key => $value) {
                                                echo $nombreAcademica=$obj[$key]->NOMBRE_CANDADO;
                                                echo "<br>";
                                            }
                                            ?>
                                            <table id="example" class="table table-striped responsive-utilities jambo_table">
                                                <tr>
                                                        <td><?php if ($nombreAcademica!="") {
                                                            echo $nombreAcademica;
                                                        }else{
                                                            echo "No hay candados";
                                                        }
                                                         ?></td>
                                                    </tr>
                                            </table>
                                            <form action="solicit_adeu.php" method="POST" enctype="multipart/form-data">                               
                                            <input class="btn btn-default btn-sm" type="submit" name="Guardar" value="Enviar solicitud">
                                            </form>
                                        </div>
                                        <!-- /PASO 2 -->

                                        <!-- PASO 3 -->
                                        <div id="step-3">
                                            <h1 class="StepTitle">Revisión de Adeudo</h1>
                                            <p class="instruccion">
                                                Finanzas verificará sus datos en el sistema, espere a que se lleve a cabo el proceso.     
                                            </p>
                                            <?php
                                            $query="SELECT idPaso_r FROM pasos_r INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr' ";
                                            $result =  mysqli_query($conexion,$query);
                                            $row = mysqli_fetch_row($result);
                                            $paso = $row[0];
                                            if ($paso>=4) {
                                            ?>
                                            
                                            <p  style="color:red;">
                                            Se ha realizado el convenio. Puede avanzar al siguiente paso.   
                                            </p>
                                            <?php
                                             }
                                            ?>
                                        </div>
                                        <!-- /PASO 3 -->

                                        <!-- PASO 4 -->
                                        <div id="step-4">
                                            <h1 class="StepTitle">Revisión de Teléfono y Correo</h1>
                                            <p class="instruccion">
                                                Admisiones validará su teléfono y correo en el sistema, espere a que se lleve a cabo el proceso.     
                                            </p>
                                            <?php
                                            $query="SELECT idPaso_r FROM pasos_r INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr' ";
                                            $result =  mysqli_query($conexion,$query);
                                            $row = mysqli_fetch_row($result);
                                            $paso = $row[0];
                                            if ($paso>=5) {
                                            ?>
                                            
                                            <p  style="color:red;">
                                            Se han verificado tus datos. Puede avanzar al siguiente paso.   
                                            </p>
                                            <?php
                                             }
                                            ?>
                                        </div>
                                        <!-- /PASO 4 -->

                                        <!-- PASO 5 -->
                                        <div id="step-5">
                                            <h1 class="StepTitle">Revisión de Servicios Escolares</h1>
                                            <p class="instruccion">
                                                Servicios Escolares verificará tu documentación, espere a que se lleve a cabo el proceso.     
                                            </p>
                                            <?php
                                            $query="SELECT idPaso_r FROM pasos_r INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr' ";
                                            $result =  mysqli_query($conexion,$query);
                                            $row = mysqli_fetch_row($result);
                                            $paso = $row[0];
                                            if ($paso>=6) {
                                            ?>
                                            
                                            <p  style="color:red;">
                                            Se han verificado tus datos. Puede avanzar al siguiente paso.   
                                            </p>
                                            <?php
                                             }
                                            ?>
                                        </div>
                                        <!-- /PASO 5 -->

                                        <!-- PASO 6 -->
                                        <div id="step-6">
                                            <h1 class="StepTitle">Carga académica</h1>
                                            <p class="instruccion">
                                                Para conocer su carga académica se tendrá que comunicar con el director de su carrera, después del proceso podrá avanzar al siguiente paso.     
                                            </p>
                                            <?php
                                            $query="SELECT idPaso_r FROM pasos_r INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr' ";
                                            $result =  mysqli_query($conexion,$query);
                                            $row = mysqli_fetch_row($result);
                                            $paso = $row[0];
                                            if ($paso>=7) {
                                            ?>
                                            
                                            <p  style="color:red;">
                                            Se le ha asignado su carga académica. Puede consultar su portal académico y avanzar al siguiente paso.   
                                            </p>
                                            <?php
                                             }
                                            ?>
                                        </div>
                                        <!-- /PASO 6 -->

                                        <!-- PASO 7 -->
                                        <div id="step-7">
                                            <h1 class="StepTitle">Cálculo de cobro</h1>
                                            <p class="instruccion">
                                                Finanzas hará el cálculo de cobro, cuando esté definido podrá visualizarlo y pasar al siguiente paso.     
                                            </p>
                                            <?php
                                            $query="SELECT idPaso_r FROM pasos_r INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr' ";
                                            $result =  mysqli_query($conexion,$query);
                                            $row = mysqli_fetch_row($result);
                                            $paso = $row[0];
                                            if ($paso>=8) {
                                            ?>
                                            
                                            <p  style="color:red;">
                                            Se ha realizado el cálculo de cobro. Puede avanzar al siguiente paso.   
                                            </p>
                                            <?php
                                             }
                                            ?>
                                        </div>
                                        <!-- /PASO 7 -->

                                        <!-- PASO 8 -->
                                        <div id="step-8">
                                            <h1 class="StepTitle">Enviar comprobante</h1>
                                            <p class="instruccion">
                                                Al realizar el pago envíe su comprobante para que se verifique su pago.     
                                            </p>
                                            <form action="guardar.php" method="POST" accept-charset="utf-8">
                                                <input type="file" id="comprobante" name="comprobante">
                                                <label for="comprobante">Comprobante</label>
                                                <input type="submit"> 
                                            </form>

                                        </div>
                                        <!-- /PASO 8 -->

                                        <!-- PASO 9 -->

                                        <div id="step-9">
                                            <h1 class="StepTitle">Bienvenido</h1>
                                            <p class="instruccion">
                                            Completó su proceso de reinscripción.
                                            </p>
                                        </div>
                                        <!-- /PASO 9 -->
                                    </div>
                                    <!-- End SmartWizard Content -->    
            </div>
        </div>
        <!-- /page content -->

           <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

 <!-- footer content -->
            <?php
            include("template/footer.php");
            ?>
            <!-- /footer content -->