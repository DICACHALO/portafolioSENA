<?php // Este php permite visualizar los archivos en pdf que son almacenados en la base de datos
@session_start(); // Comienza una sesión
include("conectar.php"); //Conecta con la base de datos

//Archivos del instructor

//Ver programa de formación (instructor)

if (isset($_POST['programa_formacion'])){
		$id_usuario=$_SESSION['id_usuario'];
		$consulta ="SELECT programa_formacion FROM tab_p_instructor WHERE id_usuario=$id_usuario";
		$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
		$comprobar= pg_fetch_result($resultado, 0, 0);

		if (empty($comprobar)){ echo "Aún no ha subido ningún archivo.";
			echo'
		          <html>
		          <head>
		          <meta http-equiv="REFRESH" content="4;url=instructor.php">
		          </head>
		          </html>
		          ';
							}
		else {					
			while ($fila = pg_fetch_array($resultado)){		
				$fichero = "/xampp/htdocs/portafolio/".$fila[0];
				header('Content-Type: application/pdf');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				ob_clean();
				flush();
				readfile($fichero);
				}
		}
}

//Fin ver programa de formación

//Ver listado de aprendices (instructor)


if (isset($_POST['listado_aprendices'])){
		$id_usuario=$_SESSION['id_usuario'];
		$consulta ="SELECT listado_aprendices FROM tab_p_instructor WHERE id_usuario=$id_usuario";
		$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
		$comprobar= pg_fetch_result($resultado, 0, 0);

		if (empty($comprobar)){ echo "Aún no ha subido ningún archivo.";
			echo'
		          <html>
		          <head>
		          <meta http-equiv="REFRESH" content="4;url=instructor.php">
		          </head>
		          </html>
		          ';
							}
		else {
			while ($fila = pg_fetch_array($resultado)){		
				$fichero = "/xampp/htdocs/portafolio/".$fila[0];
				header('Content-Type: application/pdf');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				ob_clean();
				flush();
				readfile($fichero);
				}
		}
}

//Fin ver listado de aprendices (instructor)

//Ver horario del instructor

if (isset($_POST['horario'])){

$id_usuario=$_SESSION['id_usuario'];
$consulta ="SELECT horario_instructor FROM tab_p_instructor WHERE id_usuario=$id_usuario";
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
$comprobar= pg_fetch_result($resultado, 0, 0);

	if (empty($comprobar)){ echo "Aún no ha subido ningún archivo.";
		echo'
	          <html>
	          <head>
	          <meta http-equiv="REFRESH" content="4;url=instructor.php">
	          </head>
	          </html>
	          ';
						}
	else {
	while ($fila = pg_fetch_array($resultado)){				
		$fichero = "/xampp/htdocs/portafolio/".$fila[0];
		header('Content-Type: application/pdf');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		ob_clean();
		flush();
		readfile($fichero);
		}
	}
}

//Fin ver horario del instructor

//Ver proyecto formativo (instructor)

if (isset($_POST['proyecto_formativo'])){
	$id_usuario=$_SESSION['id_usuario'];
	$consulta ="SELECT proyecto_formativo FROM tab_p_instructor WHERE id_usuario=$id_usuario";
	$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
	$comprobar= pg_fetch_result($resultado, 0, 0);

		if (empty($comprobar)){ echo "Aún no ha subido ningún archivo.";
			echo'
		          <html>
		          <head>
		          <meta http-equiv="REFRESH" content="4;url=instructor.php">
		          </head>
		          </html>
		          ';
							}
		else {
				while ($fila = pg_fetch_array($resultado)){			
						$fichero = "/xampp/htdocs/portafolio/".$fila[0];
						header('Content-Type: application/pdf');
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						ob_clean();
						flush();
						readfile($fichero);
						}
			}
}

//Fin ver proyecto formativo (instructor)

//INICIA VER ARCHIVOS DEL APRENDIZ

if (isset($_POST['programa_formacion_aprendiz'])){

$id_usuario=$_SESSION['id_usuario'];
$consulta ="SELECT programa_formacion FROM tab_p_aprendiz WHERE id_usuario=$id_usuario";
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
$comprobar= pg_fetch_result($resultado, 0, 0);

if (empty($comprobar)){ 
		$id_usuario=$_SESSION['id_usuario'];
		$consulta2 ="SELECT DISTINCT a.programa_formacion FROM tab_p_instructor a, tab_p_aprendiz b WHERE a.codigo_ficha=(SELECT codigo_ficha FROM tab_p_aprendiz WHERE id_usuario=$id_usuario);";
		$resultado2 = pg_query($consulta2) or die ('Error. Intente de nuevo'. pg_last_error());
		$fila = pg_fetch_array($resultado2);
		$sql="UPDATE tab_p_aprendiz SET programa_formacion='$fila[0]' WHERE id_usuario=$id_usuario";
		$resultado3 = pg_query($sql) or die ('Error. Intente de nuevo'. pg_last_error());
			$comprobar2= pg_fetch_result($resultado2, 0, 0);
			if (empty($comprobar2))
				{echo "El instructor aún no ha enviado el programa de formación.";
					 echo'
          <html>
          <head>
          <meta http-equiv="REFRESH" content="4;url=aprendiz.php">
          </head>
          </html>
          ';
					}
			else {
			$fichero = "/xampp/htdocs/portafolio/".$fila[0];
						header('Content-Type: application/pdf');
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						ob_clean();
						flush();
						readfile($fichero);}
	}

 else { 
 while ($fila = pg_fetch_array($resultado)){
			
					$fichero = "/xampp/htdocs/portafolio/".$fila[0];
					header('Content-Type: application/pdf');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					ob_clean();
					flush();
					readfile($fichero);}
		} 			
			}


if (isset($_POST['proyecto_formativo_aprendiz'])){

$id_usuario=$_SESSION['id_usuario'];
$consulta ="SELECT proyecto_formativo FROM tab_p_aprendiz WHERE id_usuario=$id_usuario";
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
$comprobar= pg_fetch_result($resultado, 0, 0);

if (empty($comprobar)){ 
		$id_usuario=$_SESSION['id_usuario'];
		$consulta2 ="SELECT DISTINCT a.proyecto_formativo FROM tab_p_instructor a, tab_p_aprendiz b WHERE a.codigo_ficha=(SELECT codigo_ficha FROM tab_p_aprendiz WHERE id_usuario=$id_usuario);";
		$resultado2 = pg_query($consulta2) or die ('Error. Intente de nuevo'. pg_last_error());
		$fila = pg_fetch_array($resultado2);
		$sql="UPDATE tab_p_aprendiz SET proyecto_formativo='$fila[0]' WHERE id_usuario=$id_usuario";
		$resultado3 = pg_query($sql) or die ('Error. Intente de nuevo'. pg_last_error());
			$comprobar2= pg_fetch_result($resultado2, 0, 0);
			if (empty($comprobar2))
				{echo "El instructor aún no ha enviado el proyecto formativo.";
					 echo'
          <html>
          <head>
          <meta http-equiv="REFRESH" content="4;url=aprendiz.php">
          </head>
          </html>
          ';
					}
			else {
			$fichero = "/xampp/htdocs/portafolio/".$fila[0];
						header('Content-Type: application/pdf');
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						ob_clean();
						flush();
						readfile($fichero);}
	}

 else { 
 while ($fila = pg_fetch_array($resultado)){
			
					$fichero = "/xampp/htdocs/portafolio/".$fila[0];
					header('Content-Type: application/pdf');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					ob_clean();
					flush();
					readfile($fichero);}
		} 			
			}


if (isset($_POST['hoja_vida'])){

$id_usuario=$_SESSION['id_usuario'];
$consulta ="SELECT hoja_vida FROM tab_p_aprendiz WHERE id_usuario=$id_usuario";
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
$comprobar= pg_fetch_result($resultado, 0, 0);
if (empty($comprobar)){ echo "Aún no ha enviado su hoja de vida. Por favor, seleccione el archivo correspondiente.";
 	echo'
          <html>
          <head>
          <meta http-equiv="REFRESH" content="4;url=aprendiz.php">
          </head>
          </html>
          ';

}
else { 


			while ($fila = pg_fetch_array($resultado)){
			
$fichero = "/xampp/htdocs/portafolio/".$fila[0];
header('Content-Type: application/pdf');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
ob_clean();
flush();
readfile($fichero);
}
}
}

if (isset($_POST['productiva'])){

$id_usuario=$_SESSION['id_usuario'];
$consulta ="SELECT planeacion_productiva FROM tab_p_aprendiz WHERE id_usuario=$id_usuario";
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
			while ($fila = pg_fetch_array($resultado)){
			
$fichero = "/xampp/htdocs/portafolio/".$fila[0];
header('Content-Type: application/pdf');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
ob_clean();
flush();
readfile($fichero);
}

}
if (isset($_POST['mejoramiento'])){

$id_usuario=$_SESSION['id_usuario'];
$consulta ="SELECT plan_mejoramiento FROM tab_p_aprendiz WHERE id_usuario=$id_usuario";
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
			while ($fila = pg_fetch_array($resultado)){
			
$fichero = "/xampp/htdocs/portafolio/".$fila[0];
header('Content-Type: application/pdf');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
ob_clean();
flush();
readfile($fichero);
}

}
pg_close($con);

?>