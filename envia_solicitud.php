<?php
include("session.php");
include("utils/conexion.php");

$matr=$_SESSION['login_user'];
 $sql="UPDATE `pasos_r`, reingreso_r  SET `idPaso_r`=2  where reingreso_r.id_reingreso=pasos_r.id_reingreso and reingreso_r.matricula='$matr'";
$result = $conexion->query($sql);
if ($result) {
echo'<script type="text/javascript">
     alert("La solicitud ha sido enviada");
     </script>';
echo $result;

header("location: index.php");
}


?>