<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>PORTAFOLIO SENA APRENDIZ</title>
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

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
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
                include("conectar.php");
                      @session_start();
                      $id_usuario=$_SESSION['id_usuario'];
                      if(!isset($_SESSION['id_usuario'])){ Header("Location:index.html");} //si el ususario no ha ingresado correctamente lo envia a iniciar sesión
                      $sql= "SELECT COUNT (id_rol) AS ROLES FROM tab_usuario_perfil WHERE id_usuario=$id_usuario and id_rol=5";
                      $resultado = pg_query($sql)or die ('Error. Intente de nuevo'. pg_last_error());
                      $contados = pg_fetch_result($resultado,0,0);
                      
                      $consulta = "SELECT foto FROM tab_usuario WHERE id_usuario=$id_usuario";
                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      while ($fila = pg_fetch_array($resultado)){
                     
                      echo "<img class='media-object img-thumbnail user-img' alt='User Picture' src='".$fila[0]."''>";
                      }
                      if($contados==0 or $id_usuario=0 )
                       {require("salir.php");}                    
                      pg_close($con);

                        ?>


                <br />
                <div class="media-body">
                    <h6 class="media-heading">
                    USUARIO: </h6>
                    <ul class="list-unstyled user-info">
                    </ul>
  

<div class="media-body"> 
<ul id="menu" class="collapse">               
<li class="panel">
                    <a href="home.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">

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
                        <h1> PERFIL DEL APRENDIZ </h1>
                    </div>
                </div>
                  <hr/>                           

                 <!--  STACKING CHART  SECTION   -->
                <div class="row">
                   <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                            <div class="table-responsive">
                             <?php
                      @session_start();
                      include("conectar.php");
                      $id_usuario=$_SESSION['id_usuario'];

                      
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <caption></caption>
                        <colgroup>
                           <col />
                           <col />
                           <col />
                        </colgroup>
                        <thead>
                        <tr>
                        <th><center> PORTAFOLIO DEL APRENDIZ</center></th>
                        <th><center> ABRIR </center></th>
                        <th><center> MODIFICAR</center></th>
                        <th><center> </center></th>
                        </tr>
                        </thead>
                       
        <tbody>
           <tr>
             <th scope='row'>HOJA DE VIDA</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='hoja_vida' type='submit'><i class='icon-eye-open'></i></button>
 
</form>





             </td>
             <td>
             <form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
                        <input name='uploadedfile' type='file'> 
                        
                        <input type='submit' class='' name='hoja_vida' value='Enviar'> 
                        </form>  
 
                        </td>
             <td>



             </td>
           </tr>
           <tr>
             <th scope='row'>PROGRAMA DE FORMACIÓN</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='programa_formacion_aprendiz' type='submit'><i class='icon-eye-open'></i></button>
 
</form>

             </td>
             <td>
             </td>
             <td></td>
           </tr>
            <tr>
             <th scope='row'>PROYECTO FORMATIVO</th>
             <td>

                <form action='archivo.php' method='post'>
  
  <button class='btn' name='proyecto_formativo_aprendiz' type='submit'><i class='icon-eye-open'></i></button>
 
</form>
             </td>
             <td></td>
             <td></td>
           </tr>
            <tr>
             <th scope='row'>PLANEACIÓN PEDAGÓGICA</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='programa_formacion_aprendiz' type='submit'><i class='icon-eye-open'></i></button>
 
</form>
             </td>
             <td>
<form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
                        <input name='uploadedfile' type='file'> 
                        
                        <input type='submit' class='' name='hoja_vida' value='Enviar'> 
                        </form> 
             </td>
             <td></td>
           </tr>
            <tr>
             <th scope='row'>GUIAS DE APRENDIZAJE</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='proyecto_formativo_aprendiz' type='submit'><i class='icon-folder-open'></i></button>
 
</form>
             </td>
             <td></td>
             <td>

             </td>
           </tr>
            <tr>
             <th scope='row'>PLANEACION ETAPA LECTIVA</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='programa_formacion_aprendiz' type='submit'><i class='icon-eye-open'></i></button>
 
</form>
             </td>
             <td>
<form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
                        <input name='uploadedfile' type='file'> 
                        
                        <input type='submit' class='' name='hoja_vida' value='Enviar'> 
                        </form> 
             </td>
             <td></td>
           </tr>
            <tr>
             <th scope='row'>EVIDENCIAS DE APRENDIZAJE</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='proyecto_formativo_aprendiz' type='submit'><i class='icon-folder-open'></i></button>
 
</form>

             </td>
             <td>
<form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
                        <input name='uploadedfile' type='file'> 
                        
                        <input type='submit' name='evidencias' value='Enviar'> 
                        </form>  
             </td>
             <td></td>
           </tr>
            <tr>
             <th scope='row'>PLANEACIÓN ETAPA PRODUCTIVA</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='productiva' type='submit'><i class='icon-eye-open'></i></button>
 
</form>


             </td>
             <td>
<form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
                        <input name='uploadedfile' type='file'> 
                        
                        <input type='submit'name='productiva' value='Enviar'> 
                        </form>  

             </td>
             <td></td>
           </tr>
            <tr>
             <th scope='row'>PLAN DE MEJORAMIENTO</th>
             <td>
<form action='archivo.php' method='post'>
  
  <button class='btn' name='mejoramiento' type='submit'><i class='icon-eye-open'></i></button>
 
</form>

             </td>
             <td>
<form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
                        <input name='uploadedfile' type='file'> 
                        
                        <input type='submit' name='mejoramiento' value='Enviar'> 
                        </form>  

             </td>
             <td></td>
           </tr>
        </tbody>                
 </table><hr>";

$orden="SELECT comentarios FROM tab_p_aprendiz WHERE id_usuario=$id_usuario"; // Realizando una consulta SQL
$resultado = pg_query($orden) or die ('Error. Intente de nuevo'. pg_last_error());
 while ($fila = pg_fetch_array($resultado)){
                    echo "Comentarios al portafolio: ";
                echo $fila[0];
}
                      ?>
                      
                                          
                     

                            </div>
                            </div>

            
                            </div>
                    </div>                  
                </div>
                 <!--END STACKING CHART SCETION  -->
            </div>
        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
        <div id="right">
            <div class="well well-small">
                <form action="home.php"><button class="btn btn-primary btn-block">MENÚ PRINCIPAL</button></form><br>
                <form action="salir.php"><button class="btn btn-success btn-block">SALIR</button></form>
            </div>
            
            </div>
        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p></p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>
