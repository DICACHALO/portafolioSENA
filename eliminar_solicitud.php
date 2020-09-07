<?php 

include("conectar.php");

$id_usuario= $_GET['id_usuario'];
$codigo_ficha = $_GET['codigo_ficha'];
$id_rol = $_GET['id_rol'];



if ($id_rol=4){
$sql="DELETE FROM tab_usuario_perfil WHERE id_usuario='$id_usuario' and codigo_ficha='$codigo_ficha' and id_rol='$id_rol';"; 
$resultado=pg_query($sql) or die ('Error. Intente de nuevo'. pg_last_error());

$sql2="DELETE FROM tab_p_instructor WHERE id_usuario='$id_usuario' and codigo_ficha='$codigo_ficha';"; 
$resultado2=pg_query($sql2) or die ('Error. Intente de nuevo'. pg_last_error());}

if ($id_rol=5) {

	$sql="DELETE FROM tab_usuario_perfil WHERE id_usuario='$id_usuario' and codigo_ficha='$codigo_ficha' and id_rol='$id_rol';"; 
	$resultado=pg_query($sql) or die ('Error. Intente de nuevo'. pg_last_error());

	$sql2="DELETE FROM tab_p_aprendiz WHERE id_usuario='$id_usuario' and codigo_ficha='$codigo_ficha';"; 
	$resultado2=pg_query($sql2) or die ('Error. Intente de nuevo'. pg_last_error());
	echo '<meta http-equiv="REFRESH" content="0;url=configuracion.php">';
}



       					
pg_close($con); 
?>