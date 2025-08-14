<?php

/**
 * @author Izan Garrido Quintana
 */

# Genera un número entre 1 y 15 y calcula su factorial. Nota: El factorial 
# de un número es la multiplicación de él mismo con sus anteriores. Ejemplo 3!=3*2*1=6
$numero = rand(1,15);

$res = 1;

for ($i=$numero; $i > 0; $i--) { 
    $res = $res*$i;

}
echo "El factorial del número $numero es $res\n";
?>