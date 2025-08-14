<?php
/**
 * @author Izan Garrido Quintana
 */

# Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del día de la semana.

# Saco el número con un random para no tener que pedirlo al usuario.
$num = rand(1,7);

# Hago uso de switch para sacar el día de la semana dado el número usando la variable $dia.
switch ($num) {

    case 1:
        $dia = "Lunes";
        break;

    case 2:
        $dia = "Martes";
        break;

    case 3:
        $dia = "Miercoles";
        break;

    case 4:
        $dia = "Jueves";
        break;

    case 5:
        $dia = "Viernes";
        break;

    case 6:
        $dia = "Sabado";
        break;

    case 7:
        $dia = "Domingo";
        break;
    
}
# Muestro el dia de la semana
print "Para el número $num, el día de la semana es $dia.\n"

?>