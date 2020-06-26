<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$mysqli->prepare('DELETE FROM archivos WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: reportes.php');
	}else{
		header('Location: reportes.php');
	}
 ?>