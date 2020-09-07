<?php 

include("conectar.php");

  $codigo_tramite = $_GET['codigo_tramite'];
  $codigo_ficha = $_GET['codigo_ficha'];
  $tipo_tramite = $_GET['tipo_tramite'];
  $descripcion = $_GET['descripcion'];
  $fecha = $_GET['fecha'];
  $ind_estado = $_GET['estado'];
  $id_usuario= $_GET['aprendiz'];

if ($ind_estado==='t'){
$update="UPDATE tab_tramite SET ind_estado='FALSE' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=registrar_tramite.php">';


}
else {
$update="UPDATE tab_tramite SET ind_estado='TRUE' WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=registrar_tramite.php">';

}
                  
pg_close($con); 
?>