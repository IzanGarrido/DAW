<?php
/**
 * @author Izan Garrido Quintana
 * Ejercicio 4 Calcula el salario semanal de un trabajador. Las primeras 40 horas se pagan a 12 euros la hora;
 * las horas adicionales (41 en adelante) se pagan a 16 euros por hora. Valida que el número de horas ingresado sea válido.
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 4</h1>

<!-- Formulario para capturar las horas trabajadas -->
<form action="./Ejer4.php" method="post">
    <label for="num">Horas:</label>
    <input type="text" id="num" name="num"><br><br>

    <input type="submit" name="submit" value="Calcular">
</form>

</body>
</html>

<?php 

// Función para calcular el salario según las horas trabajadas
function salario($num) {
    // Determina el salario según si las horas son 40 o menos, o mayores a 40
    if ($num <= 40) {
        $salario = $num * 12; // Si las horas son 40 o menos, se paga a 12€/hora
    } else {
        $salario = 40 * 12 + ($num - 40) * 16; // Las horas extra se pagan a 16€/hora
    }

    // Muestra el salario calculado
    echo "Salario de esta semana: " . $salario . "€<br>";
}

// Función para validar las horas trabajadas
function comprobar($num) {
    // Comprueba que el valor ingresado no esté vacío, sea numérico y dentro de un rango lógico
    if (vacio($num) && numerico($num) && rango($num)) {
        salario($num); // Si es correcto, llama a la función `salario`
    }
}

// Función para verificar si el campo de horas está vacío
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

// Función para asegurar que el número de horas es un valor positivo
function rango($num) {
    if ($num < 0) {
        echo "Debe ser un número positivo<br>";
        return false;
    } else {
        return true;
    }
}

// Verifica si se ha enviado el formulario
if (isset($_POST["submit"])) {
    // Obtiene el valor ingresado del formulario
    $num = $_POST["num"];
    // Llama a la función `comprobar` para validar el dato y calcular el salario
    comprobar($num);
}

?>
