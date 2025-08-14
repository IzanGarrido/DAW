<?php
/**
 * @author Izan Garrido Quintana
 */

# Ejercicio 5 Diseña un programa que determine la cantidad total a pagar por 5 llamadas
# telefónicas de duración a introducir por el usuario de acuerdo a las siguientes
# premisas: Toda llamada que dure menos de 3 minutos tiene un coste de 10 céntimos.
# Cada minuto adicional a partir de los 3 primeros es un paso de contador y cuesta 5 céntimos.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 7</h1>

<form action="./Ejer7.php" method="post">
    <label for="call1">LLamada 1:</label>
    <input type="text" id="call1" name="call1" placeholder="Tiempo en minutos"><br><br>

    <label for="call2">LLamada 2:</label>
    <input type="text" id="call2" name="call2" placeholder="Tiempo en minutos"><br><br>

    <label for="call3">LLamada 3:</label>
    <input type="text" id="call3" name="call3" placeholder="Tiempo en minutos"><br><br>

    <label for="call4">LLamada 4:</label>
    <input type="text" id="call4" name="call4" placeholder="Tiempo en minutos"><br><br>

    <label for="call5">LLamada 5:</label>
    <input type="text" id="call5" name="call5" placeholder="Tiempo en minutos"><br><br>


    <input type="submit" name="submit">

</form>
    
</body>
</html>

<?php 

function comprobar($llamadas) {

    $bol = true;
    foreach ($llamadas as $llamada) {

        if (!is_numeric($llamada)) {
            $bol = false;
        }
        
    }
    if ($bol) {
        return true;
    } else {
        return false;
    }
    
}

function precio($llamadas) {

    if (!comprobar($llamadas)) {
        return "No se pueden introducir letras en los campos de llamadas";
        
    } else {
        $precioTot = 0;
        
        foreach ($llamadas as $llamada) {
            if ($llamada <= 3 && $llamada > 0) {
            $precioTot += 0.1;
            } else {
                $precioTot +=0.1;
                for ($i=4; $i <= $llamada; $i++) { 
                    $precioTot +=0.05;
                }
            } 
        }
        return sprintf("El precio total es: %.2f",$precioTot);
    }
}

if (isset($_POST["submit"])) {
    $llamadas = array(
                        $_POST["call1"],
                        $_POST["call2"],
                        $_POST["call3"],
                        $_POST["call4"],
                        $_POST["call5"],
                );

    echo precio($llamadas);
}

?>  