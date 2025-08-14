<?php
/**
 * @author Izan Garrido Quintana
 */

#Genera un mensaje de modo que si el día actual es menor o igual que 15 muestre “primera
#quincena” mostrando “segunda quincena” en otro caso. Haz una modificación para poder leer el
#día

# La función date() con la variable d muestra el nº del mes actual
if (date("d") <= 2) {
    echo "Primera quincena\n";
} else {
    echo "Segunda quincena\n";
}

?>