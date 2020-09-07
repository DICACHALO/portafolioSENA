<?php

include("conectar.php");

session_start();

$id_red = $_GET['id_red'];
$nom_red = $_GET['nom_red'];

$consulta = "DELETE FROM tab_red WHERE id_red='$id_red' AND nom_red='$nom_red';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=red.php'>
	</head>
</html>

";


?>