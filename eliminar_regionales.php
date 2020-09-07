<?php

include("conectar.php");

session_start();

$id_regional = $_GET['id_regional'];
$nom_regional = $_GET['nom_regional'];

$consulta = "DELETE FROM tab_regional WHERE id_regional='$id_regional' AND nom_regional='$nom_regional';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=regionales.php'>
	</head>
</html>

";


?>