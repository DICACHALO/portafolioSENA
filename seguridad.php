<?php
include ('verificar.php');
session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0); 
if ( is_session_started() === FALSE ) 
	session_start();
//continuar una sesion iniciada
	session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0); 
if (isset($_SESSION['usuario']))
	{return true;}
 header("Location:../index.html");
?>