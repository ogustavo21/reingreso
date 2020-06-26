<?php
  $conexion = mysqli_connect ("localhost","root", "", "portfolio");
  $conexion->set_charset('utf8');
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista MYSQL Select</title>
	<meta charset="utf-8">
</head>

<body>
	
	<form action="guardar.php" method="POST">
  <div align="center">                        
    <p>Seleccione una opción del siguiente menú:</p>
      <select  name ="valor">
        <option value="0">Seleccione:</option>
        <?php
          $query = $conexion -> query ("SELECT * FROM registro where activo = 1");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
          }
        ?>
      </select>
      <input type="submit" name="Guardar" value="Guardar">
    </p>
  </div>
  </form>
  <section>
  			<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
				</tr>
				<?php

				 $insert = "SELECT * from registro where Activo = 0";
                 $query = $conexion->query($insert)  or die ("Error en: " . mysql_error());
				while ($row = $query->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$row['id'].'</td>
						 <td>'.$row['nombre'].'</td>
						 </tr>';
				}
				?>
       
			</table>
		</section>
 </body>
</html>