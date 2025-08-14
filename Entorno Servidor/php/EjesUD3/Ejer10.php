<?php

/**
 * @author Izan Garrido Quintana
 */

# Genera un número entre 1 y 20 y calcula su sumatorio. 
# Nota: El sumatorio de un número es la suma de él mismo con sus anteriores.
# Ejemplo: 3=3+2+1=6
$numero = rand(1,20);

$res = 0;

for ($i=$numero; $i > 0; $i--) { 
    $res = $res+$i;

}
echo "El sumatorio del número $numero es $res\n";
?>