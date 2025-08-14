<?php

/**
 * @author Izan Garrido Quintana
 */

# Crea la tabla de multiplicar a partir de un número
$numero = readline("Dame un número: ");

for ($i=0; $i < 11; $i++) { 
    printf("%2d x %2d: =%4d\n", $numero, $i, ($numero*$i));

}

?>