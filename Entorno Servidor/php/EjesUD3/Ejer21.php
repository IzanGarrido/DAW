<?php

/**
 * @author Izan Garrido Quintana
 */

# Escribe un programa que diga cuál es la penúltima cifra de un número entero introducido por
# teclado. Se permiten números de hasta 5 cifras. Puedes usar la función creada para el ejercicio
# 19
$num = readline("Número: ");

if (str_contains($num1, ".")){
    print "El número tiene que ser entero.\n";
} else if(strlen($num) > 5) {
    print "El número tiene más de 5 digitos\n";
    
} else {
    print substr($num,(strlen($num))-2, 1)."\n";  
}

?>