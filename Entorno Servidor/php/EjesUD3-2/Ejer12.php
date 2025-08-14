<?php
/**
 * @author Izan Garrido Quintana
 */

# Crear un programa para introducir números por teclado mientras su suma no
# alcance o iguale a 1000. Cuando ésto ocurra, debes mostrar los números
# introducidos, cuántos son, el total de la suma y la media de todos ellos.

# Inicio la variable suma y la variable cont, que es para ir añadiendo los números en un vector
$suma = 0;
$cont = 0;
while ($suma <= 1000) {
    $numeros[$cont] = readline("Número: ");
    $suma += $numeros[$cont];
    $cont++;
}

print "Números introducidos:\n";
foreach ($numeros as $num) {
    print $num."\n";
}

print "Son " . count($numeros) . " números.\n";
print "Resultado suma: " . $suma . "\n";
print "Media: " . $suma/count($numeros) . "\n";

?>