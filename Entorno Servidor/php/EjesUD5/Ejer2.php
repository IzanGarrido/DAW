<?php
/**
 * @author Izan Garrido Quintana
 * Ejercicio 8 Dado un día del mes, el programa muestra si es parte de la "primera quincena" (días 1-15)
 * o "segunda quincena" (días 16-31). Además, verifica que el dato ingresado sea válido.
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 2</h1>

<!-- Formulario para capturar el número del día del mes -->
<form action="./Ejer2.php" method="post">
    <label for="num">Número:</label>
    <input type="text" id="num" name="num"><br><br>

    <!-- Botón para enviar el formulario -->
    <input type="submit" name="submit" value="submit">
</form>

</body>
</html>

<?php 

// Función que determina si el número ingresado está en la primera o segunda quincena
function quinzena($num) {
    if ($num <= 15) {
        // Si el número es 15 o menor, muestra "Primera quincena"
        return "Primera quincena<br>";
    } else {
        // Si el número es mayor a 15, muestra "Segunda quincena"
        return "Segunda quincena<br>";
    }
}

// Función para validar el número ingresado antes de procesarlo
function comprobar($num) {
    // Comprueba que el valor no esté vacío, sea numérico, y esté en el rango correcto
    if (vacio($num) && numerico($num) && rango($num)) {
        quinzena($num); // Si todo es correcto, llama a la función `quinzena`
    }
}

// Función para verificar si el campo está vacío
function vacio($num) {
    if (empty($num)) {
        echo "No puede estar vacío<br>";
        return false;
    } else {
        return true;
    }
}

// Función para verificar que el valor ingresado sea numérico
function numerico($num) {
    if (!is_numeric($num)) {
        echo "Ha de ser numérico<br>";
        return false;
    } else {
        return true;
    }
}

// Función para verificar que el valor esté dentro del rango válido de días (1-31)
function rango($num) {
    if ($num < 1 || $num > 31) {
        echo "Debe estar entre 1 y 31<br>";
        return false;
    } else {
        return true;
    }
}

// Verifica si se ha enviado el formulario
if (isset($_POST["submit"])) {
    // Obtiene el valor ingresado en el formulario
    $num = $_POST["num"];
    // Llama a la función `comprobar` para validar y mostrar el resultado
    comprobar($num);
}

?>
