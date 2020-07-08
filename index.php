<?php
// esto es el index
include("session.php");
include("utils/conexion.php");
include("template/todo.php");
$result= 4;
$matr=$_SESSION['login_user'];
$query = "SELECT idPaso_r FROM pasos_r INNER JOIN reingreso_r ON reingreso_r.id_reingreso=pasos_r.id_reingreso where reingreso_r.matricula='$matr'";
$result =  mysqli_query($conexion,$query);
$row = mysqli_fetch_array($result);
$paso = $row[0];
if ($result!="0") {
    echo "<script> $(document).ready(function () {
                        var paso = '<?php echo '$paso'; ?>';
                        // Smart Wizard 
                        $('#wizard').smartWizard('enableStep', paso);

                    });
         </script>";
}
// echo '$result';

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
            <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:600px;">
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
                                        </ul>
                                        <div id="step-1" class="form-group">
                                           <h1 class="StepTitle">Registro</h1>

                                            <p class="instruccion">
                                            Ya comenzó su proceso de reinscripción, para continuar presione "Siguiente".
                                           </p>
                                          
                                           
                                        </div>
                                        <div id="step-2">
                                            <h1 class="StepTitle">Solicita revisión de adeudo</h1>
                                            <p class="instruccion">
                                                Finanzas revisará su cuenta, espere a que se lleve acabo el proceso.     
                                            </p>
                                            <form action="solicit_adeu.php" method="POST" enctype="multipart/form-data">                               
                                            <input class="btn btn-default btn-sm" type="submit" name="Guardar" value="Enviar solicitud">
                                            </form>
                                        </div>
                                        <div id="step-3">
                                            <h1 class="StepTitle">Revisión de Adeudo</h1>
                                            <p class="instruccion">
                                                Admisiones verificará tus datos en el sistema, espere a que se lleve a cabo el proceso.     
                                            </p>
                                        </div>

                                        <div id="step-4">
                                            <h1 class="StepTitle">Revisión de Teléfono y Correo</h1>
                                        </div>

                                        <div id="step-5">
                                            <h1 class="StepTitle">Revisión de candado</h1>
                                        </div>
                                        <div id="step-6">
                                            <h1 class="StepTitle">Carga académica</h1>
                                        </div>
                                        <div id="step-7">
                                            <h1 class="StepTitle">Cálculo de cobro</h1>
                                            <form action="" method="POST" enctype="multipart/form-data">              
                                            <input class="form-control" type="file" name="Guardar" value="Enviar">
                                            </form>
                                        </div>
                                        <div id="step-8">
                                            <h1 class="StepTitle">Enviar comprobante</h1>
                                            
                                        </div>
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