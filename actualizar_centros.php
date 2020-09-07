<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Actualizar regionales </title>
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
                           <h4> EDITAR CENTROS DE FORMACIÓN </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                             <?php
                      session_start();
                      include("conectar.php");
                      if(!isset($_SESSION['id_usuario'])){ Header("Location:index.html");} //si el ususario no ha ingresado correctamente lo envia a iniciar sesión
                      $nom_regional = $_GET['nom_regional'];
                      $nom_centro = $_GET['nom_centro'];
                      $id_centro = $_GET['id_centro'];
                      //Muestra la tabla
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <caption> Tabla centros de formación SENA </caption>
                        <thead>
                        <tr>
                        <th><center> REGIONAL </center></th>
                        <th> CÓDIGO CENTRO </th>
                        <th><center> NOMBRE </center></th>
                        <th><center>  </center></th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
                      
                      echo "
                      <form action='' method='post'>
                      <tr><td>";

                $orden="SELECT id_regional, nom_regional FROM tab_regional ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo "<select required name='id_regional' id='id_regional' class='form-control'>
                                <option selected='selected' value=''>Seleccione la regional</option>";
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_regional=$fila[0];
                                      $nom_regional=$fila[1];
                                      echo ' <option value="'.$id_regional.'">'.$nom_regional.'</option>';
                                    }

                                echo '</select></td>'; }
                                

                      echo "</td> 
                          <td><input type='text' size='5' name='id_centro' value='$id_centro' class='form-control'></td>
                          <td><input type='textarea' size='30' name='nom_centro' value='$nom_centro' class='form-control'></td>
                          <td><input type='submit' name='boton_centros' value=Guardar class='btn text-muted text-center btn-success'></td>
                      </tr></tbody>";
                      

                      echo "</table></form>";

if (isset($_POST['boton_centros'])){

include("conectar.php");
$id_regional = $_POST['id_regional'];
$nom_centro= $_POST['nom_centro'];
$id_centro2= $_POST['id_centro'];
$update="UPDATE tab_centro SET id_regional='$id_regional', nom_centro='$nom_centro', id_centro='$id_centro2' WHERE id_centro=$id_centro;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=centros.php">';
}                  
pg_close($con); 
?>


                            </div>
                        </div>
                    </div>
                </div>
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