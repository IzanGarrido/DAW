<?php
/**
 * @author Izan Garrido Quintana
 */

# Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y
# cuántos son negativos (muestra los números, la cantidad de positivos y negativos y el porcentaje
# de cada grupo)
for ($i=0; $i < 10; $i++) { 
    $nums[$i] = readline("Número ". $i+1 .": \n");
}

$negativos = array();
$positivos = array();
# Creo dos arrays y con push voy introduciendo el número en el array correspondiente
foreach ($nums as $num) {
    if ($num < 0) {
        array_push($negativos, $num);
    } else
        array_push($positivos, $num);

}

print count($negativos) ." Números negativos:";

foreach ($negativos as $num) {
    print " $num,";
}

print " ". (count($negativos)/10)*100 ."%\n";

print count($positivos) ." Números positivos: ";

foreach ($positivos as $num) {
    print " $num,";
}
print " ". (count($positivos)/10)*100 ."%\n";

?>