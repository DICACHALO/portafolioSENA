<?php 
@session_start();
include("conectar.php");
$rol = $_GET['rol'];
switch($rol){
case "1":{header("Location: admin.php");}
break;
case "2":{header("Location: calidad.php");}
break;
case "3":{header("Location: coordinador.php");}
break;
case "4":{header("Location: instructor.php");}
break;
case "5":{header("Location: aprendiz.php");}
break;
}
?>