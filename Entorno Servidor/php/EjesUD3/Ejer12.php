<?php

/**
 * @author Izan Garrido Quintana
 */

# Crea un programa para leer las notas de los alumnos de una clase, 
# y que informe del número de alumnos cuya nota sea mayor de la media de la clase.

$alumnos = readline("Número de alumnos en la clase: ");

for ($i=1; $i < $alumnos+1; $i++) { 

    $notas[$i] = readline("Nota del alumno $i: ");
}
$media = array_sum($notas)/count($notas);

$cont = 0;
foreach ($notas as $nota) {

    if ($nota > $media) {
        $cont++;
    }

}

echo "Hay $cont alumnos con una nota superior a la media, que es $media.\n"

?>