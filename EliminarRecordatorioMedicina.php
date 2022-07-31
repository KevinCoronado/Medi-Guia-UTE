<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
    include("Conexion.php");
    include("validarSesion.php");

    EliminarRecordatorioMedicina($_GET['id_record_medicina']);

    

    function EliminarRecordatorioMedicina($id_record_medicina)
    {
        $EstadoF=("Desactivado");
        $sentencia ="UPDATE recordatorio_medicina SET estado = '$EstadoF' WHERE id_record_medicina = '$id_record_medicina'";
        $eliminacion = pg_query($sentencia);
    }

error_reporting(0);


    include("Ver_Recordatorios.php");
    echo '<script>swal("Eliminado", "Eliminado correctamente", "success") </script>';//este es un script


?>