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
$nombreMedicamento = $_POST["Nombre_Medicamento"];
$unidadMedicamento = $_POST["Unidad"];
$cantidadMedicamento = $_POST["Cantidad"];
$fecha_inicioMedicamento = $_POST["FechaInicio_Medicamento"];
$fecha_finMedicamento = $_POST["FechaFin_Medicamento"];
$horasMedicamento = $_POST["HorasMedicamento"];
$Estado = ("Activo");


//se insertan solo datos del usuario logueado
$InsertarMedicamento = "INSERT INTO recordatorio_medicina(id_usuario,nombre_record_medicina,unidad,cantidad
,medicina_fecha_inicial,medicina_fecha_final,cada_horas,estado) VALUES('$id_usuario','$nombreMedicamento',
'$unidadMedicamento','$cantidadMedicamento','$fecha_inicioMedicamento','$fecha_finMedicamento','$horasMedicamento','$Estado')";

$queryMedicamento = pg_query($conexion,$InsertarMedicamento);


//este es un script
if($queryMedicamento){
    include("Ver_Recordatorios.php");
    echo '<script >swal("Excelente!", "Recordatorio creado correctamente", "success");</script>';//este es un script
    
}else{
    //si no se ingresaron datos
    include("Crear_Recordatorio.html");
    echo '<script >swal("Error", "Datos erroneos, ingresa correctamente los datos!", "error");</script>';//este es un script
}

//Cerramos conexion
pg_close($conexion);

?>