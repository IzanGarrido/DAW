<?php
/**
 * @author Izan Garrido Quintana
 */

# Ordena 3 números de modo que se impriman de mayor a menor. Si son iguales debe mostrar
# una advertencia indicando que son iguales


for ($i=1; $i < 4; $i++) { 
    $arr[$i] = readline("Número $i: ");

}
# La función rsort() ordena el array de mayor a menor
rsort($arr);

# Con el if compruebo que los números sean iguales, y si no muestro los numeros ordenados.
if ($arr[0] == $arr[1] && $arr[0] == $arr[2]) {
    echo "Los números son iguales";
} else {
    foreach ($arr as $i) {
        echo "$i > ";
    }
}

echo "\n";

?>