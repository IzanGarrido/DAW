<?php

/**
 * @author Izan Garrido Quintana
 */
# Escribe un programa que lea tres números positivos y compruebe si son iguales. Por ejemplo:
# Si la entrada fuese 5 5 5, la salida debería ser “hay tres números iguales a 5“.
# Si la entrada fuese 4 6 4, la salida debería ser “hay dos números iguales a 4“.
# Si la entrada fuese 0 1 2, la salida debería ser “no hay números iguales“

# Uso do while para que la primera iteración se haga
do {
   
    for ($i=1; $i <= 3; $i++) { 
        $numeros[$i] = readline("Número $i: ");
    
    }

    if ($numeros[1] < 0 || $numeros[2] < 0 || $numeros[3] < 0) {
        print "Los números no pueden ser negativos\n";
    }

} while ($numeros[1] < 0 || $numeros[2] <0 || $numeros[3] < 0);

if ($numeros[1] == $numeros[2] && $numeros[1] == $numeros[3]) {
    echo "Hay 3 números iguales a ". $numeros[1]."\n";
} elseif ($numeros[1] == $numeros[2] || $numeros[1] == $numeros[3]) {
    echo "Hay 3 números iguales a ". $numeros[1]."\n";
} elseif ($numeros[2] == $numeros[3]) {
    echo "Hay 3 números iguales a ". $numeros[2]."\n";
} else {
    echo "No hay numeros iguales\n";
}

?>