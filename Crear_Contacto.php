<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
//El scrip de arriba sirve para que funciones la ventanas nodal que emergen al ingresar mal los datos o crear recordatorios

//Este php se encarga de crear recordatorios 

include("Conexion.php");
include("validarSesion.php");
//incluye la conexion para poder entrar a la bd 
//incluye validarsesion para que solo conecte con los datos del usuario

error_reporting(0);

$nombreContacto = $_POST["Nombre"];
$apellidosContacto = $_POST["Apellidos"];
$especialidadContacto = $_POST["Especialidad"];
$correoContacto = $_POST["Correo"];
$telefonoContacto = $_POST["Telefono"];
$lugarContacto = $_POST["Lugar"];

//se insertan solo datos del usuario logeado
$InsertarContacto = "INSERT INTO contacto_medico(id_usuario,nombre,apellidos,especialidad,correo,telefono,lugar) VALUES('$id_usuario',
'$nombreContacto','$apellidosContacto','$especialidadContacto','$correoContacto','$telefonoContacto','$lugarContacto')";

$queryContacto = pg_query($conexion,$InsertarContacto);

//respuestas de la conexion
if($queryContacto){
    //si se ingresaron datos
    include("RegistrosContacto.php");
    echo '<script >swal("Excelente!", "Contacto creado correctamente", "success");</script>';//este es un script
    
}else{
    //si no se ingresaron datos
    include("Crear_Contacto.html");
    echo '<script >swal("Error", "Datos erroneos, ingresa correctamente los datos!", "error");</script>';//este es un script
}

//Cerramos conexion
pg_close($conexion);

?>




