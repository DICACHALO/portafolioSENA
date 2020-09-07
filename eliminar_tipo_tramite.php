<?php

include("conectar.php");

session_start();

$id_tipo_tramite = $_GET['id_tipo_tramite'];
$nom_tramite = $_GET['nom_tramite'];

$consulta = "DELETE FROM tab_tipo_tramite WHERE id_tipo_tramite='$id_tipo_tramite' AND nom_tramite='$nom_tramite';";

$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());

pg_close($con);

echo"

<html>
	<head>
		<meta http-equiv='REFRESH' content='0;url=tipo_tramite.php'>
	</head>
</html>

";


?>