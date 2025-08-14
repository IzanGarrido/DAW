<?php
/**
 * @author Izan Garrido Quintana
 */

# Muestra los múltiplos de 5 entre 0 y 100 usando:
# a) bucle for
# b) bucle while
# c) bucle do-while

print "Bucle for:\n";

for ($i=0; $i <= 100 ; $i++) { 
    if ($i%5==0) print "$i\n";

}

print "Bucle while:\n";
$i = 0;
while ($i <= 100) {
    print "$i\n";
    $i+=5;
}

print "Bucle do-while:\n";
$i = 0;
do {
    print "$i\n";
    $i+=5;
} while ($i <= 100);

?>