<?php
    //Este php se usa en el boton de cerrar sesion, basicamente para cerrar al sesion del usuario logeado

    session_start();
    session_destroy();
    header("Location:index.html");
?>