<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>PORTAFOLIO SENA </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/layout2.css" rel="stylesheet" />
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >
 <div class="container">
    <div class="text-center">
        <img src="assets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
   <!-- PAGE CONTENT --> 
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4> EDITAR USUARIO </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                             <?php
                      
                      session_start();
                      include("conectar.php");
                      $id_usuario=$_SESSION['id_usuario'];
                      $nom_usuario = $_GET['nom_usuario'];
                      $apell_usuario = $_GET['apell_usuario'];
                      $celular = $_GET['celular'];
                      $correo_electronico = $_GET['correo_electronico'];
                      $pregunta = $_GET['pregunta'];
                      $respuesta = $_GET['respuesta'];
                      //Muestra la tabla
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                         <colgroup>
                           <col />
                           <col />
                           <col />
                           <col />
                           <col />
                           
                        </colgroup>
                        <thead></thead>

                        <tbody>
                        ";
                      
                      echo "
                      <form action='' method='post'>
                      <tr>
                      
                          <th scope='row'>CEDULA</th>
                          <td><input type='text' size='30' name='id_usuario' readonly value='$id_usuario'></td></tr>
                          <tr>
                          <th scope='row'>NOMBRE</th>
                          <td><input type='text' size='30' name='nom_usuario' value='$nom_usuario'></td></tr>

                          <tr>
                          <th scope='row'>APELLIDO</th>
                          <td><input type='text' size='30' name='apell_usuario' value='$apell_usuario'></td></tr>

                          <tr>
                          <th scope='row'>CELULAR</th>
                          <td><input type='text' size='30' name='celular' value='$celular'></td></tr>

                          <tr>
                          <th scope='row'>CORREO ELECTRONICO</th> 
                          <td><input type='text' size='30' name='correo_electronico' value='$correo_electronico'></td></tr>

                          <tr>
                           <tr>
                          <th scope='row'>PREGUNTA DE RECUPERACIÓN DE CONTRASEÑA</th> 
                          <td><input type='text' size='30' name='pregunta' value='$pregunta'></td></tr>

                          <tr>
                           <tr>
                          <th scope='row'>RESPUESTA</th> 
                          <td><input type='text' size='30' name='respuesta' value='$respuesta'></td></tr>

                          <tr>
                          </tbody>";
                      

                      echo "</table>";

           

					 if (isset($_POST['guardar'])){
                      $nom_usuario = $_POST['nom_usuario'];
                      $apell_usuario = $_POST['apell_usuario'];
                      $celular = $_POST['celular'];
                      $correo_electronico = $_POST['correo_electronico'];
                      $pregunta = $_POST['pregunta'];
                      $respuesta = $_POST['respuesta'];          
						$update="UPDATE tab_usuario SET nom_usuario='$nom_usuario', apell_usuario='$apell_usuario', celular='$celular', correo_electronico='$correo_electronico', pregunta='$pregunta', respuesta='$respuesta' WHERE id_usuario=$id_usuario;"; 
						$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
						echo '<meta http-equiv="REFRESH" content="0;url=configuracion.php">';
            } 

                      pg_close($con);
                      ?> 

                                            

                            </div></div>
                        </div>
                        <p align="center"> <input type='submit' name='guardar' value=Guardar class='btn btn-success btn-sm'></form>

                        <a href="configuracion.php">

               <button type="button" class="btn btn-primary btn-sm">
                <span class="icon-reply"></span>
              </button></a></p>
               <div class="panel-body">                
        <div class="demo-container">
          <div id="placeholderStack" class="demo-placeholder">  
            <form action="fotoperfil.php" method="post" enctype="multipart/form-data"> 
            <p><b>CAMBIAR FOTO DE PERFIL:</b></p>
              <br> 
              <input name="uploadedfile" type="file"> 
              <br> 
              <input type="submit" value="Enviar"> 
            </form>  
        </div></div></div></div></div></div>
      



	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
      <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>