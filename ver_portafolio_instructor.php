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


            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
            <caption></caption>
            <colgroup>
            <col/>
            <col/>
            <col />
            </colgroup>
            <thead>
            <tr>
            <th><center> PORTAFOLIO INSTRUCTOR
            <?php 
            include("conectar.php");

            $nombre= $_GET['nombre'];
            $apellido= $_GET['apellido'];
            $id = $_GET['identificacion'];
            $ficha= $_GET['ficha'];
            $rol=4;
            echo $nombre. " " .$apellido; ?> 

            </center></th>
            <th><center> ABRIR </center></th>
            
            </tr>
            </thead>
            <tbody>
            <tr>
            <th scope='row'> PROGRAMA DE FORMACIÓN </th>
            <td><?php 
            echo " 
            
            <a href='ver_programa.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='programa_formacion' type='submit'><i class='icon-eye-open'></i></button></a>";  ?>
            </td>
            
            </tr>
            <tr>
            <th scope='row'>LISTADO DE APRENDICES</th>
            <td>
            <?php echo " 
            
            <a href='ver_listado_aprendices.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>
            </td>
            
            </tr>
            <tr>
            <th scope='row'>HORARIO</th>
            <td>
            <?php echo " 
            
            <a href='ver_horario.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>  
            </td>
            </td>
            
            </tr>
            <tr>
            <th scope='row'>PROYECTO FORMATIVO</th>
            <td>
            <?php echo " 
            
            <a href='ver_proyecto_formativo.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>
            </td>
           
            </tr>
            <tr>
            <th scope='row'>PLANEACION PEDAGOGICA DEL PROYECTO FORMATIVO</th>
            
            <td>
            <?php echo " 
            
            <a href='ver_planeacion_pedagogica.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>
            </td>
            
            </tr>
            <tr>
            <th scope='row'>GUIAS DE APRENDIZAJE</th>
            <td>
            <form action='ver_carpeta.php' method='post'>
            <button class='btn' name='guias' type='submit'><i class='icon-folder-open'></i></button>
            </form>
            </td>
            
            </tr>
            <tr>
            <th scope='row'>INSTRUMENTOS DE EVALUACIÓN</th>
            <td>
            <form action='archivo.php' method='post'>
            <button class='btn' name='instrumentos' type='submit'><i class='icon-folder-open'></i></button>
            </form>
            </td>
           
            </tr>
            <tr>
            <th scope='row'>PLAN DE EVALUACIÓN Y SEGUIMIENTO ETAPA LECTIVA </th>
            <td>
            <?php echo " 
            
            <a href='ver_plan_lectiva.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>
            </td>
            
            </tr>
            <tr>
            <th scope='row'>PLANEACIÓN, SEGUIMIENTO Y EVALUACIÓN ETAPA PRODUCTIVA</th>
            <td>
            <?php echo " 
            
            <a href='ver_planeacion_productiva.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>
            </td>
          
            </tr>
            <tr>
            <th scope='row'>PLAN DE MEJORAMIENTO</th>
            <td>
            <?php echo " 
            
            <a href='ver_plan_mejoramiento.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>
            </td>
            
            </tr>          
            <tr>
            <th scope='row'>REGISTRO DE INASISTENCIAS </th>
            <td>
            <?php echo " 
            
            <a href='inasistencias.php?id=".$id."&ficha=".$ficha."&rol=".$rol."'><button class='btn' name='listado_aprendices' type='submit'><i class='icon-eye-open'></i></button></a>"

            ?>
            
            </td>
            
            </tr>
            <tr>
            <th scope='row'>COMENTARIOS </th>
           <td>
<form action='' method='POST'>
             <tr><td><textarea rows='6' cols='60' name='comentario_calidad'></textarea></td>
             <td><input type='submit' name='guardar' value='ENVIAR'></td><td></td> 
             </tr></form></td>
           
<td>


                          <?php
                $orden="SELECT comentarios FROM tab_p_instructor WHERE id_usuario=$id"; // Realizando una consulta SQL
                $resultado = pg_query($orden) or die ('Error. Intente de nuevo'. pg_last_error());
                while ($fila = pg_fetch_array($resultado)){
                echo $fila[0]; }
                             ?></td>
 <td>                            
<a href="calidad.php">

               <button type="button" class="btn btn-primary btn-sm">
                <span class="icon-reply"></span>
              </button></a></td>

            </tbody>                
            </table><hr>

<?php
if (isset($_POST['guardar'])){
    $sql="UPDATE tab_p_instructor SET comentarios='$_REQUEST[comentario_calidad]' WHERE id_usuario=$id"; 
    $respuesta=pg_query($sql)or die('Error. Intente de nuevo'.pg_last_error());
        
    }
   
?> 




        <!--END PAGE CONTENT -->


   
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
    <!-- END BODY -->
</html>