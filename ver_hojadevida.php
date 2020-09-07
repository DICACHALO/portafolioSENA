<?php // Este php permite visualizar los archivos en pdf que son almacenados en la base de datos
include("conectar.php"); //Conecta con la base de datos

//Ver listado de aprendices (instructor)

		$id=$_GET['id'];
		$ficha=$_GET['ficha'];
		$consulta ="SELECT hoja_vida FROM tab_p_aprendiz WHERE id_usuario=$id and codigo_ficha=$ficha";
		$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
		$comprobar= pg_fetch_result($resultado, 0, 0);

		if (empty($comprobar)){ echo "Aún no ha subido ningún archivo.";
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

pg_close($con);

?>