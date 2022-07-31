

<?php
include("Conexion.php");
include("validarSesion.php");

$consultaUsuario = "SELECT * FROM usuario";
$consultaMedicamento = "SELECT * FROM recordatorio_medicina WHERE estado ='Activo'";    
$consultaMedicion = "SELECT * FROM recordatorio_medicion WHERE estado ='Activo'";
$consultaCita = "SELECT * FROM recordatorio_cita WHERE estado ='Activo'";
            
$datosUsuario = pg_query($conexion,$consultaUsuario);
$datosMedicamento = pg_query($conexion,$consultaMedicamento);
$datosMedicion = pg_query($conexion,$consultaMedicion);
$datosCita =  pg_query($conexion,$consultaCita);


#Datos generales
$asunto = "Recordatorio";
$destinatario = $datosUsuario['correo'];
$header = "Enviado desde Medi Guia"; 

#Datos solo para medicamentos
$mensajeMedicamento = "Tienes un recordatorio de :" . $datosMedicamento['nombre_record_medicina'] . $datosMedicamento['cantidad'] . 
. $datosMedicamento['unidad'] . " cada: " . $datosMedicamento['cada_horas'];

#Datos solo para medicion
$mensajeMedicion = "Tienes un recordatorio de :" . $datosMedicion['nombre_record_medicion'] . $datosMedicion['tipo'] . 
. " cada: " . $datosMedicion['cada_horas'];

#Datos solo para Cita
$mensajeCita = "Tienes una cita :" . $datosCita['nombre_record_cita'] . " tipo: " . $datosCita['tipo'] . 
" en: " . $datosCita['lugar'] . " a las: " . $datosCita['cita_fecha'];



$AlarmaM = $datosMedicamento['medicina_fecha_inicial'];
$AlarmaMe = $datosMedicion['medicion_fecha_inicial'];
$AlarmaC = $datosCita['cita_fecha'];

if($datosMedicamento){
    $finAlarma = $datosMedicamento['medicina_fecha_final'];
    $fecha_actual = new DateTime(date('Y-m-d H:i:s'));

    if($AlarmaM == $fecha_actual){
        email($destinatario, $asunto, $mensajeMedicamento, $header);
        switch($datosMedicamento['cada_horas']){
            case "1 hora":
                $AlarmaM2 ->modify('+1 hours');
            case "2 horas":
                $AlarmaM2 ->modify('+2 hours');

            case "3 horas":
                $AlarmaM2 ->modify('+3 hours');

            case "4 horas":
                $AlarmaM2 ->modify('+4 hours');

            case "5 horas":
                $AlarmaM2 ->modify('+5 hours');

            case "6 horas":
                $AlarmaM2 ->modify('+6 hours');

            case "7 horas":
                $AlarmaM2 ->modify('+7 hours');

            case "8 horas":
                $AlarmaM2 ->modify('+8 hours');

            case "9 horas":
                $AlarmaM2 ->modify('+9 hours');

            case "10 horas":
                $AlarmaM2 ->modify('+10 hours');

            case "11 horas":
                $AlarmaM2 ->modify('+11 hours');

            case "12 horas":
                $AlarmaM2 ->modify('+12 hours');

            case "24 horas":
                $AlarmaM2 ->modify('+24 hours');
        }

        if($AlarmaM2)
        

        
        if($fecha_actual == $finAlarma){
            $sentenciaFinM = "UPDATE recordatorio_medicina SET estado = 'Desactivado' WHERE id_record_medicina = $id_record_medicina";
            pg_query($conexion,$sentenciaFinM);
        }

        }
    }


}

if($datosMedicion){
    $finAlarma = $datosMedicion['medicion_fecha_final'];
    $fecha_actual = new DateTime(date('Y-m-d H:i:s'));

    if($AlarmaMe == $fecha_actual){
        email($destinatario, $asunto, $mensajeMedicion, $header);
    do{
        switch($datosMedicion['cada_horas']){
            case "1 hora":
                $AlarmaMe ->modify('+1 hours');

            case "2 horas":
                $AlarmaMe ->modify('+1 hours');

            case "3 horas":
                $AlarmaMe ->modify('+1 hours');

            case "4 horas":
                $AlarmaMe ->modify('+1 hours');

            case "5 horas":
                $AlarmaMe ->modify('+1 hours');

            case "6 horas":
                $AlarmaMe ->modify('+1 hours');

            case "7 horas":
                $AlarmaMe ->modify('+1 hours');

            case "8 horas":
                $AlarmaMe ->modify('+1 hours');

            case "9 horas":
                $AlarmaMe ->modify('+1 hours');

            case "9 horas":
                $AlarmaMe ->modify('+1 hours');

            case "10 horas":
                $AlarmaMe ->modify('+1 hours');

            case "11 horas":
                $AlarmaMe ->modify('+1 hours');

            case "12 horas":
                $AlarmaMe ->modify('+1 hours');

            case "24 horas":
                $AlarmaMe ->modify('+1 hours');
        }while($fecha_actual < $finAlarma)                                                                                       

        $sentenciaFinMe = "UPDATE recordatorio_medicion SET estado = 'Desactivado' WHERE id_record_medicion = $id_record_medicion";
        pg_query($conexion,$sentenciaFinMe);
        }
    }
}

if($datosCita){
    $primerAlarma = $datosCita['cita_fecha'];
    $fecha_actual = new DateTime(date('Y-m-d H:i:s'));

    if($primerAlarma == $fecha_acutal){
        email($destinatario, $asunto, $mensajeCita, $header);
        
    $sentenciaFinC = "UPDATE recordatorio_cita SET estado = 'Desactivado' WHERE id_record_cita = $id_record_cita";
    pg_query($conexion,$sentenciaFinC);
        }

        
    }   


/*
Alarma que :
Inicie cuando empieze fecha inicial,
Se autoincremente el cada horas
Cadaa que sea la hroa de la alrma, salga la notificacion del
Se finalize a la hroa de Fecha fin
Cuando llegue a fehca fin, esta cambie de estado a Desactivado
*/

?>
