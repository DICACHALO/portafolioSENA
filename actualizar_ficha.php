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
                           <h4> EDITAR TABLA FICHA </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                             <?php
                      
                      session_start();
                      include("conectar.php");
                      
                      $codigo_ficha = $_GET['codigo_ficha'];
                      $nom_programa = $_GET['nom_programa'];
                      $fecha_inicio = $_GET['fecha_inicio'];
                      $fecha_fin = $_GET['fecha_fin'];
                      $nom_jornada = $_GET['nom_jornada'];
                      $tipo_formacion = $_GET['tipo_formacion'];
                      
                      //Muestra la tabla
                      echo "<form action='' method='post' style='width:400px' class='form-signin'>
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
                      
                          <th scope='row'>FICHA</th>
                          <td><input type='text' size='30' name='codigo_ficha' readonly value='$codigo_ficha'></td></tr>
                          <tr>
                          <th scope='row'>PROGRAMA DE FORMACIÓN</th>
                          <td>";

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
                          echo"</td></tr>

                          <tr>
                          <th scope='row'>FECHA DE INICIO</th>
                          <td><input type='text' size='30' name='fecha_inicio' value='$fecha_inicio'></td></tr>

                          <tr>
                          <th scope='row'>FECHA DE FINALIZACIÓN</th>
                          <td><input type='text' size='30' name='fecha_fin' value='$fecha_fin'></td></tr>

                          <tr>
                          <th scope='row'>JORNADA </th> 
                          <td>";


                $orden="SELECT id_jornada, nom_jornada FROM tab_jornada ORDER BY 1;"; // Realizando una consulta SQL
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
                          echo "</td></tr>

                          <tr>
                           <tr>
                          <th scope='row'>TIPO DE FORMACION</th> 
                          <td>";
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

   
                      

                      echo "</td></tr></tbody></table>";

           

					 if (isset($_POST['guardar'])){
                      $codigo_ficha = $_POST['codigo_ficha'];
                      $id_programa = $_POST['id_programa'];
                      $fecha_inicio = $_POST['fecha_inicio'];
                      $fecha_fin = $_POST['fecha_fin'];
                      $id_jornada = $_POST['id_jornada'];
                      $id_tipo_formacion = $_POST['id_tipo_formacion'];
                             
						$update="UPDATE tab_ficha SET id_programa='$id_programa', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', id_jornada='$id_jornada', id_tipo_formacion='$id_tipo_formacion' WHERE codigo_ficha=$codigo_ficha;"; 
						$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
						echo '<meta http-equiv="REFRESH" content="0;url=fichas.php">';
            } 

                      pg_close($con);
                      ?> 

                                            

                            </div></div>
                        </div>
                        <p align="center"> <input type='submit' name='guardar' value=Guardar class='btn btn-success btn-sm'></form>
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