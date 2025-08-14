<?php
/**
 * @author Izan Garrido Quintana
 */

# Escribe un programa que dada una nota (entera) indique su correspondencia en el boletín (Ejemplo 5 sería SUFICIENTE)

# Saco la nota con un random para no tener que pedirlo al usuario.
$nota = rand(1,10);

switch ($nota) {

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
# Muestro la nota junto con su correspondencia
print "Nota: $nota; Correspondencia: $correspondencia.\n"

?>