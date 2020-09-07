<?php

if (isset($_POST['guardar']))
{
include ("conectar.php");
@session_start();
$id_usuario=$_SESSION['id_usuario'];
$psw = $_POST["clave"];
$psw2 = $_POST["confirmar"];
$enc =base64_encode($psw);
$enc2 =base64_encode($psw2);

$des = base64_decode($enc);
if($enc === $enc2)  
    { 
      $consulta="UPDATE tab_usuario SET clave='$enc' WHERE id_usuario=$id_usuario;";
	  $respuesta= pg_query($consulta) or die ('Error. Intente de nuevo'.pg_last_error($dbconn));
	  	  pg_close($con);		
	  	  echo "<script>alert('El cambio de contraseña ha sido exitoso');
        </script>";
        echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=index.html">
			</head>
		</html>
		';
 	}
else {
 	 echo"<script>alert('Las contraseñas no coinciden');
          </script>";
     echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=pass.html">
			</head>
		</html>
		';
	 }
}


?>