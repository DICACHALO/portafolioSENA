<?php
@session_start();
include("conectar.php");

if (isset($_POST['horario'])){
$id_usuario=$_SESSION['id_usuario'];
$codigo_ficha=$_SESSION['codigo_ficha'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/horario".$id_usuario."_".$codigo_ficha.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
  
   echo'
		El archivo fue subido con éxito.
			
			
				<meta http-equiv="REFRESH" content="2;url=instructor.php">
			
		
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=instructor.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_instructor SET horario_instructor='$archivo_final' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
}


if (isset($_POST['listado_aprendices'])){
$id_usuario=$_SESSION['id_usuario'];
$codigo_ficha=$_SESSION['codigo_ficha'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/listado_aprendices".$id_usuario."_".$codigo_ficha.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
  
   echo'
		El archivo fue subido con éxito.
			
			
				<meta http-equiv="REFRESH" content="2;url=instructor.php">
			
		
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=instructor.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_instructor SET listado_aprendices='$archivo_final' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
}


if (isset($_POST['programa_formacion'])){
$id_usuario=$_SESSION['id_usuario'];
$codigo_ficha=$_SESSION['codigo_ficha'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/programa_formacion".$id_usuario."_".$codigo_ficha.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
  
   echo'
		El archivo fue subido con éxito.
			
			
				<meta http-equiv="REFRESH" content="2;url=instructor.php">
			
		
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=instructor.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_instructor SET programa_formacion='$archivo_final' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
$update2="UPDATE tab_p_aprendiz SET programa_formacion='$archivo_final' WHERE codigo_ficha=$codigo_ficha;";
$res2=pg_query($update2) or die ('Error. Intente de nuevo'. pg_last_error());
}

if (isset($_POST['proyecto_formativo'])){
$id_usuario=$_SESSION['id_usuario'];
$codigo_ficha=$_SESSION['codigo_ficha'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/proyecto_formativo".$id_usuario."_".$codigo_ficha.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
  
   echo'
		El archivo fue subido con éxito.
			
			
				<meta http-equiv="REFRESH" content="2;url=instructor.php">
			
		
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=instructor.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_instructor SET proyecto_formativo='$archivo_final' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
$update2="UPDATE tab_p_aprendiz SET proyecto_formativo='$archivo_final' WHERE codigo_ficha=$codigo_ficha;";
$res2=pg_query($update2) or die ('Error. Intente de nuevo'. pg_last_error());
}

if (isset($_POST['hoja_vida'])){
$id_usuario=$_SESSION['id_usuario'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/hojadevida".$id_usuario.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
  
   echo'
		El archivo fue subido con éxito.
			
			
				<meta http-equiv="REFRESH" content="2;url=aprendiz.php">
			
		
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=aprendiz.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_aprendiz SET hoja_vida='$archivo_final' WHERE id_usuario=$id_usuario;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());

}

if (isset($_POST['evidencias'])){
$id_usuario=$_SESSION['id_usuario'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/evidencias".$id_usuario.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
   print "El archivo fue subido con éxito.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="10;url=aprendiz.php">
			</head>
		</html>
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="10;url=aprendiz.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_aprendiz SET evidencias_aprendizaje='$archivo_final' WHERE id_usuario=$id_usuario;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());

}

if (isset($_POST['productiva'])){
$id_usuario=$_SESSION['id_usuario'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/productiva".$id_usuario.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
   print "El archivo fue subido con éxito.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="10;url=aprendiz.php">
			</head>
		</html>
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="10;url=aprendiz.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_aprendiz SET planeacion_productiva='$archivo_final' WHERE id_usuario=$id_usuario;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());

}

if (isset($_POST['mejoramiento'])){
$id_usuario=$_SESSION['id_usuario'];
$archivo_origen = $_FILES['uploadedfile']['tmp_name']; 
$archivo_final = "documentos/mejoramiento".$id_usuario.".pdf"; 
if(move_uploaded_file($archivo_origen, $archivo_final)){ 
   print "El archivo fue subido con éxito.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="10;url=aprendiz.php">
			</head>
		</html>
		';

}else{ 
   print "Error al intentar subir el archivo.";
   echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="10;url=aprendiz.php">
			</head>
		</html>
		'; 
}

$update="UPDATE tab_p_aprendiz SET plan_mejoramiento='$archivo_final' WHERE id_usuario=$id_usuario;";
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());

}

pg_close($con);

?>