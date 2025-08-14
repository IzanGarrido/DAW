<?php
/**
 * @author Izan Garrido Quintana
 */

# Diseñar la función operaMatriz, a la que se le pasa dos matrices de enteros
# positivos mayores de 0 y la operación que se desea realizar: sumar, restar,
# multiplicar o dividir (mediante un carácter: 's', 'r', 'm', 'd'). La función
# debe imprimir las matrices originales, indicar la operación a realizar y
# la matriz con los resultados

function operaMatriz($matriz1, $matriz2, $operacion) {
    $realizar = "";
    switch ($operacion) {
        case 's':
            $operacion = "+";
            $realizar = "suma";
            break;
        
        case 'r':
            $operacion = "-";
            $realizar = "resta";
            break;
        
        case 'm':
            $operacion = "*";
            $realizar = "multiplicación";
            break;
        
        case 'd':
            $operacion = "/";
            $realizar = "división";
            break;
    }
    # Opero las matrices
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 3; $j++) { 
            $str = '$matriz1[$i][$j] ' . $operacion . ' $matriz2[$i][$j];';
            $matriz3[$i][$j] = eval('return ' . $str);
        }
        

    }

    # Muestro las matrices originales
    print "Matriz 1: \n";
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 3; $j++) { 
            printf("%3d ", $matriz1[$i][$j]);
        }
        print "\n";
        
    }
    print "\nMatriz 2: \n";
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 3; $j++) { 
            printf("%3d ", $matriz2[$i][$j]);
        }
        print "\n";
        
    }
    # Operación a realizar
    print "\nLa operacion a realizar es una " . $realizar . ".\n";
    # Muestro la matriz sumada
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 3; $j++) { 
            printf("%4d ", $matriz3[$i][$j]);
        }
        print "\n";
    }
    

}

# Creo las matrices con valores random entre 1 y 100
for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) { 
        $matriz1[$i][$j] = rand(1,100);
        $matriz2[$i][$j] = rand(1,100);
    }
   
}


# Indico la operación a realizar con un random de un array
$operacion_arr = array("s","r","m","d");
$operacion = $operacion_arr[array_rand($operacion_arr, 1)];

operaMatriz($matriz1, $matriz2, $operacion);

?>