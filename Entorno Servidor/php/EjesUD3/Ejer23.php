<?php
/**
 * @author Izan Garrido Quintana
 */

# Dado un vector asociativo de trabajadores con su salario creado solicitando al usuario el nombre
# y salario de cada trabajador, crea usando funciones el salario máximo, el salario mínimo y el
# salario medio.

function salario_maximo($arr) {
    # La función max() devuelve el valor mayor de un array
    return max($arr);
}

function salario_minimo($arr) {
    # La función min() devuelve el valor menor de un array
    return min($arr);
}

function salario_medio($arr) {

    return array_sum($arr)/count($arr);
}

$num_trabajadores = readline("Cantidad de trabajadores de la empresa: ");
# Pregunto el nombre y el salario de cada trabajador, el nombre lo añado como indice y el salario como valor.
for ($i=0; $i < $num_trabajadores; $i++) { 
    $nombre = readline("Nombre trabajador: ");
    $salario = readline("Salario: \n");

    $trabajadores[$nombre] = $salario;
}

print "Salario máximo: ". salario_maximo($trabajadores) . "\n";
print "Salario mínimo: ". salario_minimo($trabajadores) . "\n";
print "Salario medio: ". salario_medio($trabajadores) . "\n";
?>