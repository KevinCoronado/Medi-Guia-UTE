<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
//El scrip de arriba sirve para que funcionen la ventanas nodal que emergen al ingresar mal los datos o crear recordatorios
//Este php sirve para poder logearse a la pagina

include("Conexion.php");
session_start();
$_SESSION['login']=false;
 
//se crean variables a partir de los datos ingresados
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];


//se crea una consulta para verificar si el usuario existe en la bd
$consulta="SELECT*FROM Usuario WHERE Correo='$correo' AND Contraseña='$contraseña'";
$resultado=pg_query($conexion,$consulta);

$filas=pg_fetch_array($resultado);

    if($filas){
        #Existe el usuario
        $rol = $filas[4];         #Recordar que $filas[4] es para el numero de columna 
        $_SESSION['rol'] = $rol;  #dependiendo el orden de la tabla de BD y las columnas 
                                #empiezan desde 0,1,2,3, etc...

        switch($_SESSION['rol']){ //A partir del rol que tenga, se guiara a una pagina u otra
            case 1:
                $_SESSION['login']=true;    
                $_SESSION['id_usuario']=$filas['id_usuario'];  #$_SESSION es una variable superglobal
                $_SESSION['nombre']=$filas['nombre'];
                $_SESSION['correo']=$filas['correo'];
                $_SESSION['contraseña']=$filas['contraseña'];
                $_SESSION['id_rol']=$filas['id_rol'];
                header("location:Ver_Recordatorios.php");
            break;
            
            case 2:
                $_SESSION['login']=true;    
                $_SESSION['id_usuario']=$filas['id_usuario'];  #$_SESSION es una variable superglobal
                $_SESSION['nombre']=$filas['nombre'];
                $_SESSION['correo']=$filas['correo'];
                $_SESSION['contraseña']=$filas['contraseña'];
                $_SESSION['id_rol']=$filas['id_rol'];
                header("location:");
            break;

            default;
        }
    }  
        else{
        #No existe el usuario
        ?>
        <?php
        include("Login.html");// se le regresa al inicio
        echo '<script >swal("Vuelve a intentar", "Datos erroneos, ingresa correctamente los datos!", "error");</script>';
         
        ?>
    
        <?php
    }
pg_close($conexion);




