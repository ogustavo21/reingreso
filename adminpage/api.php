<?php 
/*
 $data = json_decode( file_get_contents('http://189.194.95.69:3000/candados/1140271'), true );
 var_dump($data);
*/
$MATRICULA=1140271;
$url = "http://189.194.95.69:3000/candados/".$MATRICULA;//API
$json = file_get_contents($url);
$obj = json_decode($json);

foreach ($obj as $key => $value) {
	echo $dato=$obj[$key]->NOMBRE_TIPO;
	 echo "<br>";
	# code...
}


 ?>