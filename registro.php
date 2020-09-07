<?php
include ("conectar.php");
if (isset($_POST['guardar']))
{
$ced = $_POST['cedula'];
$nom = $_POST["nombre"];
$ape = $_POST["apellido"]; 
$tel = $_POST["telefono"];
$mail = $_POST["correo"];
$psw = $_POST["clave"];
$psw2 = $_POST["confirmar"];
$pregunta = $_POST["pregunta"]; 
$respuesta = $_POST["respuesta"]; 

$enc =base64_encode($psw);
$des = base64_decode($enc);

if($psw === $psw2)  
    { 
      $consulta="INSERT INTO tab_usuario (id_usuario,nom_usuario,apell_usuario,celular,correo_electronico,clave,pregunta,respuesta) values($ced,'$nom','$ape',$tel,'$mail','$enc','$pregunta','$respuesta');";
	  $respuesta= pg_query($consulta) or die ('Error. Intente de nuevo'.pg_last_error($dbconn));
	  	  pg_close($con);
	  	  echo "<script>alert('El registro ha sido exitoso');
	  	  
        </script>";
        
        echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="2;url=index.html">
			</head>
		</html>
		';
 	}
else {
 	 echo"<script>alert('Las contraseñas no coinciden');
          </script>";
	 }
}

?>