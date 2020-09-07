<?php // Este archivo valida que realmente el usuario y la contraseña se encuentren registrados en la base de datos


$id_usuario = $_POST["id_usuario"]; //Numero de cedula del usuario 
$pwd = $_POST["password"]; // Contraseña
include ("conectar.php");  // Conectando y seleccionado la base de datos 
include ("registro.php");
$des = base64_encode($pwd);
$res= base64_decode($des);
 $sql = pg_query("SELECT id_usuario, clave FROM tab_usuario WHERE id_usuario ='$id_usuario' AND clave ='$des';")
 or die("Error. No es posible la conexión". pg_last_error());
 if (pg_fetch_array($sql))
  {

  session_start(); //Comienza una sesión

  $_SESSION['id_usuario']=$id_usuario;
  $_SESSION['password']=$des;
  session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0); 

  header("Location: home.php"); //Entra a la aplicación

  } else{


   echo "USUARIO NO REGISTRADO" . $res;
   echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="2;url=index.html">
		</head>
	</html>
	';
  }
  
  pg_close(); //Cierra conexión con la base de datos

?>