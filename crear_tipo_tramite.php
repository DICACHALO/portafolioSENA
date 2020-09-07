<?php
include('conectar.php');
    $sql="INSERT INTO tab_tipo_tramite (nom_tramite) 
    values('$_REQUEST[nom_tramite]');"; //Consulta para insertar la nueva información del proveedor
    $respuesta=pg_query($sql)or die('Error. Intente de nuevo'.pg_last_error());
    
    echo "<script>alert('El registro ha sido exitoso');</script>";
    echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=tipo_tramite.php">
			</head>
		</html>
		';
    pg_close($con);
?> 