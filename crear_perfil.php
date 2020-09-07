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
        <img src="assets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
 
 <?php
    @session_start();
    include ("conectar.php"); // Conectando y seleccionado la base de datos 
    $id=$_POST['id_rol'];

    
  switch($id){
  case "1":{//Formulario para crear un superusuario
  $id_usuario=$_SESSION['id_usuario'];
  $id_regional=$_POST['id_regional'];

                echo"<div class='container'><hr><form action='crear_perfil2.php' method='post' style='width:400px' class='form-signin'>
<p class='text-muted text-center btn-block btn btn-primary btn-rect'>Datos necesarios para crear perfil</p><br>
                <label>DOCUMENTO:</label>
                <input type='text' name='cedula' class='form-control' value='$id_usuario' readonly/>
                <br> 
                <label>ROL:</label>
                <input type='text' name='cedula' class='form-control' value='SUPERUSUARIO' readonly/>
                <br>";   
  
  echo "<label for='centro'>CENTRO DE FORMACIÓN:</label>";
                $orden="SELECT id_centro, nom_centro FROM tab_centro WHERE id_regional='$id_regional' ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_centro" id="id_centro" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_centro=$fila[0];
                                      $nom_centro=$fila[1];
                                      echo '<option value="'.$id_centro.'">'.$nom_centro.'</option>';
                                    }
                                echo '</select><br>';}


                             
                echo "<button type='submit' class='btn btn-success btn-sm' name='superusuario' >Enviar</button>
                <a href='configuracion.php'><button type='button' class='btn btn-primary btn-sm'>
                <span class='icon-reply'></span></form>
              </button></a></div>";



  }
  break;
  case "2":{//Formulario para crear un perfil de calidad - lider de red
              $id_usuario=$_SESSION['id_usuario'];
              $id_regional=$_POST['id_regional'];
                echo"<div class='container'><hr><form action='crear_perfil2.php' method='post' style='width:400px' class='form-signin'>
                <p class='text-muted text-center btn-block btn btn-primary btn-rect'>Datos necesarios para crear perfil</p><br>
                <label>DOCUMENTO:</label>
                <input type='text' name='cedula' class='form-control' value='$id_usuario' readonly/>
                <br> 
                <label>ROL:</label>
                <input type='text' name='cedula' class='form-control' value='PERFIL DE CALIDAD' readonly/>
                <br>";
                
                echo "<label for='centro'>CENTRO DE FORMACIÓN:</label>";
                $orden="SELECT id_centro, nom_centro FROM tab_centro WHERE id_regional='$id_regional' ORDER BY 2;"; // Realizando una consulta SQL
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
                
                           
                 echo "<button type='submit' class='btn btn-success btn-sm' name='calidad' >Enviar</button>
                <a href='configuracion.php'><button type='button' class='btn btn-primary btn-sm'>
                <span class='icon-reply'></span></form>
              </button></a></div>";

  }
  break;
  case "3":{//Formulario para crear un coordinador
                $id_usuario=$_SESSION['id_usuario'];
                $id_regional=$_POST['id_regional'];
                echo"<div class='container'><hr><form action='crear_perfil2.php' method='post' style='width:400px' class='form-signin'>
                <p class='text-muted text-center btn-block btn btn-primary btn-rect'>Datos necesarios para crear perfil</p><br>
                <label>DOCUMENTO:</label>
                <input type='text' name='cedula' class='form-control' value='$id_usuario' readonly/>
                <br> 
                <label>ROL:</label>
                <input type='text' name='cedula' class='form-control' value='COORDINADOR' readonly/>
                <br>";
                                            
                echo "<label for='centro'>CENTRO DE FORMACIÓN:</label>";
                $orden="SELECT id_centro, nom_centro FROM tab_centro WHERE id_regional='$id_regional' ORDER BY 2;"; // Realizando una consulta SQL
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
                
                echo "<button type='submit' class='btn btn-success btn-sm' name='coordinador' >Enviar</button>
                <a href='configuracion.php'><button type='button' class='btn btn-primary btn-sm'>
                <span class='icon-reply'></span></form>
              </button></a></div>";

           }
  break;
  case "4":{//Formulario para crear un instructor
            $id_usuario=$_SESSION['id_usuario'];
            $id_regional=$_POST['id_regional'];
                echo"<div class='container'><hr><form action='crear_perfil2.php' method='post' style='width:400px' class='form-signin'>
                <p class='text-muted text-center btn-block btn btn-primary btn-rect'>Datos necesarios para crear perfil</p><br>
                <label>DOCUMENTO:</label>
                <input type='text' name='cedula' class='form-control' value='$id_usuario' readonly/>
                <br> 
                <label>ROL:</label>
                <input type='text' name='cedula' class='form-control' value='INSTRUCTOR' readonly/>
                <br>";
               
                
                echo "<label for='centro'>CENTRO DE FORMACIÓN:</label>";
                $orden="SELECT id_centro, nom_centro FROM tab_centro WHERE id_regional='$id_regional' ORDER BY 2;"; // Realizando una consulta SQL
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
                
                

 				echo"<label for='red'>RED DE CONOCIMIENTO:</label>";
                $orden="SELECT id_red, nom_red FROM tab_red WHERE id_red!=1 ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_red" id="id_red" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_red=$fila[0];
                                      $nom_red=$fila[1];
                                      echo '<option value="'.$id_red.'">'.$nom_red.'</option>';
                                    }
                                echo '</select><br>';
             }else{
              echo "Error al ejecutar la consulta contra la base de datos.";}
              echo "<label for='centro'>FICHA:</label>";
                $orden="SELECT a.codigo_ficha FROM tab_ficha a WHERE a.codigo_ficha NOT IN (SELECT a.codigo_ficha FROM tab_ficha a, tab_usuario_perfil b WHERE a.codigo_ficha=b.codigo_ficha and b.id_rol=4 and a.codigo_ficha!=0 and id_usuario=$id_usuario) and a.codigo_ficha!=0 ORDER BY 1;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="codigo_ficha" id="codigo_ficha" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $codigo_ficha=$fila[0];
                                      
                                      echo '<option value="'.$codigo_ficha.'">'.$codigo_ficha.'</option>';
                                    }
                                echo '</select><br>';
             }else{
              echo "Error al ejecutar la consulta contra la base de datos.";}

                echo "<button type='submit' class='btn btn-success btn-sm' name='instructor' >Enviar</button>
                <a href='configuracion.php'><button type='button' class='btn btn-primary btn-sm'>
                <span class='icon-reply'></span></form>
              </button></a></div>";
           }
  break;
  case "5":{ //Formulario para crear un aprendiz
                $id_usuario=$_SESSION['id_usuario'];
                $id_regional=$_POST['id_regional'];
                echo"<div class='container'><hr><form action='crear_perfil2.php' method='post' style='width:400px' class='form-signin'>
                <p class='text-muted text-center btn-block btn btn-primary btn-rect'>Datos necesarios para crear perfil</p><br>
                <label>DOCUMENTO:</label>
                <input type='text' name='cedula' class='form-control' value='$id_usuario' readonly/>
                <br> 
                <label>ROL:</label>
                <input type='text' name='cedula' class='form-control' value='APRENDIZ' readonly/>
                <br>";
      
                echo "<label for='centro'>CENTRO DE FORMACIÓN:</label>";
                $orden="SELECT id_centro, nom_centro FROM tab_centro WHERE id_regional='$id_regional' ORDER BY 2;"; // Realizando una consulta SQL
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
               echo "<label for='red'>RED DE CONOCIMIENTO:</label>";
                $orden="SELECT id_red, nom_red FROM tab_red WHERE id_red !=1 ORDER BY 2;"; // Realizando una consulta SQL
                if($consulta=pg_query($orden))
                {echo '<select required name="id_red" id="id_red" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $id_red=$fila[0];
                                      $nom_red=$fila[1];
                                      echo '<option value="'.$id_red.'">'.$nom_red.'</option>';
                                    }
                                echo '</select><br>';
                  }else{
                echo "Error al ejecutar la consulta contra la base de datos.";}
                     
                    echo "<label for='centro'>FICHA:</label>";
                    $orden="SELECT a.codigo_ficha FROM tab_ficha a WHERE a.codigo_ficha NOT IN (SELECT a.codigo_ficha FROM tab_ficha a, tab_usuario_perfil b WHERE a.codigo_ficha=b.codigo_ficha and a.codigo_ficha!=0 and b.id_rol=5 and id_usuario=$id_usuario) and a.codigo_ficha!=0  ORDER BY 1;"; // Realizando una consulta SQL
                    if($consulta=pg_query($orden))
                    {echo '<select required name="codigo_ficha" id="codigo_ficha" class="form-control">
                                <option selected="selected" value="">*** SELECCIONAR *** </option>';
                                while($fila=pg_fetch_row($consulta)) //Bucle para mostrar todos los registros
                                    {
                                      $codigo_ficha=$fila[0];
                                      
                                      echo '<option value="'.$codigo_ficha.'">'.$codigo_ficha.'</option>';
                                    }
                                echo '</select><br>';
                    }else{
                      echo "Error al ejecutar la consulta contra la base de datos.";}
                      echo "<button type='submit' class='btn btn-success btn-sm' name='aprendiz' >Enviar</button>
                <a href='configuracion.php'><button type='button' class='btn btn-primary btn-sm'>
                <span class='icon-reply'></span></form>
              </button></a></div>";
              }
  break;}
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