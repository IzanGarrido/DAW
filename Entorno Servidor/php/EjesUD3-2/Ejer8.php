<?php
/**
 * @author Izan Garrido Quintana
 */

# Leer por teclado y rellenar dos vectores de 10 números enteros y mezclarlos
# en un tercer vector de la forma: el 1º de A, el 1º de B, el 2º de A, el 2º de B, etc.

# Creo los dos arrays y los relleno
for ($i=0; $i < 10; $i++) { 
    $primero[$i] = $i+1;    
    $segundo[$i] = $i+11;    
}
# Inicio dos contadores, uno para el tercer vector, y otro para el primero y el segundo
$i = 0;
$cont=0;
# Relleno el vector con while
while ($cont < 20) {
    $tercero[$cont] = $primero[$i];    
    $cont++;
    $tercero[$cont] = $segundo[$i];
    $cont++;
    $i++;
}
# Lo muestro con var_dump()
var_dump($tercero);

?>