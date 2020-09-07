<?php 

include("conectar.php");

$id_usuario= $_GET['id_usuario'];
$codigo_ficha = $_GET['codigo_ficha'];
$id_rol = $_GET['id_rol'];
$ind_estado = $_GET['ind_estado'];

if ($ind_estado==='t'){
$update="UPDATE tab_usuario_perfil SET ind_estado='FALSE' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha and id_rol=$id_rol;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=admin.php">';


}
else {
$update="UPDATE tab_usuario_perfil SET ind_estado='TRUE' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha and id_rol=$id_rol;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=admin.php">';

}


        					
pg_close($con); 
?>