<?php
@session_start();
include("conectar.php");
$id_usuario=$_SESSION['id_usuario'];

$archivo_origen = $_FILES['uploadedfile']['tmp_name'];

$archivo_final = "uploads/fotoperfil".$id_usuario.".jpg";
 

$consulta ="UPDATE tab_usuario SET foto='$archivo_final' WHERE id_usuario=$id_usuario;";
$respuesta= pg_query($consulta) or die ('Error. Intente de nuevo'.pg_last_error($con));

if(move_uploaded_file($archivo_origen, $archivo_final)){ 
   print "El archivo fue subido con éxito.";
   echo '<meta http-equiv="REFRESH" content="1;url=configuracion.php">'; 
}else{ 
   print "Error al intentar subir el archivo.";

}

pg_close($con);

?>

	

