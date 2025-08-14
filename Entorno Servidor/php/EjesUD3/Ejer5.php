<?php

/**
 * @author Izan Garrido Quintana
 */
# Diseña un programa que determine la cantidad total a pagar por una llamada telefónica 
# de acuerdo a las siguientes premisas: Toda llamada que dure menos de 3 minutos tiene 
# un coste de 10 céntimos. Cada minuto adicional a partir de los 3 primeros es un paso 
# de contador y cuesta 5 céntimos.

$minutos = readline("Minutos que ha durado la llamada: ");

$precio = 0.10;

# Por cada minuto que es superior a 3, se va sumando 0.05 a la variable precio
for ($i=3; $i < $minutos; $i++) { 
    $precio = $precio+0.05;
    
}
printf("El precio a pagar es de %.2f €\n", $precio);

?>