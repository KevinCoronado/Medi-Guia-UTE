<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
    include("Conexion.php");
    include("validarSesion.php");

    EliminarRecordatorioCita($_GET['id_record_cita']);

    

    function EliminarRecordatorioCita($id_record_cita)
    {   
        $EstadoF=("Desactivado");
        $sentencia ="UPDATE recordatorio_cita SET estado = '$EstadoF' WHERE id_record_cita = '$id_record_cita'";
        $eliminacion = pg_query($sentencia);
    }


    error_reporting(0);

    include("Ver_Recordatorios.php");
    echo '<script>swal("Eliminado", "Eliminado correctamente", "success") </script>';//este es un script


?>