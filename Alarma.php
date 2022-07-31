
<?php
$fecha_actual = new DateTime(date('Y-m-d'));

while ($row=mysqli_fetch_array($result))
{ 
    echo "<td class='text-center'>".$row['fecha_inicio']."</td>";  
    echo "<td class='text-center'>".$row['fecha_final']."</td>";

    $fecha_final = new DateTime($row['fecha_final']);
    $dias = $fecha_actual->diff($fecha_final)->format('%r%a');

    // Si la fecha final es igual a la fecha actual o anterior
    if ($dias <= 0) {
        echo '<td>Mantenimiento vencido</td>';
    } elseif ($dias <= 2) {
        echo '<td>Está a ' . $dias . ' días de vencer</td>';
    } else {
        echo '<td></td>';
    }

    echo "</tr>";
}

?>