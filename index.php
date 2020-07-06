<?php
// esto es el index
include("session.php");
include("utils\conexion.php");

$user_check = $_SESSION['login_user'];
//session_periodo
/*$mysqli = new mysqli("localhost", "root", "", "portfolio");
    mysqli_set_charset($mysqli,"utf8");
    if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();}*/

?>
 
<!DOCTYPE html>
<html lang="en">

                    <?php 
                    include("menu.php");
                    ?>
                    
                    <!-- /menu footer buttons -->
                
            <!-- /top navigation -->

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
                                           <h1 class="StepTitle">Solicita revisión de adeudo</h1>

                                            <p class="instruccion">
                                            Para comenzar con tu proceso de reinscripción solicita la revisión de adeudos a Finanzas.
                                           </p>
                                           <form action="solicit_adeu.php" method="POST" enctype="multipart/form-data">                               
                                            <input class="btn btn-default btn-sm" type="submit" name="Guardar" value="Enviar solicitud">
                                            </form>
                                           
                                        </div>
                                        <div id="step-2">
                                            <h1 class="StepTitle">Revisión de Adeudo</h1>
                                            <p class="instruccion">
                                                Finanzas revisará su cuenta, espere a que se lleve acabo el proceso.     
                                            </p>
                                        </div>
                                        <div id="step-3">
                                            <h1 class="StepTitle">Revisión de Teléfono y Correo</h1>
                                            <p class="instruccion">
                                                Admisiones verificará tus datos en el sistema, espere a que se lleve a cabo el proceso.     
                                            </p>
                                        </div>

                                        <div id="step-4">
                                            <h1 class="StepTitle">Revisión de candado</h1>
                                        </div>

                                        <div id="step-5">
                                            <h1 class="StepTitle">Carga académica</h1>
                                        </div>
                                        <div id="step-6">
                                            <h1 class="StepTitle">Cálculo de cobro</h1>
                                        </div>
                                        <div id="step-7">
                                            <h1 class="StepTitle">Enviar comprobante</h1>
                                            <form action="" method="POST" enctype="multipart/form-data">              
                                            <input class="form-control" type="file" name="Guardar" value="Enviar">
                                            </form>
                                        </div>
                                        <div id="step-8">
                                            <h1 class="StepTitle">Bienvenid@</h1>
                                            
                                        </div>
                                    </div>
                                    <!-- End SmartWizard Content -->    
            </div>
        </div>
        <!-- /page content -->

            <!-- footer content -->
            <?php
            include("footer.php");
            ?>
            <!-- /footer content -->
    </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>
        <!-- tags -->
        <script src="js/tags/jquery.tagsinput.min.js"></script>
        <!-- switchery -->
        <script src="js/switchery/switchery.min.js"></script>
        <!-- daterangepicker -->
        <script type="text/javascript" src="js/moment.min2.js"></script>
        <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
        <!-- richtext editor -->
        <script src="js/editor/bootstrap-wysiwyg.js"></script>
        <script src="js/editor/external/jquery.hotkeys.js"></script>
        <script src="js/editor/external/google-code-prettify/prettify.js"></script>
        <!-- select2 -->
        <script src="js/select/select2.full.js"></script>
        <!-- form validation -->
        <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
        <!-- textarea resize -->
        <script src="js/textarea/autosize.min.js"></script>
        <script>
            autosize($('.resizable_textarea'));
        </script>
        <!-- Autocomplete -->
        <script type="text/javascript" src="js/autocomplete/countries.js"></script>
        <script src="js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>
        <script src="js/custom.js"></script>


        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>
        <!-- /select2 -->
        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->
        <!-- form validation -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {}
        </script>
        <!-- /form validation -->
        <!-- editor -->
        <script>
            $(document).ready(function () {
                $('.xcxc').click(function () {
                    $('#descr').val($('#editor').html());
                });
            });

            $(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                            return false;
                        })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                            target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });
                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();
                        $('#voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('#voiceBtn').hide();
                    }
                };

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                };
                initToolbarBootstrapBindings();
                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });
                window.prettyPrint && prettyPrint();
            });
        </script>
        <!-- /editor -->


                <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        // Smart Wizard     
                        $('#wizard').smartWizard();

                        function onFinishCallback() {
                            $('#wizard').smartWizard('showMessage', 'Finish Clicked');
                            //alert('Finish Clicked');
                        }
                    });

                    $(document).ready(function () {
                        // Smart Wizard 
                        $('#wizard_verticle').smartWizard({
                            transitionEffect: 'slide'
                        });

                    });
                </script>

</body>

</html>