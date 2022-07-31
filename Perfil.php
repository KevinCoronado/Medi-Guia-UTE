<?php 
    include("Conexion.php");
    include("validarSesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Medi Guia</title>
    <link rel="stylesheet" href="css/StylesPerfil.css ">
</head>
  <body>
    <header>
      <div class="container">
          <img src="css/Imagenes/Medi guia logo.png" alt="MediGuiaLogo" class="logo">
          <nav>
              <li><a href="">Recordatorios</a>
                  <ul>
                      <li><a href="./Crear_Recordatorio.html">Crear recordatorio medicinal</a></li>
                      <li><a href="./Crear_Recordatorio_Medicion.html">Crear recordatorio de medicion</a></li>
                      <li><a href="./Crear_Recordatorio_Cita.html">Crear recordatorio de cita medica</a></li>
                      <li><a href="./Ver_Recordatorios.php">Ver recordatorios creados</a></li>
                  </ul>
              </li>

              <a href="./ListaCheck.html">Reportes diarios</a>
              <a href="./calendario.html">Agenda</a>

              <li><a href="">Contactos Medicos</a>
               <ul>
                  <li><a href="./Crear_Contacto.html">Crear contacto</a></li>
                  <li><a href="./RegistrosContacto.php">Ver contacto creado</a></li>
              </ul>
          </li>

              <a href="./Perfil.php">Mi perfil</a>
          </nav> 
      </div>
  </header>

	<br>
  <?php
      $consultaUsuario= "SELECT * FROM Usuario WHERE id_usuario = '$id_usuario'";
      $datosUsuario = pg_query($conexion,$consultaUsuario);
      $filaUsuario = pg_fetch_array($datosUsuario);
  ?>

  <div class="MiPerfil">
    <h2 >Mi perfil</h2>
    <br>
    <br>
    <div class="grupo">
      <strong> <label>Nombre: </label></strong>
      <?php echo $filaUsuario['nombre'] ?>
      <a href="">Editar</a>
    </div>
    <div class="grupo">
    <strong><label for="">Correo: </label></strong>
      <?php echo $filaUsuario['correo'] ?>
      <a href="">Editar</a>
    </div>
    <div class="grupo">
    <strong><label for="">Contraseña</label></strong>
      <a href="">Editar</a>
    </div>
    <br>
    <br>
    <div>
      <a href="./destruirSesion.php"><button type="submit" >Cerrar Sesion</button></a>
      <br>
      <br>
    </div>
  </div>
  </body>   
</html>