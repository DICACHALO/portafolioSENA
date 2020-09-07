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
 
 <div class='container'><hr><form action='agregarficha2.php' method='post' style='width:400px' class='form-signin'>
                <p class='text-muted text-center btn-block btn btn-primary btn-rect'> Agregue una nueva ficha </p><br>
                <label>CÓDIGO:</label>
                <input type='number' min='1' max='9999999' name='codigo_ficha' class='form-control'/>
                <br> 
                <label>FECHA DE INICIO:</label>
                <input type='date' name='fecha_inicio' class='form-control' />
                <br>
                <label>FECHA DE FINALIZACIÓN:</label>
                <input type='date' name='fecha_fin' class='form-control' />
                <br>
 <?php
    include ("conectar.php"); // Conectando y seleccionado la base de datos 
    $id_regional2=$_POST['id_regional'];
     //Formulario para crear una ficha
      			echo "<label>JORNADA:</label>";
                $orden="SELECT id_jornada, nom_jornada FROM tab_jornada ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_jornada" id="id_jornada" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_jornada=$fila[0];
                                      $nom_jornada=$fila[1];
                                      echo '<option value="'.$id_jornada.'">'.$nom_jornada.'</option>';
                                    }
                                echo '</select><br>';
                  }else{
                echo "Error al ejecutar la consulta contra la base de datos.";}

                echo "<label>TIPO DE FORMACIÓN:</label>";
                $orden="SELECT id_tipo_formacion, tipo_formacion FROM tab_tipo_formacion ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_tipo_formacion" id="id_tipo_formacion" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_tipo_formacion=$fila[0];
                                      $tipo_formacion=$fila[1];
                                      echo '<option value="'.$id_tipo_formacion.'">'.$tipo_formacion.'</option>';
                                    }
                                echo '</select><br>';
                  }else{
                echo "Error al ejecutar la consulta contra la base de datos.";}	

                echo "<label>PROGRAMA DE FORMACIÓN:</label>";
                $orden="SELECT id_programa, nom_programa FROM tab_programa_formacion WHERE nom_programa!='NO APLICA' ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_programa" id="id_programa" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_programa=$fila[0];
                                      $nom_programa=$fila[1];
                                      echo '<option value="'.$id_programa.'">'.$nom_programa.'</option>';
                                    }
                                echo '</select><br>';
                  }else{
                echo "Error al ejecutar la consulta contra la base de datos.";}	

                echo "<label for='centro'>CENTRO DE FORMACIÓN:</label>";
                $orden="SELECT id_centro, nom_centro FROM tab_centro WHERE id_regional='$id_regional2' ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_centro" id="id_centro" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_centro=$fila[0];
                                      $nom_centro=$fila[1];
                                      echo '<option value="'.$id_centro.'">'.$nom_centro.'</option>';
                                    }
                                echo '</select><br>';
                }else{
                echo "Error al ejecutar la consulta contra la base de datos.";}
               
                      echo "<button type='submit' class='btn btn-success btn-sm' name='guardarficha' >Enviar</button>
                <a href='fichas.php'><button type='button' class='btn btn-primary btn-sm'>
                <span class='icon-reply'></span></form>
              </button></a></div>";
              

pg_close($con);
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