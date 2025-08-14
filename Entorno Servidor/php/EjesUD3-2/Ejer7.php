<?php
/**
 * @author Izan Garrido Quintana
 */

# Define tres arrays de 20 números enteros cada uno, con nombres “numero”, “cuadrado” y “cubo”. 
# Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se 
# deben almacenar los cuadrados de los valores que hay en el array “numero”. 
# En el array “cubo” se deben almacenar los cubos de los valores que hay en “numero”. 
# A continuación, muestra el contenido de los tres arrays dispuesto en tres columnas

for ($i=0; $i < 20; $i++) { 
    $random = rand(0,100);
    $numero[$i] = $random;
    $cuadrado[$i] = pow($random,2);
    $cubo[$i] = pow($random,3);
}
# Formateo la salida con printf para que todo salga alineado
print "| Numero | Cuadrado |  Cubo   |\n";
for ($i=0; $i < 20; $i++) { 
    printf("| %6d | %8d | %7d |\n", $numero[$i], $cuadrado[$i], $cubo[$i]) ;
}
?>