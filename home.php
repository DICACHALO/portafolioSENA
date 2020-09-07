<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
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
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
                    <a href="index.html" class="navbar-brand"><img src="assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right"></ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->

        <!-- MENU SECTION -->
      <div id="left" >
        <div class="media user-media well-small">
                <br>
                <?php
					  @session_start();
                      include("conectar.php");

require_once('functions.php');
noCache();


                      $id_usuario=$_SESSION['id_usuario'];
                      if(!isset($_SESSION['id_usuario'])){ 
                            Header("Location:index.html"); //si el ususario no esta logeado  lo envia al index
                        }
                      $consulta = "SELECT foto FROM tab_usuario WHERE id_usuario=$id_usuario";
                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      while ($fila = pg_fetch_array($resultado)){
                     
                      echo "<img class='media-object img-thumbnail user-img' alt='User Picture' src='".$fila[0]."''>";
                      }
                                          
                      pg_close($con);

                        ?>


                <br />
                <div class="media-body">
                    <h6 class="media-heading"> Usuario: </h6>
                    <ul class="list-unstyled user-info">
                    </ul>
  

<div class="media-body">
<ul id="menu" class="collapse">               
<li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">

<h6 class="media-heading">
                   <?php
            @session_start();
            include("conectar.php");
            $id_usuario=$_SESSION['id_usuario'];
            $consulta = "SELECT nom_usuario, apell_usuario FROM tab_usuario WHERE id_usuario=$id_usuario";
            $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
            while ($fila = pg_fetch_array($resultado)){
            echo $fila[0]. " ".$fila[1];}
            pg_close($con);
            ?> 
                    </h6></a></li></ul> </br>

<?php
                    	@session_start();
                    	include("conectar.php");
                    	$id_usuario=$_SESSION['id_usuario'];
                    	$consulta = "SELECT DISTINCT a.id_usuario, b.nom_rol, a.id_rol FROM tab_usuario_perfil a, tab_perfil b WHERE a.id_usuario=$id_usuario AND a.id_rol=b.id_rol and a.ind_estado='t' ORDER BY 3";
                    	$resultado = pg_query($consulta) or die ('Error. Intente de nuevo'. pg_last_error());
                    	$numRows = pg_num_rows($resultado);
                    	if ($numRows==0) {echo "No tiene asignado ningún perfil. Solicítelo en el panel de CONFIGURACIÓN."; }
                    	else {
                    	
                    	echo "
                    		<table class='alt' border='0' align='center'>
                    		<tr>
                    		<th><center> </center></th>
                    		
                    		<th><center> </center></th>
                    		</tr>
                    		";
                    	while ($fila = pg_fetch_array($resultado)){
                    	echo "<tr><td><a href='validar.php?rol=".$fila[2]."'>
                    		  <i class='icon-signin'></i></a></td>";
                        echo "<td><a href='validar.php?rol=".$fila[2]."'>".$fila[1]."</a></td></tr>";

                    									  }	
                    	echo "</table><hr>";}
             
                        pg_close($con);
                    	?> 

              </a></li></ul></div>

                </div>
                <br />
           </div>

        </div>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <div id="content">     
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><center>Bienvenido</center></h1>
                    </div>
                </div>
                  <hr/>                           

                 <!--  SECCIÓN CENTRAL   -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">                   
                    	
                        </div>  
                    </div>
                  </div>                  
                </div>
                 <!--FIN SECCIÓN CENTRAL  -->
            </div>
        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
        <div id="right">
            <div class="well well-small">
            	<form action="configuracion.php">
                <button type="submit" name="config"class="btn btn-info btn-block">Configuración</button>
                </form>
                <br>
                <form action="pass.html">
                <button type="submit" name="pass"class="btn btn-info btn-block">Contraseña</button>         
                </form>
                <br>
                <form action="salir.php">
                <button type="submit" class="btn btn-success btn-block">Salir</button>
                </form>
            </div>
            
            </div>
        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
    <script src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>