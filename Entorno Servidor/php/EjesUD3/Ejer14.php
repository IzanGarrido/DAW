<?php

/**
 * @author Izan Garrido Quintana
 */

# Escribe una función que calcule todas las potencias de un número hasta llegar al exponente
# indicado, las almacene en un vector y muestre el resultado de cada potencia indicando además
# la suma de todas las potencias incluyendo la del exponente indicado.

function potencias($num,$exp) {

    for ($i=0; $i <= $exp; $i++) { 
        $potencias[$i] = pow($num, $i); 
        echo "$num elevado a $i es igual a ".pow($num,$i)."\n";
    }
        echo "La suma de todas las potencias es ".array_sum($potencias)."\n";

}

$num = readline("Dame el número : ");
$exp = readline("Dame el exponente a llegar: ");
potencias($num,$exp);


?>
