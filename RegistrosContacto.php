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
    <title>Contacto Medi-Guia</title>
    <link rel="stylesheet" href="css/StylesPerfilUsuario.css ">
    <link rel="stylesheet" href="css/Style_Li_Form.css">
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
  <section id="MostrarContactos">
    <h1>Contactos</h1>
    <div>
      <table>
        <tr>
            <th>Informacion</th>
            <th>Medios de contacto</th>
            <th>Accion</th>
        </tr>
        <?php
        //En esta parte solo se recojen los datos del usuario logueado
            $consultaContacto = "SELECT * FROM contacto_medico WHERE id_usuario = '$id_usuario'";    
          
            $datosContacto =  pg_query($conexion,$consultaContacto);

            while($filaContacto=pg_fetch_array($datosContacto)){
            ?>
        <tr>
            <td>
            <strong><?php echo "Nombre: "  ?></strong> <?php echo $filaContacto['nombre'] ," ",$filaContacto['apellidos'] ?><br>
            <strong><?php echo "Especialidad: "?></strong> <?php echo $filaContacto['especialidad'] ?><br> 
            <strong><?php echo "Lugar de trabajo: "?></strong> <br>
            <?php echo $filaContacto['lugar'] ?><br>
            </td>
            <td>
            <strong><?php echo "Telefono: "?></strong><?php echo $filaContacto['telefono'] ?><br>
            <strong><?php echo "Email: "?></strong><?php echo $filaContacto['correo'] ?><br>
            </td>
            <td style="border:0px;">
               <?php echo "<a href='EliminarContacto.php?id_contacto=".$filaContacto['id_contacto']."'>
               <button>Eliminar</button></a>";?>
            </td>
        </tr>
        <?php
            }
            ?>
      </table> 

    </div>
  </section>
  </body>   
</html>