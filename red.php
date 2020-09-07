<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Red de conocimiento</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
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
 <div class="container">
    <div class="text-center">
        <img src="assets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
   <!-- PAGE CONTENT --> 
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4> ELEMENTOS DE CONFIGURACIÓN DEL ADMINISTRADOR </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive"><p> Agregue una red de conocimiento: </p>
                                  <!--Añadir un registro -->                     
      <table>
      <tr>
        <form action='' method='POST'>
        <td><input type='text' class="form-control" placeholder='Nombre red' size='50' name='nom_red'></td>
        <td><input type='submit' name='guardar' value='GUARDAR' class="btn text-muted text-center btn-success">
        </td></form></tr></table><hr>
        <?php
          if (isset($_POST['guardar'])){
          include('conectar.php');
          $sql="INSERT INTO tab_red (nom_red) values('$_REQUEST[nom_red]');"; 
          //Consulta para insertar la nueva información
          $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
          echo "<meta http-equiv='REFRESH' content='0;url=red.php'>";
          pg_close($con);
          } 
          ?> 
               
                             
                             <?php
                      
                      @session_start();
                      include("conectar.php");
                      $id_usuario=$_SESSION['id_usuario'];
                      $consulta = "SELECT id_red, nom_red FROM tab_red";//Muestra la tabla

                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <caption> Tabla redes de conocimiento SENA </caption>
                        <thead>
                        <tr >
                        <th>CODIGO</th>
                        <th><center> NOMBRE </center></th>
                        <th><center> ELIMINAR </center></th>
                        <th><center> EDITAR </center></th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
                      while ($fila = pg_fetch_array($resultado)){
                      echo "<tr class='odd gradeX'><td>".$fila['id_red']."</td>
                                                   <td>".$fila['nom_red']."</td>
                      		<td align='center'>
                      		<a href='eliminar_red.php?id_red=".$fila['id_red']
		  					."&nom_red=".$fila['nom_red']."'>
		  					<button type='submit'><img src='assets/img/eliminar.png' alt='x' /></button>
		  					</a></td>
		  					<td align='center'><a href='actualizar_redes.php?id_red=".$fila['id_red']."&nom_red=".$fila['nom_red']."'>
		         			<button type='submit' ><img src='assets/img/editar.png'/></button></a></td></tr>";
   							}   
   							echo "</tbody></table><br>";                
                      pg_close($con);
                      ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <!-- FOOTER -->
    <div id="footer">
        <p align="center"><a href="admin.php"> Volver al menú principal </a> </p>
    </div>
    <!--END FOOTER -->

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
      <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>