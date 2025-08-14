<?php

/**
 * @author Izan Garrido Quintana
 */
# Escribe una función que calcule A elevado a B, siendo A y B números enteros.
function exponente($num1,$num2) {
    # Uso contains para saber si es decimal ya que llevaria "."
    if (str_contains($num1, ".") || str_contains($num2, ".")){
        print "Los números tienen que ser enteros.\n";
    } else {
        # La función pow sirve para sacar la potencia
        echo "$num1 elevado a $num2 es igual a ".pow($num1,$num2)."\n";
    }
    
}

exponente($num1 = readline("Dame el número : "),$num2 = readline("Dame el exponente: "));

?>