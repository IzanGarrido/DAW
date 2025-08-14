<?php
/**
 * @author Izan Garrido Quintana
 */

# Generar un número aleatorio entre 1 y 5 de modo que muestre el número y su nombre en letras
# (Ejemplo: 3 – tres)
$var = rand(1, 5);

switch ($var) {
    case 1:
        echo "$var - uno\n";
        break;
    case 2:
        echo "$var - dos\n";
        break;
    case 3:
        echo "$var - tres\n";
        break;
    case 4:
        echo "$var - cuatro\n";
        break;
    case 5:
        echo "$var - cinco\n";
        break;
}
?>