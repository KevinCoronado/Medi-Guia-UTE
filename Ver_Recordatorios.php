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
    <link rel="stylesheet" href="css/Style_Li_Form.css">
    <title>Ver Recordatorios</title>
</head>
<body>
    <header>
        <div class="container">
            <img src="css/Imagenes/Medi guia logo.png" alt="MediGuiaLogo" class="logo">
            <nav>
                <li><a href="">Recordatorios</a>
                    <ul>
                        <li><a href="../Mediguia/Crear_Recordatorio.html">Crear recordatorio medicinal</a></li>
                        <li><a href="./Crear_Recordatorio_Medicion.html">Crear recordatorio de medicion</a></li>
                        <li><a href="./Crear_Recordatorio_Cita.html">Crear recordatorio de cita medica</a></li>
                        <li><a href="./Ver_Recordatorios.php">Ver recordatorios creados</a></li>
                    </ul>
                </li>

                <a href="./ListaCheck.html">Reportes diarios</a>
                <a href="./Calendario.html">Agenda</a>

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
    <section id="Mostrar_Recordatorios">
        <h1>Recordatorios Creados</h1>

        <div>
            <table>
                <tr>
                    <th>Recordatorios Creados</th>
                    <th>Descripcion</th>
                    <th>Accion</th>
                </tr>
            <?php
            //En esta parte solo se recojen los datos del usuario logueado
            $consultaMedicamento = "SELECT * FROM recordatorio_medicina WHERE id_usuario = '$id_usuario' AND estado ='Activo'";    
            $consultaMedicion = "SELECT * FROM recordatorio_medicion WHERE id_usuario = '$id_usuario' AND estado ='Activo'";
            $consultaCita = "SELECT * FROM recordatorio_cita WHERE id_usuario = '$id_usuario' AND estado ='Activo'";
            
            $datosMedicamento = pg_query($conexion,$consultaMedicamento);
            $datosMedicion = pg_query($conexion,$consultaMedicion);
            $datosCita =  pg_query($conexion,$consultaCita);
    
            while($filaMedicamento=pg_fetch_array($datosMedicamento)){
    
            ?>
            
                <tr>
                    <td><strong>Medicamento</strong> 
                        <?php echo $filaMedicamento['nombre_record_medicina'] ," ", "(", $filaMedicamento['unidad'],")" ?><br> 
                        <strong><?php echo "Fecha de inicio: "?></strong>  <?php echo $filaMedicamento['medicina_fecha_inicial'] ?><br>
                        <strong><?php echo "Fecha de fin: "?></strong>  <?php echo $filaMedicamento['medicina_fecha_final']?>
                    </td>
                    <td>
                        <strong><?php echo "Cantidad: "?></strong> <?php echo$filaMedicamento['cantidad']," ","(", $filaMedicamento['unidad'],")" ?><br>
                        <strong><?php echo "Cada: "?></strong> <?php echo$filaMedicamento['cada_horas'] ?><br>
                    </td>
                    <td style="border:0px;">
                        <?php echo "<a href='EliminarRecordatorioMedicina.php?id_record_medicina=".$filaMedicamento['id_record_medicina']."'>
                        <button>Eliminar</button></a>";?>
                    </td>
                </tr>
                <?php
            }
            ?>

            <?php
            while($filaMedicion=pg_fetch_array($datosMedicion)){
            ?>
                <tr>
                <td><strong>Medicion</strong><br>
                    <?php echo $filaMedicion['nombre_record_medicion'] ?><br> 
                    <strong><?php echo "Fecha de inicio: "?></strong> <?php echo $filaMedicion['medicion_fecha_inicial'] ?><br>
                    <strong><?php echo "Fecha de fin: "?></strong> <?php echo $filaMedicion['medicion_fecha_final']?>
                </td>
                <td>
                    <strong><?php echo "Tipo: "?></strong> <?php echo$filaMedicion['tipo'] ?><br>
                    <strong><?php echo "Cada: "?></strong> <?php echo$filaMedicion['cada_horas'] ?><br>
                </td>
                <td style="border:0px;">
                    <?php echo "<a href='EliminarRecordatorioMedicion.php?id_record_medicion=".$filaMedicion['id_record_medicion']."'>
                    <button>Eliminar</button></a>";?>
                </td>
            </tr>

            <?php
            }
            ?>

            <?php
            while($filaCita=pg_fetch_array($datosCita)){
            ?>
                <tr>
                <td><strong>Cita medica</strong> <br>
                    <strong><?php echo $filaCita['nombre_record_cita'] ?><br> 
                    <strong><?php echo "Fecha de inicio : "?></strong> <?php echo $filaCita['cita_fecha'] ?><br>
                </td>
                <td>
                    <strong><?php echo "Tipo: "?></strong> <?php echo$filaCita['tipo'] ?><br>
                    <strong><?php echo "Lugar: "?></strong> <?php echo$filaCita['lugar'] ?><br>
                </td>
                <td style="border:0px;">
                    <?php echo "<a href='EliminarRecordatorioCita.php?id_record_cita=".$filaCita['id_record_cita']."'>
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