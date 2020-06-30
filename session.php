<?php
//include('conexion.php');
$mysqli = new mysqli("localhost", "root", "", "admisiones_bd");
   mysqli_set_charset($mysqli,"utf8");
   if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();}
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($mysqli,"SELECT tipo FROM reingreso_r WHERE matricula = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   //$login_session = $row['matricula'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
 
?>