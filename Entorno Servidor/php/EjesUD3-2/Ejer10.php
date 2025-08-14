<?php
/**
 * @author Izan Garrido Quintana
 */

# Crear y rellenar por teclado dos matrices de tamaño 3x3, sumarlas y mostrar su suma.


# Creo la matriz 1
print "Matriz 1.\n";
for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) { 
        $matriz1[$i][$j] = readline("Fila $i Columna $j: ");
    }

}
# Creo la matriz 2
print "\nMatriz 2.\n";
for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) { 
        $matriz2[$i][$j] = readline("Fila $i Columna $j: ");
    }

}
# Creo la matriz sumada a partir de la matriz 1 y 2, y la muestro
print "\nMatrizes sumadas.\n";
for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) { 
        printf("%d ",$sumada[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j]);
    }
    print "\n";

}

?>