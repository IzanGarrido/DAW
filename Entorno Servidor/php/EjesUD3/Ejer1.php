<?php

/**
 * @author Izan Garrido Quintana
 */

# Elabora un programa que dado un carácter determine si es:
# 1. una letra mayúscula
# 2. una letra minúscula
# 3. un carácter numérico
# 4. un carácter blanco
# 5. un carácter de puntuación
# 6. un carácter especial

$caracter = readline("Dame un carácter: ");

# Las funciones ctype_() sirven para saber que tipo de caracter es.
switch ($caracter) {
    case ctype_upper($caracter):

        echo "Es mayuscula\n";
        break;
    case ctype_lower($caracter):

        echo "Es minuscula\n";
        break;
    case ctype_alnum($caracter):

        echo "Es un número\n";
        break;
    case ctype_space($caracter):

        echo "Está en blanco\n";
        break;
    case ctype_punct($caracter):

        echo "Es un cáracter de puntuación\n";
        break;
    case ctype_alpha($caracter):

        echo "Es un cáracter especial\n";
        break;

    default:
        echo "No es ninguno de los anteriores\n";
        break;
}

?>