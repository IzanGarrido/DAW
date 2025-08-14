<?php
/**
 * @author Izan Garrido Quintana
 */

# Realiza un programa que pida 8 números enteros, los almacene en un vector
# junto con la palabra “par” o “impar” según proceda y los muestre.
# además debe indicar la cantidad de números en cada caso y el porcentaje de pares e impares.

$numeros = array("par","impar");
$numeros["par"] = array();
$numeros["impar"] = array();
for ($i=0; $i < 8 ; $i++) { 
    $num = readline("Numero ". $i+1 . ": ");
    if (str_contains($num, '.')) {
        print "El número ha de ser entero!\n";
        $i--;
    } else if ($num%2 == 0) {
        array_push($numeros["par"], $num);
    } else {
        array_push($numeros["impar"], $num);
    }
}

print count($numeros["par"]) . " Números pares. " . (count($numeros["par"])*100)/8 . "%\n";
foreach ($numeros["par"] as $valor) {
    print "$valor ";
}
print "\n";
print count($numeros["impar"]) . " Números impares. " . (count($numeros["impar"])*100)/8 . "%\n";
foreach ($numeros["impar"] as $valor) {
    print "$valor ";
}

?>