<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Fichas</title>
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
                            <div class="table-responsive"> <p> Agregar una nueva ficha: </p>
                             
      <!--Añadir un registro --><form action='agregarficha.php' method='POST'>                      
      <table><caption> </caption>
      <tr><td>
        
        
         <?php
          include('conectar.php');
                $orden="SELECT id_regional, nom_regional FROM tab_regional ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_regional" id="id_regional" class="form-control">
                                <option selected="selected" value="">Seleccione una regional</option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_regional=$fila[0];
                                      $nom_regional=$fila[1];
                                      echo ' <option value="'.$id_regional.'">'.$nom_regional.'</option>';
                                    }

                                echo '</select></td>';} ?>

        <td><input type='submit' name='guardar2' value='Enviar' class="btn text-muted text-center btn-success">
        </td></form></tr></table> <hr></td></tr></table></form></div>

         

                             <?php
                      
                      @session_start();
                      include("conectar.php");
                      if(!isset($_SESSION['id_usuario'])){ Header("Location:index.html");} //si el ususario no ha ingresado correctamente lo envia a iniciar sesión
                      $id_usuario=$_SESSION['id_usuario'];
                      $consulta = "SELECT a.codigo_ficha, a.fecha_inicio, a.fecha_fin, b.nom_jornada, c.tipo_formacion, d.nom_programa, e.nom_centro FROM tab_ficha a, tab_jornada b, tab_tipo_formacion c, tab_programa_formacion d, tab_centro e WHERE a.id_jornada=b.id_jornada AND a.id_tipo_formacion=c.id_tipo_formacion AND a.id_programa=d.id_programa AND a.id_centro=e.id_centro AND codigo_ficha!=0 ORDER BY 1;";//Muestra la tabla

                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      
                      echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <caption> TABLA DE 	FICHAS </caption>
                        <thead>
                        <tr>
                        <th><center> CÓDIGO </center></th>
                        <th> PROGRAMA DE FORMACIÓN  </th>
                        <th> FECHA DE INICIO  </th>
                        <th> FECHA DE FINALIZACIÓN  </th>
                        <th> JORNADA  </th>
                        <th> TIPO DE FORMACION  </th>
                        <th><center> CENTRO DE FORMACIÓN </center></th>
                        <th><center> ELIMINAR </center></th>
                        <th><center> EDITAR </center></th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
                      while ($fila = pg_fetch_array($resultado)){
                      echo "<tr class='odd gradeX'><td>".$fila[0]."</td><td>".$fila[5]."</td>
                                                   <td>".$fila[1]."</td><td>".$fila[2]."</td>
                                                   <td>".$fila[3]."</td><td>".$fila[4]."</td>
                                                   <td>".$fila[6]."</td>";
                          echo "<td align='center'>
                          <a href='eliminar_ficha.php?codigo_ficha=".$fila[0]."'>
                <button type='submit'><img src='assets/img/eliminar.png' alt='x' /></button>
                </a></td>
                <td align='center'><a href='actualizar_ficha.php?codigo_ficha=".$fila[0]."&nom_programa=".$fila[5]."&fecha_inicio=".$fila[1]."&fecha_fin=".$fila[2]."&nom_jornada=".$fila[3]."&tipo_formacion=".$fila[4]."&nom_centro=".$fila[6]."'>
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