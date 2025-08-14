<?php

/**
 * @author Izan Garrido Quintana
 */

# Crea un programa que reciba una hora expresada en segundos transcurridos desde
# las 12 de la noche y la convierta en horas, minutos y segundos
$var = rand(1,86400);

# Uso printf para formatear la salida y operaciones logicas para pasar a hora minutos segundos
printf("Para ".$var." segundos, son las %02d:%02d:%02d \n", ($var/ 3600),($var/ 60 % 60), $var% 60);

?>