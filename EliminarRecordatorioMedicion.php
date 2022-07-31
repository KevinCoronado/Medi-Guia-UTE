<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
    include("Conexion.php");
    include("validarSesion.php");

    EliminarRecordatorioMedicion($_GET['id_record_medicion']);

    

    function EliminarRecordatorioMedicion($id_record_medicion)
    {
        $EstadoF=("Desactivado");
        $sentencia ="UPDATE recordatorio_medicion SET estado = '$EstadoF' WHERE id_record_medicion = '$id_record_medicion'";
        $eliminacion = pg_query($sentencia);
    }

error_reporting(0);


    include("Ver_Recordatorios.php");
    echo '<script>swal("Eliminado", "Eliminado correctamente", "success") </script>';//este es un script


?>