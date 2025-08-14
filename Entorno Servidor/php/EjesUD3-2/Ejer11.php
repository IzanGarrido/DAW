<?php
/**
 * @author Izan Garrido Quintana
 */

# Crear y rellenar una tabla de tamaño 10x10, mostrar la suma de cada fila y de cada columna

# Relleno la tabla cono números random del 1 al 5
for ($i=0; $i < 10; $i++) { 
    for ($j=0; $j < 10; $j++) { 
        $tabla[$i][$j] = rand(1,5);
    }
}

# Muestro la tabla para comprobar que las sumas están bien hechas
for ($i=0; $i < 10; $i++) { 
    for ($j=0; $j < 10; $j++) { 
        print $tabla[$i][$j] . " ";
    }
    print "\n";
}

# Muestro las sumas de las filas y la columnas
for ($i=0; $i < 10; $i++) { 
    $filas = 0;
    $columnas = 0;
    for ($j=0; $j < 10; $j++) { 
        $filas += $tabla[$i][$j];
        $columnas +=$tabla[$j][$i];
    }
    print"Fila ". $i+1 .": $filas.\n";
    print"Columna ". $i+1 .": $columnas.\n";

}

?>