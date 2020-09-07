<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->

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
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
      <div class="text-center">
          <img src="assets/img/logo.png" id="logoimg" alt=" Logo" />
      </div>
      <div class="tab-content">
          <div id="login" class="tab-pane active">
              <form class="form-signin" action="pass2.php" method="post" >
                  <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                      Actualizar contraseña
                  </p></br>
                  
                  <input type="number" name="id_usuario" class='form-control' placeholder="Ingrese su documento de identidad" />
                  <input type="password" name="clave" placeholder="Nueva contraseña" class="form-control" />
                  <input type="password" name="confirmar" placeholder="Vuelva a escribir la contraseña" class="form-control" />
                  <button class="btn text-muted text-center btn-danger" name="nuevapass" type="submit">GUARDAR</button>
              </form>

          </div>
       </div>

    </div>

<?php

if (isset($_POST['nuevapass']))
{
include ("conectar.php");

$id_usuario=$_POST['id_usuario'];
$psw = $_POST["clave"];
$psw2 = $_POST["confirmar"];
$enc =base64_encode($psw);
$enc2 =base64_encode($psw2);

$des = base64_decode($enc);
if($enc === $enc2)  
    { 
      $consulta="UPDATE tab_usuario SET clave='$enc' WHERE id_usuario=$id_usuario;";
    $respuesta= pg_query($consulta) or die ('Error. Intente de nuevo'.pg_last_error($dbconn));
        pg_close($con);   
        echo "<script>alert('El cambio de contraseña ha sido exitoso');
        </script>";
        echo'
    <html>
      <head>
        <meta http-equiv="REFRESH" content="1;url=index.html">
      </head>
    </html>
    ';
  }
else {
   echo"<script>alert('Las contraseñas no coinciden');
          </script>";
     echo'
    <html>
      <head>
        <meta http-equiv="REFRESH" content="0;url=pass.html">
      </head>
    </html>
    ';
   }
}


?>


	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
      <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
