<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="UTF-8" />
  <title> PORTAFOLIO SENA </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

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
                      $sql= "SELECT COUNT (id_rol) AS ROLES FROM tab_usuario_perfil WHERE id_usuario=$id_usuario and id_rol=4";
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
                        <h3> Perfil del instructor </h3>
                    </div>
                </div><hr/>                           
                 <!--  STACKING CHART  SECTION   -->
                <div class="row">
                   <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                             <div class="table-responsive">
<?php //Este php es para identificar la ficha con la cual el instructor desea gestionar su portafolio
@session_start(); //Comienza una sesión
include("conectar.php"); //Conecta con la base de datos
$id_usuario=$_SESSION['id_usuario'];
//El instructor debe seleccionar un codigo de ficha para acceder al portafolio
  echo "<form action='' method='post' ><label>FICHA:</label>";
  $orden="SELECT codigo_ficha FROM tab_usuario_perfil WHERE id_usuario=$id_usuario and id_rol=4 ORDER BY 1;"; // Realizando una consulta SQL
  if($consulta=pg_query($orden))
     {echo '<select required name="codigo_ficha" id="codigo_ficha" class="form-control">
            <option selected="selected" value="">*** SELECCIONAR *** </option>';
            while($fila=pg_fetch_row($consulta)){ //Bucle para mostrar todos los registros
                   $codigo_ficha=$fila[0];
                   echo '<option value="'.$codigo_ficha.'">'.$codigo_ficha.'</option>';
                                                }
                   echo '</select><br>';
      }
  else{echo "Error al ejecutar la consulta contra la base de datos.";}
  echo "<button type='submit' class='btn btn-success btn-sm' name='programa_formacion' >Abrir</button></form></button><br>";
 //Fin Seccion selección de ficha

 //La siguiente sección es para mostrar el portafolio de la ficha que ha seleccionado el instructor                      
 if (isset($_POST['programa_formacion'])){
      $id_usuario=$_SESSION['id_usuario'];
      $codigo_ficha=$_POST['codigo_ficha']; 
      $consulta = "SELECT programa_formacion,listado_aprendices,horario_instructor,proyecto_formativo,planeacion_pedagogica,guias_aprendizaje,instrum_evaluacion,plan_lectiva,planeacion_productiva,plan_mejoramiento,reg_inasistencias,comentarios FROM tab_p_instructor WHERE id_usuario=$id_usuario and codigo_ficha=$codigo_ficha";
      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
      //Desde aquí se muestra la tabla portafolio del instructor de la ficha seleccionada
      echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
            <caption></caption>
            <colgroup>
            <col/>
            <col/>
            <col />
            </colgroup>
            <thead>
            <tr>
            <th><center> PORTAFOLIO DE LA FICHA ".$codigo_ficha."</center></th>
            <th><center> ABRIR </center></th>
            <th><center> MODIFICAR</center></th>
            <th><center> </center></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <th scope='row'> PROGRAMA DE FORMACIÓN </th>
            <td>
            <form action='archivo.php' method='post'>
            <button class='btn' name='programa_formacion' type='submit'><i class='icon-eye-open'></i></button></form>
            </td>
            <td>
            <form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
            <label> Agregue un archivo con extensión .pdf </label>
            <input name='uploadedfile' type='file' class='btn btn-success btn-line'> <br>
            <input type='submit' class='btn btn-success btn-sm' name='programa_formacion' value='Enviar'> 
            </form>  
            </td>
            <td>
            </td>
            </tr>
            <tr>
            <th scope='row'>LISTADO DE APRENDICES</th>
            <td>
            <form action='archivo.php' method='post'>
            <button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></form>
            </td>
            <td>
            <form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
            <label> Agregue un archivo con extensión .pdf </label>
            <input name='uploadedfile' type='file' class='btn btn-success btn-line'> <br>
            <input type='submit' class='btn btn-success btn-sm' name='listado_aprendices' value='Enviar'> 
            </form> 
            </td>
            <td></td>
            </tr>
            <tr>
            <th scope='row'>HORARIO</th>
            <td>
            <form action='archivo.php' method='post'>
            <button class='btn' name='horario' type='submit'><i class='icon-eye-open'></i></button></form>  
            </td>
            <td>
            <form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
            <label> Agregue un archivo con extensión .pdf </label>
            <input name='uploadedfile' type='file' class='btn btn-success btn-line'> <br>
            <input type='submit' class='btn btn-success btn-sm' name='horario' value='Enviar'> 
            </form> 
            </td>
            <td></td>
            </tr>
            <tr>
            <th scope='row'>PROYECTO FORMATIVO</th>
            <td>
            <form action='archivo.php' method='post'>
            <button class='btn' name='proyecto_formativo' type='submit'><i class='icon-eye-open'></i></button>
            </form>
            </td>
            <td>
            <form action='subearchivo.php' method='post' enctype='multipart/form-data'>
            <label> Agregue un archivo con extensión .pdf </label> 
            <input name='uploadedfile' type='file' class='btn btn-success btn-line'> <br>
            <input type='submit'  class='btn btn-success btn-sm' name='proyecto_formativo' value='Enviar'> 
            </form>
            </td>
            <td></td>
            </tr>
            <tr>
            <th scope='row'>PLANEACION PEDAGOGICA DEL PROYECTO FORMATIVO</th>
            <td>
<form action='archivo.php' method='post'>
            <button class='btn' name='mejoramiento' type='submit'><i class='icon-eye-open'></i></button>
            </form>
            </td>
            <td><form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
            <input name='uploadedfile' type='file'> 
            
            <input type='submit'name='productiva' value='Enviar'> 
            </form> </td>
            </tr>
            <tr>
            <th scope='row'>GUIAS DE APRENDIZAJE</th>
            <td><form action='archivo.php' method='post'>
            <button class='btn' name='proyecto_formativo' type='submit'><i class='icon-folder-open'></i></button>
            </form>

            </td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope='row'>INSTRUMENTOS DE EVALUACIÓN</th>
            <td>
            <form action='archivo.php' method='post'>
            <button class='btn' name='proyecto_formativo' type='submit'><i class='icon-folder-open'></i></button>
            </form>
            </td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope='row'>PLAN DE EVALUACIÓN Y SEGUIMIENTO ETAPA LECTIVA </th>
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
            <th scope='row'>PLANEACIÓN, SEGUIMIENTO Y EVALUACIÓN ETAPA PRODUCTIVA</th>
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
            <tr>
            <th scope='row'>PLAN DE MEJORAMIENTO / PLAN DE ACTIVIDADES COMPLEMENTARIA </th>
            <td>
<form action='archivo.php' method='post'>
            <button class='btn' name='mejoramiento' type='submit'><i class='icon-eye-open'></i></button>
            </form>
            </td>
            <td><form action='subearchivo.php' method='post' enctype='multipart/form-data'> 
            <input name='uploadedfile' type='file'> 
            <input type='submit' name='mejoramiento' value='Enviar'> 
            </form></td>
            </tr>          
            <tr>
            <th scope='row'>REGISTRO DE INASISTENCIAS </th>
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
            </tr>
            </tbody>                
            </table><hr>";

$orden="SELECT comentarios FROM tab_p_instructor WHERE id_usuario=$id_usuario"; // Realizando una consulta SQL
                $resultado = pg_query($orden) or die ('Error. Intente de nuevo'. pg_last_error());
                while ($fila = pg_fetch_array($resultado)){
                	echo "Comentarios al portafolio: ";
                echo $fila[0]; }

$_SESSION["codigo_ficha"]=$codigo_ficha;
}
?>



                            </div>
                            </div>
                        </div>
                    </div>                  
                </div>
                 <!--END STACKING CHART SCETION  -->

<div class="row">
                   <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                             <div class="table-responsive">


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
                </div>

            </div>
        </div>
        <!--END PAGE CONTENT -->

        <!-- RIGHT STRIP  SECTION -->
        <div id="right">
            <div class="well well-small">
                <form action="home.php"><button class="btn btn-primary btn-block">MENÚ PRINCIPAL</button></form><br>
                <form action="registrar_tramite.php"><button class="btn btn-primary btn-block">REGISTRO TRÁMITES</button></form><br>
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