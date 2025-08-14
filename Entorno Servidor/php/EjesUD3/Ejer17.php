<?php

/**
 * @author Izan Garrido Quintana
 */

# Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 3

$num = readline("Número: ");

if ($num%2 == 0 && $num%3 == 0) {
    print "El número es par y es divisible entre 3.\n";
} elseif ($num%3 == 0) {
    print "El número es divisible entre 3.\n";
} elseif ($num%2 == 0) {
    print "El número es par.\n";    
} else {
    print "El número ni es par ni es divisible entre 3.\n";
}


?>
