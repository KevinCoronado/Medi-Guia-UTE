<?php
    session_start(); //inicia una nueva sesion o reanuda la existente
    $login = $_SESSION['login'];

    if(!$login)
        {
            header('Location:index.html');
        }
        else{
            $id_usuario = $_SESSION['id_usuario'];

        }
?>