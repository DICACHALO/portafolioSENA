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
                           <h4> REGISTRAR TRÁMITES</h4>
                        </div>

<div class="panel-body">
                            <div class="table-responsive"><p> Agregue un trámite: </p>
                                  <!--Añadir un registro -->                     
      <table>
      <tr>
        <form action='' method='POST'>
        <td>
                <?php 
                include("conectar.php");
                $orden="SELECT id_tipo_tramite, nom_tramite FROM tab_tipo_tramite ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo "<select required name='id_tipo_tramite' id='id_tipo_tramite' class='form-control'>
                                <option selected='selected' value=''>Indique tipo de tramite </option>";
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_tipo_tramite=$fila[0];
                                      $nom_tramite=$fila['nom_tramite'];
                                      echo ' <option value="'.$id_tipo_tramite.'">'.$nom_tramite.'</option>';
                                    }

                                echo '</select></td>'; }
                                ?>
        <tr><td><input type='number' class="form-control" placeholder='Código ficha' size='' name='codigo_ficha'></td></tr>
        <tr><td><input type='number' class="form-control" placeholder='Identificación del aprendiz' size='' name='id'></td></tr>
        <tr><td><input type='date' placeholder='Fecha' size='5' name='fecha' class="form-control"></td></tr>
        <tr><td><select name="estado" class='form-control'>
    <option value="true">ACTIVO</option>
    <option value="false">INACTIVO</option>
  </select>
        </td></tr>
        <tr><td><input type='text' class="form-control" placeholder='Descripcion' size='50' name='descripcion'></td>
        <tr><td><br><input type='submit' name='guardar' value='GUARDAR' class="btn text-muted text-center btn-success">
        </a>
<a href='home.php'>

               <button type='button' class='btn text-muted text-center btn-success'>
                <span class='icon-reply'></span>
              </button></a>

        </td></form></tr></table><hr>
        <?php
          if (isset($_POST['guardar'])){
          include('conectar.php');




          $sql="INSERT INTO tab_tramite (codigo_ficha,id_usuario,id_tipo_tramite,descripcion,fecha,ind_estado) values('$_REQUEST[codigo_ficha]','$_REQUEST[id]','$_REQUEST[id_tipo_tramite]','$_REQUEST[descripcion]','$_REQUEST[fecha]','$_REQUEST[estado]');"; 
          //Consulta para insertar la nueva información
          $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
          echo "<meta http-equiv='REFRESH' content='0;url=registrar_tramite.php'>";
          pg_close($con);
          } 
          ?> 

                        <div class="panel-body">
                            <div class="table-responsive">

                             <?php
                      @session_start();
                      include("conectar.php");
                      $id_usuario=$_SESSION['id_usuario'];
                      $consulta = "SELECT a.id_tramite,a.codigo_ficha,a.id_usuario,b.nom_tramite,a.descripcion,a.fecha,a.ind_estado FROM tab_tramite a, tab_tipo_tramite b WHERE a.id_tipo_tramite=b.id_tipo_tramite"  ;
                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <thead>
                        <tr >
                        <th><center>CODIGO TRAMITE</center></th>
                        <th><center>CODIGO FICHA</center></th>
                        <th><center>APRENDIZ</center></th>
                        <th><center>TIPO DE TRAMITE</center></th>
                        <th><center>DESCRIPCION</center></th>
                        <th><center>FECHA</center></th>
                        <th><center>ESTADO</center></th>
                        <th><center>EDITAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
                      while ($fila = pg_fetch_array($resultado)){
                      echo "<tr class='odd gradeX' align='center'>
                            <td>".$fila[0]."</td>";
                      echo "<td>".$fila[1]."</td>";
                      echo "<td>".$fila[2]."</td>";
                      echo "<td>".$fila[3]."</td>";
                      echo "<td>".$fila[4]."</td>";
                      echo "<td>".$fila[5]."</td><td>";
                      if ($fila[6]==='t'){echo "ACTIVO";}  else {echo "INACTIVO";} 
					  
                      echo "<td align='center'><a href='actualizar_tramite.php?codigo_tramite=".$fila[0]."&codigo_ficha=".$fila[1]."&aprendiz=".$fila[2]."&tipo_tramite=".$fila[3]."&descripcion=".$fila[4]."&fecha=".$fila[5]."&estado=".$fila[6]."'>
		         			<button type='submit'><img src='assets/img/editar.png'/></button>



                  </td>";
                                

                      echo "</tr></tbody></table></form><hr>";}
                                          
                      pg_close($con);
                      ?> 

                            </div> 

                            </div>
 <div class="panel-body">

  
               </div></div></div></div></div>
       

 

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
      <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
