<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>CREAR PERFIL</title>
  </head>
  <body>
    <?php
     
    // Realizando una consulta SQL
   if (isset($_POST['superusuario'])){
    @session_start();
    include ("conectar.php"); // Conectando y seleccionado la base de datos
    $id_usuario=$_SESSION['id_usuario'];
    $id_centro=$_POST['id_centro'];
     
    // Realizando una consulta SQL
    $sql="INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha) VALUES ($id_usuario,1,1,$id_centro,0);";
    $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
    pg_close($con); //Cierra conexión con la base de datos
    echo "El registro se ha realizado con éxito.";
    //Retorna al formulario inicial
    echo'
    <html>
    <head>
    <meta http-equiv="REFRESH" content="1;url=configuracion.php">
    </head>
    </html>
    ';
   
}

   if (isset($_POST['calidad'])){
    @session_start();
    include ("conectar.php"); // Conectando y seleccionado la base de datos gesin 
    $id_usuario=$_SESSION['id_usuario'];
    $id_centro=$_POST['id_centro'];
     
    // Realizando una consulta SQL
    $sql="INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha) VALUES ($id_usuario,2,1,$id_centro,0);";
    $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
    pg_close($con); //Cierra conexión con la base de datos
    echo "El registro se ha realizado con éxito.";
    //Retorna al formulario inicial
    echo'
    <html>
    <head>
    <meta http-equiv="REFRESH" content="2;url=configuracion.php">
    </head>
    </html>
    ';
   
}

 if (isset($_POST['coordinador'])){
 @session_start();
    include ("conectar.php"); // Conectando y seleccionado la base de datos gesin 
    $id_usuario=$_SESSION['id_usuario'];
    $id_centro=$_POST['id_centro'];
     
    // Realizando una consulta SQL
    $sql="INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha) VALUES ($id_usuario,3,1,$id_centro,0);";
    $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
    pg_close($con); //Cierra conexión con la base de datos
    echo "El registro se ha realizado con éxito.";
    //Retorna al formulario inicial
    echo'
    <html>
    <head>
    <meta http-equiv="REFRESH" content="2;url=configuracion.php">
    </head>
    </html>
    ';
   
}

 if (isset($_POST['instructor'])){
 @session_start();
    include ("conectar.php"); // Conectando y seleccionado la base de datos gesin 
    $id_usuario=$_SESSION['id_usuario'];
    $id_red=$_POST['id_red'];
    $id_centro=$_POST['id_centro'];
    $codigo_ficha=$_POST['codigo_ficha'];  
    // Realizando una consulta SQL
    $sql="INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha) VALUES ($id_usuario,4,$id_red,$id_centro,$codigo_ficha);";
    $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
    pg_close($con); //Cierra conexión con la base de datos
    echo "El registro se ha realizado con éxito.";
    //Retorna al formulario inicial
    echo'
    <html>
    <head>
    <meta http-equiv="REFRESH" content="2;url=configuracion.php">
    </head>
    </html>
    ';
}
    

     if (isset($_POST['aprendiz'])){
@session_start();
    include ("conectar.php"); // Conectando y seleccionado la base de datos gesin 
    $id_usuario=$_SESSION['id_usuario'];
    $id_red=$_POST['id_red'];
    $id_centro=$_POST['id_centro'];
    $codigo_ficha=$_POST['codigo_ficha'];  
    // Realizando una consulta SQL
    $sql="INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha) VALUES ($id_usuario,5,$id_red,$id_centro,$codigo_ficha);";
    $respuesta=pg_query($sql) or die('Error. Intente de nuevo'.pg_last_error());
    pg_close($con); //Cierra conexión con la base de datos
    echo "El registro se ha realizado con éxito.";
    //Retorna al formulario inicial
    echo'
    <html>
    <head>
    <meta http-equiv="REFRESH" content="2;url=configuracion.php">
    </head>
    </html>
    ';
}
    ?>
  </body>
</html>