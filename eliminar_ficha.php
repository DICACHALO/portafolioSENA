<?php

include("conectar.php");

session_start();

$codigo_ficha = $_GET['codigo_ficha'];

$consulta = "DELETE FROM tab_ficha WHERE codigo_ficha='$codigo_ficha';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=ficha.php'>
	</head>
</html>

";


?>