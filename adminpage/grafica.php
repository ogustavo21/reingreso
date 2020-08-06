<?php

    include("../session.php");
    include("../utils/conexion.php");
    include("../template/todo.php");

    $query="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=1";
    //$resultado=mysqli_query($conexion,$sql);
    $result = mysqli_query($conexion,$query);
    $row = mysqli_fetch_row($result);
    $paso1 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=2";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso2 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=3";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso3 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=4";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso4 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=5";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso5 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=6";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso6 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=7";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso7 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=8";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso8 = $row[0];

    $sql="SELECT COUNT(*) FROM `pasos_r` WHERE idPaso_r=9";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $paso9 = $row[0];

?>

<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>
</head>
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            
                            <h3>Gráfica</small></h3>
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
                                <!-- Custom styling plus plugins -->
 								<div class="col-md-7 col-sm-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Por pasos</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div id="echart_donut" style="height:400px; width: 450px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- Custom styling plus plugins -->
<?php
    $sql1="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=1";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $kinder = $row[0];

    $sql1="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=2";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $primaria = $row[0];

    $sql1="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=3";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $sec = $row[0];

    $sql1="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=4";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $prepa = $row[0]; 

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=5";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $isc = $row[0];

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=6";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $teo = $row[0];

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=8";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $enfer = $row[0]; 

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera IN (9,15,16,17,18,19,20)";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $CE = $row[0]; 

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=10";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $nutri = $row[0]; 

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=11";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $conta = $row[0];

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=25";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $gastro = $row[0];

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera=26";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $diseno = $row[0];    
?>
                        <!-- Custom styling plus plugins -->
                        <div class="col-md-7 col-sm-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Por escuelas</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div id="echart_donut1" style="height:400px; width: 450px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- Custom styling plus plugins -->
<?php 
    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera IN (1,2,3,4)";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $NM = $row[0];

    $sql="SELECT COUNT(*) FROM `reingreso_r` WHERE id_carrera IN (5,6,8,9,10,11,15,16,17,18,19,20,22,23,24,25,26)";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($result);
    $univ = $row[0]; 
?>
                        <!-- Custom styling plus plugins -->
                        <div class="col-md-5 col-sm-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Niveles</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div id="echart_donut2" style="height:400px;"></div>

                                </div>
                            </div>
                        </div>
                        <!-- Custom styling plus plugins -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
	    </div>
	        <script src="/reingreso/js/echart/echarts-all.js"></script>
	        <script src="/reingreso/js/echart/green.js"></script>

	        <script src="/reingreso/js/moris/raphael-min.js"></script>
	        <script src="/reingreso/js/moris/morris.js"></script>
	        <script src="/reingreso/js/moris/example.js"></script>
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

        <script>
        	var $paso1 = "<?= $paso1 ?>";
        	var $paso2 = "<?= $paso2 ?>";
        	var $paso3 = "<?= $paso3 ?>";
        	var $paso4 = "<?= $paso4 ?>";
        	var $paso5 = "<?= $paso5 ?>";
        	var $paso6 = "<?= $paso6 ?>";
        	var $paso7 = "<?= $paso7 ?>";
        	var $paso8 = "<?= $paso8 ?>";
        	var $paso9 = "<?= $paso9 ?>";
        	var myChart = echarts.init(document.getElementById('echart_donut'), theme);
        myChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            calculable: true,
            legend: {
                //orient: 'vertical',
                //x: 'left',
                x: 'center',
                y: 'bottom',
                data: ['Paso1', 'Paso2', 'Paso3','Paso4','Paso5','Paso6','Paso7','Paso8', 'Inscritos',]
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie'],
                        option: {
                        }
                    },
                    restore: {
                        show: true
                    },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            series: [
                {
                    name: 'Datos',
                    type: 'pie',
                    radius: ['36%', '55%'],
                    itemStyle: {
                        normal: {
                            label: {
                                show: true
                            },
                            labelLine: {
                                show: true
                            }
                        },
                        emphasis: {
                            label: {
                                show: true,
                                position: 'center',
                                textStyle: {
                                    fontSize: '14',
                                    fontWeight: 'normal'
                                }
                            }
                        }
                    },
                    data: [
                        {
                            value: $paso1,
                            name: 'Paso1'
                        },
                        {
                            value: $paso2,
                            name: 'Paso2'
                        },
                        {
                            value: $paso3,
                            name: 'Paso3'
                        },
                        {
                            value: $paso4,
                            name: 'Paso4'
                        },
                        {
                            value: $paso5,
                            name: 'Paso5'
                        },
                        {
                            value: $paso6,
                            name: 'Paso6'
                        },
                        {
                            value: $paso7,
                            name: 'Paso7'
                        },
                        {
                            value: $paso8,
                            name: 'Paso8'
                        },
                        {
                            value: $paso9,
                            name: 'Inscritos'
                        },
                        
                ]
            }
        ]
        });
        </script>

        <script>
            var $kinder = "<?= $kinder ?>";
            var $primaria = "<?= $primaria ?>";
            var $sec = "<?= $sec ?>";
            var $prepa = "<?= $prepa ?>";
            var $isc = "<?= $isc ?>";
            var $teo = "<?= $teo ?>";
            var $enfer = "<?= $enfer ?>";
            var $CE = "<?= $CE ?>";
            var $nutri = "<?= $nutri ?>";
            var $conta = "<?= $conta ?>";
            var $gastro = "<?= $gastro ?>";
            var $diseno = "<?= $diseno ?>";
            var myChart = echarts.init(document.getElementById('echart_donut1'), theme);
        myChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            calculable: true,
            legend: {
                //orient: 'vertical',
                //x: 'left',
                x: 'center',
                y: 'bottom',
                data: ['Kinder','Primaria','Secundaria','Preparatoria', 'ISC', 'Teología','Enfermería','Ciencias de la Educación','Nutrición','Contaduría','Gastronomía', 'Diseño Gráfico',]
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie'],
                        option: {
                        }
                    },
                    restore: {
                        show: true
                    },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            series: [
                {
                    name: 'Datos',
                    type: 'pie',
                    radius: ['36%', '55%'],
                    itemStyle: {
                        normal: {
                            label: {
                                show: true
                            },
                            labelLine: {
                                show: true
                            }
                        },
                        emphasis: {
                            label: {
                                show: true,
                                position: 'center',
                                textStyle: {
                                    fontSize: '14',
                                    fontWeight: 'normal'
                                }
                            }
                        }
                    },
                    data: [
                        {
                            value: $kinder,
                            name: 'Kinder'
                        },
                        {
                            value: $primaria,
                            name: 'Primaria'
                        },
                        {
                            value: $sec,
                            name: 'Secundaria'
                        },
                        {
                            value: $prepa,
                            name: 'Preparatoria'
                        },
                        {
                            value: $isc,
                            name: 'ISC'
                        },
                        {
                            value: $teo,
                            name: 'Teología'
                        },
                        {
                            value: $enfer,
                            name: 'Enfermería'
                        },
                        {
                            value: $CE,
                            name: 'Ciencias de la Educación'
                        },
                        {
                            value: $nutri,
                            name: 'Nutrición'
                        },
                        {
                            value: $conta,
                            name: 'Contaduría'
                        },
                        {
                            value: $gastro,
                            name: 'Gastronomía'
                        },
                        {
                            value: $diseno,
                            name: 'Diseño Gráfico'
                        },
                        
                ]
            }
        ]
        });
    
        </script>

        <script>
            var $NM = "<?= $NM ?>";
            var $univ = "<?= $univ ?>";
            var myChart = echarts.init(document.getElementById('echart_donut2'), theme);
        myChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            calculable: true,
            legend: {
                //orient: 'vertical',
                //x: 'left',
                x: 'center',
                y: 'bottom',
                data: ['COLPAC', 'UNAV',]
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie'],
                        option: {
                        }
                    },
                    restore: {
                        show: true
                    },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            series: [
                {
                    name: 'Datos',
                    type: 'pie',
                    radius: ['36%', '55%'],
                    itemStyle: {
                        normal: {
                            label: {
                                show: true
                            },
                            labelLine: {
                                show: true
                            }
                        },
                        emphasis: {
                            label: {
                                show: true,
                                position: 'center',
                                textStyle: {
                                    fontSize: '14',
                                    fontWeight: 'normal'
                                }
                            }
                        }
                    },
                    data: [
                        {
                            value: $NM,
                            name: 'COLPAC'
                        },
                        {
                            value: $univ,
                            name: 'UNAV'
                        }
                 
                ]
            }
        ]
        });
    
        </script>

 <!-- footer content -->
            <?php
            include("../template/footer.php");
            ?>
            <!-- /footer content -->
