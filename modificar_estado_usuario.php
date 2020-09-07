<?php 
// Este archivo identifica si el usuario está activo o no y actualiza a su estado contrario según se requiera por el administrador del sistema



include("conectar.php");

$id_usuario= $_GET['id_usuario'];
$ind_estado = $_GET['ind_estado'];

if ($ind_estado==='t'){
$update="UPDATE tab_usuario SET ind_estado='FALSE' WHERE id_usuario=$id_usuario;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=admin.php#gestiona_usuarios">';
}
else {
$update="UPDATE tab_usuario SET ind_estado='TRUE' WHERE id_usuario=$id_usuario;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=admin.php#gestiona_usuarios">';
}
      					
pg_close($con); 
?>