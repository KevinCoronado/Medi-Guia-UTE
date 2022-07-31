<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
//El scrip de arriba sirve para que funciones la ventanas nodal que emergen al ingresar mal los datos o crear recordatorios

//Este php se encarga de crear recordatorios 

include("Conexion.php");
include("validarSesion.php");
//incluye la conexion para poder entrar a la bd 
//incluye validarsesion para que solo conecte con los datos del usuario

error_reporting(0);

//aqui se crean variables con los datos ingresados
$nombreCita = $_POST["Nombre_cita"];
$tipoCita = $_POST["Tipo_cita"];
$lugarCita = $_POST["Lugar_cita"];
$fechaCita = $_POST["Fecha_cita"];
$Estado = ("Activo");

//se insertan solo datos del usuario logeado
$InsertarCita = "INSERT INTO recordatorio_cita(id_usuario,nombre_record_cita,tipo,lugar,cita_fecha,estado) VALUES('$id_usuario',
'$nombreCita','$tipoCita','$lugarCita','$fechaCita','$Estado')";

$queryCita = pg_query($conexion,$InsertarCita);

//respuestas de la conexion
if($queryCita){
    //si se ingresaron datos
    include("Ver_Recordatorios.php");
    echo '<script >swal("Excelente!", "Recordatorio creado correctamente", "success");</script>';//este es un script
}else{
    //si no se ingresaron datos
    include("Crear_Recordatorio_Cita.html");
    echo '<script >swal("Error", "Datos erroneos, ingresa correctamente los datos!", "error");</script>';//este es un script
}

//Cerramos conexion
pg_close($conexion);

?>



