<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
    <link rel="stylesheet" type="text/css" href="lib/sweetalert.css" />
    <script src="lib/sweetalert.min.js"></script>
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body>

 <div id="forgot" class="tab-pane">
            <form action="" method="POST" class="form-signin">
                
                <?php // Este archivo recupera la pregunta seguridad para cambiar la contraseña

if (isset($_POST['recuperar'])){
include("conectar.php");
$id_usuario = $_POST["id_usuario"]; //Numero de cedula del usuario 
$consulta ="SELECT id_usuario, pregunta FROM tab_usuario WHERE id_usuario=$id_usuario";
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
			while ($fila = pg_fetch_array($resultado)){
				echo "<p class='text-muted text-center btn-block btn btn-primary btn-rect'>Su pregunta de seguridad es: </p>
				<input type='' name='id_usuario' class='form-control' value='$fila[0]' style='display:none'/>
				<input type='text'  required='required' name='' class='form-control' value='$fila[1]'/>";
				echo "<input type='text'  required='required' name='rta' placeholder='Escriba aquí su respuesta' class='form-control' />
				 	<br /> 
                 	<button class='btn text-muted text-center btn-success' name='validar' type='submit'>Validar</button>
            </form> ";
}
}
if (isset($_POST['validar'])){
	include("conectar.php");
$rta=$_POST['rta'];
$id_usuario = $_POST['id_usuario']; //Numero de cedula del usuario
$consulta2 ="SELECT respuesta, id_usuario FROM tab_usuario WHERE id_usuario=$id_usuario";
$resultado2 = pg_query($consulta2)or die ('Error. Intente de nuevo'. pg_last_error());
$fila = pg_fetch_array($resultado2);
$id_usuario=$fila['id_usuario'];

if ($rta===$fila['respuesta']) {
	echo"<script>alert('La respuesta es correcta. Cambie su contraseña.');
          </script>";
           echo"
	<html>
		<head>
			<meta http-equiv='REFRESH' content='0;url=pass2.php'>
		</head>
	</html>
	";
         
         
}
else { echo"<script>alert('Las respuestas no coinciden. Por favor, intentelo de nuevo. Si presenta inconvenientes, envie un correo al administrador.');
          </script> ";

	echo"
	<html>
		<head>
			<meta http-equiv='REFRESH' content='0;url=index.html'>
		</head>
	</html>
	";}
}

?>
				
        </div>


	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
      <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>