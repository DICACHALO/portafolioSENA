<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
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
        
    </div>
 
 <div class='container'>

 <?php
        if (isset($_POST['guardarficha'])){
          include('conectar.php');
          $sql="INSERT INTO tab_ficha (codigo_ficha,fecha_inicio,fecha_fin,id_jornada,id_tipo_formacion,id_programa,id_centro) values ('$_REQUEST[codigo_ficha]','$_REQUEST[fecha_inicio]','$_REQUEST[fecha_fin]','$_REQUEST[id_jornada]','$_REQUEST[id_tipo_formacion]','$_REQUEST[id_programa]','$_REQUEST[id_centro]');"; 
          //Consulta para insertar la nueva información
          $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
          //echo "<meta http-equiv='REFRESH' content='0;url=fichas.php'>";
          pg_close($con);
          echo "El registro se ha realizado con éxito.";
          //Retorna al formulario inicial
          echo'
          <html>
          <head>
          <meta http-equiv="REFRESH" content="1;url=fichas.php">
          </head>
          </html>
          ';
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