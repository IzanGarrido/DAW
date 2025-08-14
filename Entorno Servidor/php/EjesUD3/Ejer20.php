<?php

/**
 * @author Izan Garrido Quintana
 */

# Elabora un programa que lea un número entero y escriba el número resultante de invertir el
# orden de sus cifras Puedes usar la función creada para el ejercicio 19
$num = readline("Número: ");

if (str_contains($num1, ".")){
    print "El número tiene que ser entero.\n";
} else {
    # La función strrev() sirve para darle la vuelta a un string y la función strval() para convertir un entero a un string
    print "El número ".$num." invertido, es ".strrev((strval($num)))."\n";
}

?>