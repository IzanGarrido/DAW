<?php
/**
 * @author Izan Garrido Quintana
 */

# Ejercicio 7 Calcula, dada dos fechas inicio y final introducidas por el usuario
# (puede ser la actual y otra deseada), cuántos días, horas y minutos hay de
# diferencia entre dichas horas.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 8</h1>

<form action="./Ejer8.php" method="post">
    <label for="inicio">Fecha inicial:</label>
    <input type="text" id="inicio" name="inicio" placeholder="DD-MM hh:mm"><br><br>

    <label for="final">Fecha final:</label>
    <input type="text" id="final" name="final" placeholder="DD-MM hh:mm"><br><br>

    <input type="submit" name="submit">

</form>
    
</body>
</html>

<?php 

function esMayor($fecha1, $fecha2) {
    if ($fecha1 < $fecha2) {
        return true;
    } else {
        return false;
    }


}

function formato($inicial, $final) {

    if (preg_match("/^\d{2}-\d{2} \d{2}:\d{2}$/",$inicial) && 
        preg_match("/^\d{2}-\d{2} \d{2}:\d{2}$/",$final)) {

        return true;
        
    } else {
        return false;
    }

}

function comparar($inicial,$final) {

    $fecha1 = DateTime::createFromFormat("d-m H:i", $inicial);
    $fecha2 = DateTime::createFromFormat("d-m H:i", $final);

    if (!formato($inicial, $final)) {
        return "Formato incorrecto";

    } elseif(!esMayor($fecha1, $fecha2)) {
        return "La fecha inicial debe ser menor a la fecha final";


    } else {
        $diferencia = $fecha1->diff($fecha2);

        return $diferencia->format('%m meses %d días, %h horas, %i minutos');

    }

}

if (isset($_POST["submit"])) {
    $inicial = $_POST["inicio"];
    $final = $_POST["final"];

    echo comparar($inicial,$final);
}

?>  