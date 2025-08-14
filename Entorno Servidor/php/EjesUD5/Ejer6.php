<?php
/**
 * @author Izan Garrido Quintana
 */

# Ejercicio 4: Elabora un programa para determinar si una hora leída en la forma horas,
# minutos y segundos está correctamente expresada. Utiliza funciones para la comprobación de datos

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 6</h1>

<!-- Formulario para que el usuario introduzca la hora -->
<form action="./Ejer6.php" method="post">
    <label for="hora">Hora:</label>
    <input type="text" id="hora" name="hora" placeholder="hh:mm:ss">
    <input type="submit" name="submit">
</form>
    
</body>
</html>

<?php 

// Función que valida el formato de la hora
function formato($hora) {

    // Verifica si el formato coincide con "hh:mm:ss" usando una expresión regular
    if (!preg_match("/^\d{1,3}:\d{1,3}:\d{1,3}$/", $hora)) {
        echo "El formato es incorrecto"; // Mensaje de error si el formato no coincide
    } else {
        return validarHora($hora); // Llama a la función de validación de hora
    }

}

// Función que valida y corrige la hora si es necesario
function validarHora($hora) {
    // Divide la hora en horas, minutos y segundos
    $tReal = explode(":", $hora);
    $horas = $tReal[0];
    $minutos = $tReal[1];
    $segundos = $tReal[2];

    // Calcula el total de segundos para normalizar la hora
    $secTotal = $segundos + ($minutos * 60) + ($horas * 3600);
    
    // Convierte el total de segundos en una hora normalizada (formato 24 horas)
    $tCalc = array(floor($secTotal/3600) % 24, floor(($secTotal%3600)/60), $secTotal%60);

    // Compara la hora ingresada con la hora normalizada
    if (!array_diff($tReal, $tCalc)) {
        return sprintf('La hora es correcta: %02d:%02d:%02d', $tReal[0], $tReal[1], $tReal[2]);
    } else {
        return sprintf('La hora es incorrecta, hora corregida: %02d:%02d:%02d', $tCalc[0], $tCalc[1], $tCalc[2]);
    }
}

// Ejecuta el código cuando el usuario envía el formulario
if (isset($_POST["submit"])) {
    $hora = $_POST["hora"];
    
    // Llama a la función 'formato' y muestra el resultado
    echo formato($hora);
}

?>