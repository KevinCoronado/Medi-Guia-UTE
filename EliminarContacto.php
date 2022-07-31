<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
    include("Conexion.php");
    include("validarSesion.php");

    EliminarContacto($_GET['id_contacto']);

    function EliminarContacto($id_contacto)
    {
        $sentencia ="DELETE FROM contacto_medico 
        WHERE id_contacto = '$id_contacto'";
       $eliminacion = pg_query($sentencia);
    }

error_reporting(0);


    include("RegistrosContacto.php");
    echo '<script>swal("Eliminado", "Eliminado correctamente", "success") </script>';//este es un script


?>
