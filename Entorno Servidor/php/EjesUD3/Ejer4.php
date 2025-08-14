<?php

/**
 * @author Izan Garrido Quintana
 */

# Elabora un programa para determinar si una hora leída en la forma horas, minutos y segundos está correctamente expresada.

$horas = readline("Dame las horas: ");
$minutos = readline("Dame los minutos: ");
$segundos = readline("Dame los segundos: ");

# Esta variable hace de booleano
$bol = 1;

# Con los diferentes whiles voy comprobando que la hora introducida sea correcta y si no la cambio
while ($segundos > 59) {
    $segundos = $segundos-60;
    $minutos++;
    $bol = 0;
}

while ($minutos > 59) {
    $minutos = $minutos-60;
    $horas++;
    $bol = 0;
}

while ($horas >= 24) {
    $horas = $horas-24;
    $bol = 0;
}

# Se usa el interrogante para booleanos, delante de los dos puntos se muestra si es verdadero, y detrás si es falso
($bol) ? : print "El formato es incorrecto; ";
printf("Son las %02d:%02d:%02d \n", $horas,$minutos, $segundos);

?>