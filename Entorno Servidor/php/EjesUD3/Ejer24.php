<?php
/**
 * @author Izan Garrido Quintana
 */

# Con los trabajadores del ejercicio anterior, calcular el salario actual y el salario aumentado un
# porcentaje indicado por la variable
$num_trabajadores = readline("Cantidad de trabajadores de la empresa: ");

for ($i=0; $i < $num_trabajadores; $i++) { 
    $nombre = readline("Nombre trabajador: ");
    $salario = readline("Salario: \n");

    $trabajadores[$nombre] = $salario;
}

$porcentaje = readline("Porcentaje a aumentar el salario: ");

foreach ($trabajadores as $trabajador => $salario) {

    print "Trabajador: ". $trabajador . "\n";
    print "Salario actual: ". $salario . "\n";
    # Esta operación es para sumarle el porcentaje indicado al salario del trabajador
    print "Salario con un $porcentaje%: ". ($salario) + ($salario * ($porcentaje/100)) . "\n";
}

?>