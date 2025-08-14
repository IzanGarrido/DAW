<?php

/**
 * @author Izan Garrido Quintana
 */

# Escribe un programa que diga cuál es la cifra que está en el centro (o las dos del centro si el
# número de cifras es par) de un número entero introducido por teclado
$num = readline("Número: ");

# La función substr() sirve para partir un string según el indice
# La función strlen() te indica la longitud de un string
if ($num%2 == 0) {
    print substr($num,(strlen($num)/2)-1, 2)."\n";    
} else {
    print substr($num,(strlen($num)/2), 1)."\n";    
}


?>
