<?php
/**
 * @author Izan Garrido Quintana
 * Ejercicios 11 y 12 Calculadora de conversión entre euros y pesetas. Convierte una cantidad de euros a pesetas
 * o de pesetas a euros según lo seleccionado por el usuario. Valida que los datos ingresados sean válidos.
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 3</h1>

<!-- Formulario para capturar la cantidad y tipo de conversión -->
<form action="./Ejer3.php" method="post">
    <label for="num">Cantidad:</label>
    <input type="text" id="num" name="num"><br><br>

    <!-- Opciones de conversión: Euros a Pesetas o Pesetas a Euros -->
    <input type="radio" name="convertir" value="euros">
    <label for="euro">Euros a Pesetas</label><br>
    <input type="radio" name="convertir" value="pesetas">
    <label for="peseta">Pesetas a Euros</label><br><br>
    
    <input type="submit" name="submit" value="Convertir">
</form>

</body>
</html>

<?php 

// Función que realiza la conversión según la opción seleccionada
function convertir($num, $conversion) {
    // Definición de la tasa de conversión entre euros y pesetas
    $tasa_conversion = 166.386; 

    // Según la opción elegida, realiza la conversión y muestra el resultado
    if ($conversion == "euros") {
        // Conversión de euros a pesetas
        echo $num . " euros son " . ($num * $tasa_conversion) . " pesetas.<br>";
    } else {
        // Conversión de pesetas a euros
        echo $num . " pesetas son " . ($num / $tasa_conversion) . " euros.<br>";
    }
}

// Función para validar la cantidad ingresada
function comprobar($num, $conversion) {
    // Comprueba que la cantidad no esté vacía, sea numérica y que se haya seleccionado una conversión
    if (vacio($num) && numerico($num) && seleccion($conversion)) {
        convertir($num, $conversion); // Llama a la función de conversión si los datos son válidos
    }
}

// Función para verificar que el campo no esté vacío
function vacio($num) {
    if (empty($num)) {
        echo "No puede estar vacío<br>";
        return false;
    } else {
        return true;
    }
}

// Función para comprobar que el valor ingresado sea numérico
function numerico($num) {
    if (!is_numeric($num)) {
        echo "Ha de ser numérico<br>";
        return false;
    } else {
        return true;
    }
}

// Función para asegurarse de que el usuario haya seleccionado una opción de conversión
function seleccion($conversion) {
    if (empty($conversion)) {
        echo "Debe seleccionar una conversión<br>";
        return false;
    } else {
        return true;
    }
}

// Verifica si se ha enviado el formulario
if (isset($_POST["submit"])) {
    // Obtiene los valores del formulario
    $num = $_POST["num"];
    $conversion = $_POST["convertir"];

    // Llama a la función `comprobar` para validar y realizar la conversión
    comprobar($num, $conversion);
}

?>
