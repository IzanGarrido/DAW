<?php
/**
 * @author Izan Garrido Quintana
 */

# Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. 
# El programa nos pedirá la combinación para abrirla. Si no acertamos, 
# se nos mostrará el mensaje “Lo siento, esa no es la combinación” y si acertamos se nos dirá 
# “La caja fuerte se ha abierto satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.

# La combinación se genera con un random
$combinacion = rand(1000, 9999);

# Los intentos los hago con un bucle for
for ($i=1; $i <= 4; $i++) { 
    print "Intento nº: $i\n";
    $try = readline("Dame la combinación: ");

    if ($combinacion == $try) {
        print "La caja fuerte se ha abierto satisfactoriamente.\n";
        $i = 5;

    } else {
        print "Lo siento, esa no es la combinación.\n";
        
    }
}

?>