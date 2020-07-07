<?php

   /**
 * verifica si existe session y direciona a otra pagina si no existe session 
 * debe de include en todas las paginas
 */    
     session_start();
    if(!isset($_SESSION['login_user'])){
      header("location:/reingreso/login.php");
      die();
   }
   
  ///
 
?>