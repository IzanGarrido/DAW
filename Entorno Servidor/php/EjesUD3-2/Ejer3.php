<?php
/**
 * @author Izan Garrido Quintana
 */

# Escribe un programa que calcule la media aritmética de 7 notas y la muestre
# junto con su correspondencia en el boletín que has realizado en el ejercicio anterior

# Saco las notas con un random para no tener que pedirlo al usuario.
for ($i=0; $i < 8; $i++) { 
    $notas[$i] = rand(1,10);
}
# La función floor() sirve para quitar los decimales de un número
$media = floor(array_sum($notas)/count($notas));

switch ($media) {

    case 1:
    case 2:
    case 3:
    case 4:
        $correspondencia = "Insuficiente";
        break;

    case 5:
        $correspondencia = "Suficiente";
        break;

    case 6:
        $correspondencia = "Bien";
        break;

    case 7:
    case 8:
        $correspondencia = "Notable";
        break;

    case 9:
    case 10:
        $correspondencia = "Sobresaliente";
        break;
    
}
# Muestro la media de las notas junto con su correspondencia
print "Media: $media; Correspondencia: $correspondencia.\n"

?>