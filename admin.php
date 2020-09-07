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
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
                    <a href="index.html" class="navbar-brand"><img src="assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right"></ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->

<!-- MENU SECTION -->
      <div id="left" >
        <div class="media user-media well-small">
                <br>
                <?php
                include("conectar.php");
                      @session_start();
                      $id_usuario=$_SESSION['id_usuario'];
                      if(!isset($_SESSION['id_usuario'])){ Header("Location:index.html");} //si el ususario no ha ingresado correctamente lo envia a iniciar sesión
                      $sql= "SELECT COUNT (id_rol) AS ROLES FROM tab_usuario_perfil WHERE id_usuario=$id_usuario and id_rol=1";
                      $resultado = pg_query($sql)or die ('Error. Intente de nuevo'. pg_last_error());
                      $contados = pg_fetch_result($resultado,0,0);
                      
                      $consulta = "SELECT foto FROM tab_usuario WHERE id_usuario=$id_usuario";
                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      while ($fila = pg_fetch_array($resultado)){
                     
                      echo "<img class='media-object img-thumbnail user-img' alt='User Picture' src='".$fila[0]."''>";
                      }
                      if($contados==0 or $id_usuario=0 )
                       {require("salir.php");}                    
                      pg_close($con);

                        ?>


                <br />
                <div class="media-body">
                    <h6 class="media-heading">
                    Usuario: </h6>
                    <ul class="list-unstyled user-info">
                    </ul>
  

<div class="media-body"> 
<ul id="menu" class="collapse">               
<li class="panel">
                    <a href="home.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">

<h6 class="media-heading">
                   <?php
            @session_start();
            include("conectar.php");
            $id_usuario=$_SESSION['id_usuario'];
            $consulta = "SELECT nom_usuario, apell_usuario FROM tab_usuario WHERE id_usuario=$id_usuario";
            $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
            while ($fila = pg_fetch_array($resultado)){
            echo $fila[0]. " ".$fila[1];}
            pg_close($con);
            ?> 
                    </h6></a></li></ul> </br>

              </a></li></ul></div>




                </div>
                <br />
           </div>

        </div>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <div id="content">     
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Perfil de administrador </h2>
                    </div>
                </div>
                  <hr/>                           

<!--  STACKING CHART  SECTION   -->
    <div class="row">
        <div class="col-lg-12"> 
            <div class="panel panel-default"> 
                 <div class="panel-heading">


                 
                              <?php
                              if (isset($_POST['admin_tablas'])){
                         echo "<label>Administrar tablas:</label></div>
              <div class='panel-body'> 
               <ul>
       <li><a href='regionales.php'> Regionales </a></li>
       <li><a href='centros.php'> Centros de formación </a></li>
       <li><a href='red.php'>Redes de conocimiento </a></li>
       <li><a href='tipo_tramite.php'>Tipo de trámite </a></li>
       <li><a href='jornada.php'>Jornada </a></li>
       <li><a href='tipo_formacion.php'>Tipo de formación </a></li>
       <li><a href='programa_formacion.php'>Programas de formación </a></li>
       <li><a href='fichas.php'>Fichas </a></li>
 </ul>
              
              ";

           
                                }

if (isset($_POST['asigna_permisos'])){
                 echo "ASIGNAR PERMISOS DE PERFIL A USUARIOS 
                  
                  </div>
              <div class='panel-body'>";
            
            include("conectar.php");
            
			$consulta ="SELECT a.id_usuario, b.nom_usuario, b.apell_usuario, a.id_rol, c.nom_rol, a.id_red, d.nom_red, a.id_centro, e.nom_centro, a.codigo_ficha, a.ind_estado FROM tab_usuario_perfil a, tab_usuario b, tab_perfil c, tab_centro e, tab_red d WHERE a.id_usuario=b.id_usuario and a.id_rol=c.id_rol and a.id_centro=e.id_centro and a.id_red=d.id_red and a.id_usuario !=1234 ORDER BY id_rol";
			$resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
			echo "
                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                        <thead>
                        <tr>
                        <th><center>CEDULA USUARIO</center></th>
                        <th><center>NOMBRE</center></th>
                        <th><center>ROL</center></th>
                        <th><center>RED</center></th>
                        <th><center>CENTRO DE FORMACIÓN</center></th>
                        <th><center>CODIGO FICHA</center></th>
                        <th><center>ESTADO</center></th>
                        <th><center>MODIFICAR</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
						while ($fila = pg_fetch_array($resultado)){
							
							echo "<tr class='odd gradeX'><td>".$fila['id_usuario']."</td>
                                                   		 <td>".$fila['nom_usuario']." ".$fila['apell_usuario']."</td>
                                                   		 <td>".$fila['nom_rol']."</td>
                                                         <td>".$fila['nom_red']."</td>
                                                         <td>".$fila['nom_centro']."</td>
                                                         <td>"; if ($fila['codigo_ficha'] > 0) {echo $fila['codigo_ficha'];}
                                                         else {echo "No aplica";}
                                                         
                                                         echo "</td>
                                                         <td>";
                                                         
                                                        if ($fila['ind_estado']==='t'){echo "ACTIVO";}
                                                         else {echo "INACTIVO";}
                                                         
                                                         echo "</td><td align='center'><a href='modificar_estado_perfil.php?id_usuario=".$fila['id_usuario']."&codigo_ficha=".$fila['codigo_ficha']."&ind_estado=".$fila['ind_estado']."&id_rol=".$fila['id_rol']."'>
		         			<button type='submit' ><img src='assets/img/editar.png'/></button></a>

                                                         </td></tr>";
			}	echo "</tbody></table><br>";                
                      pg_close($con);
}


?>

<?php
//Sección para que el administrador gestione usuarios
if (isset($_POST['gestiona_usuarios'])){
   echo "GESTIONAR USUARIOS </div>
              <div class='panel-body'>";
                      @session_start();
                      include("conectar.php");
                      $id_usuario=$_SESSION['id_usuario'];
                      $consulta = "SELECT id_usuario,nom_usuario,apell_usuario,celular,correo_electronico,foto,ind_estado FROM tab_usuario WHERE id_usuario!=$id_usuario";
                      $resultado = pg_query($consulta)or die ('Error. Intente de nuevo'. pg_last_error());
                      echo "
                        <table class='table table-striped table-bordered table-hover' >
                        <thead>
                        <tr >
                        <th><center>CEDULA</center></th>
                        <th><center>NOMBRE</center></th>
                        <th><center>APELLIDO</center></th>
                        <th><center>CELULAR</center></th>
                        <th><center>CORREO ELECTRONICO</center></th>
                        <th><center>FOTO DE PERFIL</center></th>
                        <th><center>ESTADO</center></th>
                        <th><center>MODIFICAR</th>
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
                      echo "<td><img src='".$fila[5]."'width='100' height='100' /></td><td>"; 
                      if ($fila['ind_estado']==='t'){echo "ACTIVO";} else {echo "INACTIVO";}
                     echo "</td><td align='center'><a href='modificar_estado_usuario.php?id_usuario=".$fila[0]."&ind_estado=".$fila['ind_estado']."'>
                  <button type='submit'><img src='assets/img/editar.png'/></button></a></td></tr>";}
       echo "</tbody></table><br>";                
                      pg_close($con);
                      } 
                      ?>

                  </div>
              <div class="panel-body">               
                       
              </div>
            </div>
        </div>                  
    </div>
                 <!--END STACKING CHART SCETION  -->
  </div>
</div>
<!--END PAGE CONTENT -->
         <!-- RIGHT STRIP  SECTION -->
        <div id="right">
            <div class="well well-small">
                <form action="" method="post"><button class="btn btn-info btn-block" name="gestiona_usuarios" type="submit" >Gestionar usuarios</button></form><br>
                <form action="" method="post"><button class="btn btn-info btn-block" name="asigna_permisos" type="submit" >Asignar permisos</button></form><br>
                <form action="" method="post" ><button class="btn btn-info btn-block" name="admin_tablas" > Administrar tablas </button></form><br>
                <form action="salir.php"><button class="btn btn-success btn-block"> Salir </button></form>
            </div>
            
            </div>
        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p> </p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
    <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>