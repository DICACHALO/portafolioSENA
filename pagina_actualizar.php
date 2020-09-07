<!DOCTYPE html>
<html>
<head>
	<title>PORTAFOLIO</title>
</head>

<body>

<?php
include ("conectar.php");
if (isset($_POST['ingresar']))
	{$consulta="SELECT id_usuario,id_rol from tab_usuario_perfil where id_usuario=$usr;";
		// hace un consulta en la tabla 

		$res=pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

		//me trae una toda la informacion de una tabla
		while($fila=pg_fetch_array($res)){

		echo"<form action='actualizar1.php' method='POST'>";
		echo "<input type='number' name='id_usuario' value= '".  $fila['id_usuario'] . "'><br>";
		echo "<input type='number' name='id_rol' value='" .  $fila['id_rol']. "'><br>";
		echo "<input type='submit' name='enviando' value='actualizar'>";
		echo "<input type='submit' name='borrar' value='Eliminar'>";
		echo "</form>";
		pg_close($con);//cierra la conexión 
	}

}


?>
</body>
</html>