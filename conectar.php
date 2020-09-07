<?php
$con = pg_connect("host=localhost
					  port=5432 
					  dbname=portafolio
					  user=postgres 
					  password=postgresql1")
or die('No se ha podido conectar: ' . pg_last_error());
?>