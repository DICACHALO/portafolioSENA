<?php
//Obtiene la ruta
$ruta = dirname(__FILE__);

//se amolda el string de la ruta, a la función mkdir
$explode_ruta = explode("\\", $ruta);
$_ruta_ = implode("/", $explode_ruta);


if(isset($_POST["crear_directorio"]))
{
//nombre de la carpeta
$carpeta = $_POST["crear_directorio"];
//crea la carpeta en la ruta con permisos 0777
//también permite directorios anidados
$crear = mkdir($_ruta_."/".$carpeta, 0777, true);

if($crear)
{
echo "<center>
Carpeta/s $carpeta creada correctamente</center>
";
}
}


	/**
	* Funcion que muestra la estructura de carpetas a partir de la ruta dada.
	*/
	function obtener_estructura_directorios($ruta){
		
		// Se comprueba que realmente sea la ruta de un directorio
		if (is_dir($ruta)){
			// Abre un gestor de directorios para la ruta indicada
			$gestor = opendir($ruta);
			echo "<ul>";
 
			// Recorre todos los elementos del directorio
			while (($archivo = readdir($gestor)) !== false)  {
				
				$ruta_completa = $ruta . "/" . $archivo;
 
				// Se muestran todos los archivos y carpetas excepto "." y ".."
				if ($archivo != "." && $archivo != "..") {
					// Si es un directorio se recorre recursivamente
					if (is_dir($ruta_completa)) {
						echo "<li>" . $archivo . "</li>";
						obtener_estructura_directorios($ruta_completa);
					} else {
						echo "<li>" . $archivo . "</li>";
					}
				}
			}
			// Cierra el gestor de directorios
			closedir($gestor);
			echo "</ul>";
		} else {
			echo "No es una ruta de directorio valida<br/>";
		}
		
	}
?>
<html>
<head>
<title>Crear carpeta</title>
</head>
<body>
<center>
<h1>CREAR CARPETAS CON PHP </h1>
<h3>
Creación de carpetas</h3>
<form method="post" action="">
<input type="text" name="crear_directorio"> 
<br>
¡ Para directorios anidados ... carpeta_1/carpeta_2 !
<br>
<input type="submit" value="CREAR DIRECTORIO">
</form>
</center>
</body>
</html>