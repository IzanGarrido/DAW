<?php

/**
 * @author Izan Garrido Quintana
 */

# Diseña un programa para imprimir los números impares menores que N.

do {

    $num = readline("Dame un número: ");

    if ($num < 0) {
        print "El número no puede ser negativo\n";
    }

} while ($num < 0);

for ($i=0; $i < $num; $i++) { 
    # El porcentaje sirve para dividir dos numeros y devuelve el residuo
    if ($i%2 != 0) {
        echo "$i ";
    }
}

?>