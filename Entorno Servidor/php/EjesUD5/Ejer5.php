<?php
/**
 * @author Izan Garrido Quintana
 */

# Ejercicio 1: Elabora un programa que dado un carácter introducido por el usuario y determine si es:
# 1. una letra mayúscula   4. un carácter blanco
# 2. una letra minúscula   5. un carácter de puntuación
# 3. un carácter numerico  6. un carácter especial
# Se debe usar funciones para la comprobación de datos

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 5</h1>

<!-- Formulario para que el usuario introduzca un carácter -->
<form action="./Ejer5.php" method="post">
    <label for="caracter">Introduce un carácter:</label>
    <input type="text" id="caracter" name="caracter">
    <input type="submit" name="submit">
</form>
    
</body>
</html>

<?php 

// Función principal que determina el tipo de carácter
function comprobar($caracter) {

    // Verifica si es solo un carácter
    if (contarDigit($caracter)) {

        // Realiza las comprobaciones por tipo de carácter
        switch ($caracter) {
            case mayuscula($caracter):
                return "1. Es una letra mayúscula";
                break;
    
            case minuscula($caracter):
                return "2. Es una letra minúscula";
                break;
    
            case numerico($caracter):
                return "3. Es un carácter numérico";
                break;
    
            case blanco($caracter):
                return "4. Es un carácter blanco";
                break;
    
            case puntuacion($caracter):
                return "5. Es un carácter de puntuación";
                break;
    
            case especial($caracter):
                return "6. Es un carácter especial";
                break;
        }
    }
}

// Función que verifica si el input es un solo carácter
function contarDigit($caracter) {
    if (strlen($caracter) != 1) {
        echo "Debe ser solo un carácter";
    } else {
        return TRUE;
    }
}

// Funciones de comprobación de cada tipo de carácter
function mayuscula($caracter) {
    return ctype_upper($caracter); // Verifica si es mayúscula
}

function minuscula($caracter) {
    return ctype_lower($caracter); // Verifica si es minúscula
}

function numerico($caracter) {
    return ctype_alnum($caracter); // Verifica si es alfanumérico
}

function blanco($caracter) {
    return ctype_space($caracter); // Verifica si es un espacio en blanco
}

function puntuacion($caracter) {
    return ctype_punct($caracter); // Verifica si es un carácter de puntuación
}

function especial($caracter) {
    return ctype_alpha($caracter); // Verifica si es un carácter alfabético
}

// Se ejecuta al enviar el formulario
if (isset($_POST["submit"])) {
    $caracter = $_POST["caracter"];

    // Llama a la función 'comprobar' y muestra el resultado
    echo comprobar($caracter);
}

?>