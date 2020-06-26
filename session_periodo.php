<?php
//include('conexion.php');
$mysqli = new mysqli("localhost", "root", "", "portfolio");
   mysqli_set_charset($mysqli,"utf8");
   if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();}
   session_start();
   
   $periodo = $_SESSION['periodo'];
   
   $ses_sql = mysqli_query($mysqli,"SELECT id_periodo FROM periodos WHERE periodo = '$periodo' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['periodo'];
   
   if(!isset($_SESSION['periodo'])){
      header("location:index.php");
      die();
   }
 
?>