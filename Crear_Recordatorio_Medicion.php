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
$nombreMedicion = $_POST["Nombre_medicion"];
$tipoMedicion = $_POST["Tipo"];
$fecha_inicioMedicion = $_POST["FechaInicio_Medicion"];
$fecha_finMedicion = $_POST["FechaFin_Medicion"];
$horasMedicion = $_POST["HorasMedicion"];
$Estado = ("Activo");

//se insertan solo datos del usuario logeado
$InsertarMedicion = "INSERT INTO recordatorio_medicion(id_usuario,nombre_record_medicion,tipo,
medicion_fecha_inicial,medicion_fecha_final,cada_horas,estado) VALUES('$id_usuario','$nombreMedicion','$tipoMedicion','$fecha_inicioMedicion','$fecha_finMedicion'
,'$horasMedicion','$Estado')";



$queryMedicion = pg_query($conexion,$InsertarMedicion);


//este es un script
if($queryMedicion){
    //si se ingresaron datos
    include("Ver_Recordatorios.php");
    echo '<script >swal("Excelente!", "Recordatorio creado correctamente", "success");</script>';//este es un script
}else{
    //si no se ingresaron datos
    include("Crear_Recordatorio_Medicion.html");
    echo '<script >swal("Error", "Datos erroneos, ingresa correctamente los datos!", "error");</script>';//este es un script
}

//Cerramos conexion
pg_close($conexion);

?>