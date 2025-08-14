<?php
/**
 * @author Izan Garrido Quintana
 */

# Crear una matriz de tamaño 5x5 y rellenarla de la siguiente forma:
# la posición M[n,m] debe contener n+m. Después se debe mostrar su contenido.

# Creo el array con un for anidado
for ($i=0; $i < 5; $i++) { 
    for ($j=0; $j < 5; $j++) { 
        $matriz[$i][$j] = $i+$j;
    }
}
# Muestro el array con un for anidado

for ($i=0; $i < 5; $i++) { 
    for ($j=0; $j < 5; $j++) { 
        print $matriz[$i][$j]." ";
    }
    print "\n";
}

?>