<?php

$database="admisiones_bd";
	$user='root';
	$password='';


try {
	
	$mysqli=new PDO('mysql:host=localhost;dbname='.$database,$user,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
 
} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}


/*$mysqli = new mysqli("localhost", "root", "", "portfolio");
mysqli_set_charset($mysqli,"utf8");
/* comprobar la conexión 
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}*/
?>