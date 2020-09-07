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
                include("conectar.php");
                      @session_start();
                      $id_usuario=$_SESSION['id_usuario'];
                      if(!isset($_SESSION['id_usuario'])){ Header("Location:index.html");} //si el ususario no ha ingresado correctamente lo envia a iniciar sesión
                      $sql= "SELECT COUNT (id_rol) AS ROLES FROM tab_usuario_perfil WHERE id_usuario=$id_usuario and id_rol=2";
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


               <br/>
              <div class="media-body">
                <h6 class="media-heading"> Usuario: </h6>
                    <ul class="list-unstyled user-info"></ul>

              <div class="media-body"> 
                    <ul id="menu" class="collapse">               
                        <li class="panel">
                        <a href="home.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <h6 class="media-heading">
<?php //Esta sección es para mostrar el nombre del usuario que se ha logueado en ese momento
@session_start(); //Comienza una sesión
include("conectar.php"); //Conecta con la base de datos
$id_usuario=$_SESSION['id_usuario'];
$consulta = "SELECT nom_usuario, apell_usuario FROM tab_usuario WHERE id_usuario=$id_usuario"; //Hace una consulta con la base de datos
$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
while ($fila = pg_fetch_array($resultado)){
echo $fila[0]. " ".$fila[1];}

?> 
                        </h6>
                        </a>
                        </li>
                    </ul>
              </div>
            </div>
          </div>
        </div>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <div id="content">     
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> PERFIL DE CALIDAD </h1>
                    </div>
                </div>
                  <hr/>                           

                 <!--  STACKING CHART  SECTION   -->
                <div class="row">
                   <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                            
                            </div>

                            <div class="panel-body">

                            <form action = " " method = "POST">
    <table class="table">
       
            <h3 class="text"> Ver portafolios de los instructores </h3>
            <tr>
            <td><label name="producto">Ficha:</label></td>
            <td><input type="number"  name="ficha"/></td>
            <td><button type="submit"  name="buscar" class="btn btn-default"><span class="glyphicon glyphicon-search fa-pulse "></span></button></td>
            <td><label name="producto">Cedula:</label></td>
            <td><input type="number"  name="cedula"/></td>
            <td><button type="submit" name="buscar1" class="btn btn-default"><span class="glyphicon glyphicon-search fa-pulse "></span></button></td>
            </form>
</table>

        
<?php
      if (isset($_POST['buscar'])){

                    @session_start(); //Comienza una sesión
                    include("conectar.php"); //Conecta con la base de datos
                    $id_usuario=$_SESSION['id_usuario'];
                    $ficha=$_POST["ficha"];
                    $busqueda=$_POST["buscar"];
                    $registro=pg_query("SELECT a.id_usuario,a.nom_usuario,a.apell_usuario,b.id_usuario,b.codigo_ficha, b.id_rol,c.nom_rol FROM tab_usuario a,tab_usuario_perfil b,tab_perfil c WHERE b.id_usuario=a.id_usuario and b.id_rol=4 and b.codigo_ficha=$ficha and c.id_rol=4;") or die ('La consulta fallo: ' . pg_last_error($con));
                    while ($reg=pg_fetch_array($registro))
                    {

    
   echo "
  <tbody>
    <tr>
      <th scope='row'></th>
      <hr>
      <td >
      <label name=''>Documento:</label>
      <input type='text' size='10' border='0' name='cedula2' value='".$reg['id_usuario']."'readonly'>
       <label name=''>Nombre:</label>
      <input type='text' size='50' border='0' name='nombre' value='".$reg['nom_usuario']." ".$reg['apell_usuario']. "'readonly'>  
     
     
     
     </td>
     <td>
     <a href='ver_portafolio_instructor.php?identificacion=".$reg['id_usuario']
             ."&nombre=".$reg['nom_usuario']."&apellido=".$reg['apell_usuario']."&ficha=".$ficha."'></td>
             <i class='icon-eye-open'></i>
             </a></td>
    </tr>
  </tbody>
</table>";
                    }
      }
                   
                    ?>


<?php
      if (isset($_POST['buscar1'])){

                    @session_start(); //Comienza una sesión
                    include("conectar.php"); //Conecta con la base de datos
                    $id_usuario=$_SESSION['id_usuario'];
                    $cedula=$_POST["cedula"];
                    $busqueda=$_POST["buscar1"];
                    $registro=pg_query("select a.id_usuario,a.nom_usuario,a.apell_usuario,b.id_usuario,b.id_rol,c.nom_rol, b.codigo_ficha from tab_usuario a,tab_usuario_perfil b,tab_perfil c where a.id_usuario=$cedula and b.id_usuario=$cedula and b.id_rol=4 and c.id_rol=4;") or die ('La consulta fallo: ' . pg_last_error($con));
                    while ($reg=pg_fetch_array($registro))
                    {

    
   echo "
  <tbody>
    <tr>
      <th scope='row'></th>
      <hr>
      <td >
      <label name=''>Documento:</label>
      <input type='text' size='10' border='0' name='cedula2' value='".$reg['id_usuario']."'readonly'>
       <label name=''>Nombre:</label>
      <input type='text' size='50' border='0' name='nombre' value='".$reg['nom_usuario']." ".$reg['apell_usuario']. "'readonly'> 
      <label name=''>Rol:</label>
      <input type='text' size='15' border='0' name='cedula2' value='".$reg['nom_rol']."'readonly'>
      <td>
     <a href='ver_portafolio_instructor.php?identificacion=".$reg['id_usuario']
             ."&nombre=".$reg['nom_usuario']."&apellido=".$reg['apell_usuario']."&ficha=".$reg['codigo_ficha']."'></td>
             <i class='icon-eye-open'></i>
             </a></td>    
     
    </tr>
  </tbody>
</table>";
                    }
      }
                    
                    ?>

                            <form action = " " method = "POST">
    <table class="table">
       
            <h3 class="text"> Ver portafolios de los aprendices </h3>
            <tr>
            <td><label name="producto">Ficha:</label></td>
            <td><input type="number"  name="ficha"/></td>
            <td><button type="submit"  name="buscar" class="btn btn-default"><span class="glyphicon glyphicon-search fa-pulse "></span></button></td>
            <td><label name="producto">Cedula:</label></td>
            <td><input type="number"  name="cedula"/></td>
            <td><button type="submit" name="buscar1" class="btn btn-default"><span class="glyphicon glyphicon-search fa-pulse "></span></button></td>
            </form>
</table>

        
<?php
      if (isset($_POST['buscar'])){

                    @session_start(); //Comienza una sesión
                    include("conectar.php"); //Conecta con la base de datos
                    $id_usuario=$_SESSION['id_usuario'];
                    $ficha=$_POST["ficha"];
                    $busqueda=$_POST["buscar"];
                    $registro=pg_query("SELECT a.id_usuario,a.nom_usuario,a.apell_usuario,b.id_usuario,b.codigo_ficha FROM tab_usuario a,tab_usuario_perfil b WHERE b.id_usuario=a.id_usuario and b.id_rol=5 and b.codigo_ficha= $ficha;") or die ('La consulta fallo: ' . pg_last_error($con));
                    while ($reg=pg_fetch_array($registro))
                    {

    
   echo "
  <tbody>
    <tr>
      <th scope='row'></th>
      <hr>
      <td >
      <label name=''>Documento:</label>
      <input type='text' size='10' border='0' name='cedula2' value='".$reg['id_usuario']."'readonly'>
       <label name=''>Nombre:</label>
      <input type='text' size='50' border='0' name='nombre' value='".$reg['nom_usuario']." ".$reg['apell_usuario']. "'readonly'> 
     </td>
     <td>
     <a href='ver_portafolio_aprendiz.php?identificacion=".$reg['id_usuario']
             ."&nombre=".$reg['nom_usuario']."&apellido=".$reg['apell_usuario']."&ficha=".$ficha."'></td>
             <i class='icon-eye-open'></i>
             </a></td>
    </tr>
  </tbody>
</table>";
                    }
      }
                   
                    ?>


<?php
      if (isset($_POST['buscar1'])){

                    @session_start(); //Comienza una sesión
                    include("conectar.php"); //Conecta con la base de datos
                    $id_usuario=$_SESSION['id_usuario'];
                    $cedula=$_POST["cedula"];
                    $busqueda=$_POST["buscar1"];
                    $registro=pg_query("select a.id_usuario,a.nom_usuario,a.apell_usuario,b.id_usuario,b.id_rol,c.nom_rol,b.codigo_ficha from tab_usuario a,tab_usuario_perfil b,tab_perfil c where a.id_usuario=$cedula and b.id_usuario=$cedula and b.id_rol=5 and c.id_rol=5 ;") or die ('La consulta fallo: ' . pg_last_error($con));
                    while ($reg=pg_fetch_array($registro))
                    {

    
   echo "
  <tbody>
    <tr>
      <th scope='row'></th>
      <hr>
      <td >
      <label name=''>Documento:</label>
      <input type='text' size='10' border='0' name='cedula2' value='".$reg['id_usuario']."'readonly'>
       <label name=''>Nombre:</label>
      <input type='text' size='50' border='0' name='nombre' value='".$reg['nom_usuario']." ".$reg['apell_usuario']. "'readonly'>
      <label name=''>Rol:</label>
      <input type='text' size='10' border='0' name='cedula2' value='".$reg['nom_rol']."'readonly'>  
     </td>
     <td>
     <a href='ver_portafolio_aprendiz.php?identificacion=".$reg['id_usuario']
             ."&nombre=".$reg['nom_usuario']."&apellido=".$reg['apell_usuario']."&ficha=".$reg['codigo_ficha']."'></td>
             <i class='icon-eye-open'></i>
             </a></td>
    </tr>
  </tbody>
</table>";
                    }
      }
                    pg_close($con);

                    
                    ?>


                              

           		
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