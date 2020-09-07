<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Actualizar programa de formación </title>
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
                           <h4> EDITAR PROGRAMA DE FORMACIÓN </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                             <?php
                      
                      session_start();
                      include("conectar.php");
                      $id_programa = $_GET['id_programa'];
                      $nom_programa = $_GET['nom_programa'];
                      
                      //Muestra la tabla
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <caption> Tabla programaes SENA </caption>
                        <thead>
                        <tr>
                        <th> CÓDIGO </th>
                        <th><center> NOMBRE </center></th>
                        <th><center></center></th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
                      
                      echo "
                      <form action='' method='post'>
                      <tr>
                          <td><input type='text' size='2' name='id_programa' value='$id_programa'></td>
                          <td><input type='textarea' size='30' name='nom_programa' value='$nom_programa'></td> 
                          <td><input type='submit' name='boton_programaes' value=Guardar></td>
                      </tr></tbody>";
                      

                      echo "</table></form>";

if (isset($_POST['boton_programaes'])){

include("conectar.php");
$id_programa2 = $_POST['id_programa'];
$nom_programa2 = $_POST['nom_programa'];

$update="UPDATE tab_programa_formacion SET id_programa='$id_programa2', nom_programa='$nom_programa2' WHERE id_programa=$id_programa;"; 
$res=pg_query($update) or die ('Error. Intente de nuevo'. pg_last_error());
echo '<meta http-equiv="REFRESH" content="0;url=programa_formacion.php">';
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