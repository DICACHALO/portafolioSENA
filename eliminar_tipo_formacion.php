<?php

include("conectar.php");

session_start();

$id_tipo_formacion = $_GET['id_tipo_formacion'];
$tipo_formacion = $_GET['tipo_formacion'];

$consulta = "DELETE FROM tab_tipo_formacion WHERE id_tipo_formacion='$id_tipo_formacion' AND tipo_formacion='$tipo_formacion';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=tipo_formacion.php'>
	</head>
</html>

";


?>