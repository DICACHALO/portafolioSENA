<?php

include("conectar.php");

session_start();

$id_centro = $_GET['id_centro'];
$nom_centro = $_GET['nom_centro'];

$consulta = "DELETE FROM tab_centro WHERE id_centro='$id_centro' AND nom_centro='$nom_centro';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=centros.php'>
	</head>
</html>

";


?>