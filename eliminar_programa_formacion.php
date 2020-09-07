<?php

include("conectar.php");

session_start();

$id_programa = $_GET['id_programa'];
$nom_programa = $_GET['nom_programa'];

$consulta = "DELETE FROM tab_programa_formacion WHERE id_programa='$id_programa' AND nom_programa='$nom_programa';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=programa_formacion.php'>
	</head>
</html>

";


?>