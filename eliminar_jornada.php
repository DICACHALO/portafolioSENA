<?php

include("conectar.php");

session_start();

$id_jornada = $_GET['id_jornada'];
$nom_jornada = $_GET['nom_jornada'];

$consulta = "DELETE FROM tab_jornada WHERE id_jornada='$id_jornada' AND nom_jornada='$nom_jornada';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=jornada.php'>
	</head>
</html>

";


?>