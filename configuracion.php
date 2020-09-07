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
                           <h4> ELEMENTOS DE CONFIGURACIÓN PARA USUARIOS</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                             <?php
                      @session_start();
                      include("conectar.php");
                      $id_usuario=$_SESSION['id_usuario'];
                      $consulta = "SELECT id_usuario,nom_usuario,apell_usuario,celular,correo_electronico,foto,pregunta,respuesta FROM tab_usuario WHERE id_usuario=$id_usuario";
                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <thead>
                        <tr >
                        <th><center>CEDULA</center></th>
                        <th><center>NOMBRE</center></th>
                        <th><center>APELLIDO</center></th>
                        <th><center>CELULAR</center></th>
                        <th><center>CORREO ELECTRONICO</center></th>
                        <th><center>PREGUNTA DE RECUPERACIÓN DE CONTRASEÑA</center></th>
                        <th><center>RESPUESTA</center></th>
                        <th><center>FOTO DE PERFIL</center></th>
                        <th><center>EDITAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
                      while ($fila = pg_fetch_array($resultado)){
                      echo "<tr class='odd gradeX' align='center'><td>".$fila[0]."</td>";
                      echo "<td>".$fila[1]."</td>";
                      echo "<td>".$fila[2]."</td>";
                      echo "<td>".$fila[3]."</td>";
                      echo "<td>".$fila[4]."</td>";
                      echo "<td>".$fila['pregunta']."</td>";
                      echo "<td>".$fila['respuesta']."</td>";
					  echo "<td><img src='".$fila[5]."'width='100' height='100' /></td>"; 
                      echo "<td align='center'><a href='actualizar_usuario.php?nom_usuario=".$fila['nom_usuario']."&apell_usuario=".$fila['apell_usuario']."&celular=".$fila['celular']."&correo_electronico=".$fila['correo_electronico']."&pregunta=".$fila['pregunta']."&respuesta=".$fila['respuesta']."'>
		         			<button type='submit'><img src='assets/img/editar.png'/></button></a></td>";
                                

                      echo "</tr></tbody></table></form><hr>";}
                                          
                      pg_close($con);
                      ?> 

                            </div> <p> <strong>SOLICITUDES PENDIENTES POR APROBACIÓN: </strong><br>
  <?php
                include ("conectar.php"); // Conectando y seleccionado la base de datos
                @session_start();
                $id_usuario=$_SESSION['id_usuario'];
                $consulta="SELECT a.id_rol, c.nom_rol, a.id_red, d.nom_red, a.id_centro, e.nom_centro, a.codigo_ficha FROM tab_usuario_perfil a, tab_perfil c, tab_centro e, tab_red d WHERE id_usuario=$id_usuario and a.ind_estado='f' and a.id_rol=c.id_rol and a.id_centro=e.id_centro and a.id_red=d.id_red ORDER BY id_rol;"; // Realizando una consulta SQL
                $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                $numRows = pg_num_rows($resultado);
                      if ($numRows==0) {echo "<i>No tiene ninguna solicitud de perfil pendiente.</i></p>"; }
                      else {
                echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <thead>
                        <tr>
                        <th><center> ROL </center></th>
                        <th><center> RED </center></th>
                        <th><center> CENTRO DE FORMACIÓN </center></th>
                        <th><center> CODIGO FICHA </center></th>
                        <th><center> ELIMINAR </center></th>
                        </tr>
                        </thead>
                        <tbody>
                        ";

                while ($fila = pg_fetch_array($resultado)){
              
              echo "<tr class='odd gradeX'><td>".$fila['nom_rol']."</td>
                                                         <td>".$fila['nom_red']."</td>
                                                         <td>".$fila['nom_centro']."</td>
                                                         <td>"; if ($fila['codigo_ficha'] > 0) {echo $fila['codigo_ficha'];}
                                                         else {echo "No aplica";}
                                                         echo "</td><td align='center'><a href='eliminar_solicitud.php?id_usuario=".$id_usuario."&codigo_ficha=".$fila['codigo_ficha']."&id_rol=".$fila['id_rol']."'>
                  <button type='submit' ><img src='assets/img/eliminar.png'/></button></a>

                                                         </td></tr>";
      } echo "</tbody></table><br>"; }               
                      pg_close($con);
?>

                            </div>
 <div class="panel-body">

                       
<form action="crear_perfil.php" method="post" class="form-signin">
<label for="rol">SOLICITUD DE PERFIL: </label>
                <?php
                include ("conectar.php"); // Conectando y seleccionado la base de datos
                $orden="SELECT id_rol, nom_rol FROM tab_perfil ORDER BY 1;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_rol" id="id_rol" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id=$fila[0];
                                      $nombre=$fila[1];
                                      echo '<option value="'.$id.'">'.$nombre.'</option>';
                                    }
                                echo '</select>';

             }else
              echo "Error al ejecutar la consulta contra la base de datos.";

            echo "<label for='centro'>REGIONAL:</label>";
                $orden="SELECT id_regional, nom_regional FROM tab_regional ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_regional" id="id_regional" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_regional=$fila[0];
                                      $nom_regional=$fila[1];
                                      echo ' <option value="'.$id_regional.'">'.$nom_regional.'</option>';
                                    }

                                echo '</select><br>';
           } 
              ?>
              <br><input type="submit" value="Enviar" class='btn btn-success btn-sm'/>
               <a href="home.php">

               <button type="button" class="btn btn-primary btn-sm">
                <span class="icon-reply"></span>
              </button></a></form></div></div></div></div></div>
       

 

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
      <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
