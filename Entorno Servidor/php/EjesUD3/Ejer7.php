<?php

/**
 * @author Izan Garrido Quintana
 */

# Calcula, dada la fecha y hora actual y la fecha y hora deseada, cuántas horas y minutos quedan para dicho momento.

$entrada = readline("Dame una hora deseada con formato DD-MM hh:mm: ");

# Esta función sirve para crear un objeto DateTime según el formato indicado
$deseada = DateTime::createFromFormat('d-m H:i', $entrada);

$actual = new DateTime();

# La función diff() compara dos objetos DateTime y devuelve la diferencia
$diferencia = $deseada->diff($actual);

# Muestro la diferencia de horas y le doy formato con la función format()
echo "Diferencia: " . $diferencia->format('%m meses %d días, %h horas, %i minutos') . "\n";


?>