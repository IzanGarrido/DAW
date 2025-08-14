<?php
/**
 * @author Izan Garrido Quintana
 */

# Calcula la media de varios números (mínimo 5) y redondea el resultado. Muestra los números
# introducidos y el resultado sin redondear y tras el redondeo.

$nums = readline("Números a introducir (mínimo 5): ");
$arr = array();
# Pido Cuantos numeros introducir y los introduzco con un bucle for en un array
for ($i=1; $i < $nums+1; $i++) { 
    $arr[$i] = readline("Número $i: ");

}
echo "\n";

for ($i=1; $i < $nums+1; $i++) { 
    echo "Número $i: ".$arr[$i]."\n";

}
# Saco la media usando la función array_sum() que sirve para sumar todos los numeros 
# y uso la función count() para saber cuantos indices tiene el array y los divido para sacar la media
echo "Media: ". array_sum($arr)/count($arr)."\n";
# Para el redondeo uso lo mismo que lo anterior además de usar la función round().
echo "Redondeo: ". round(array_sum($arr)/count($arr))."\n";

?>