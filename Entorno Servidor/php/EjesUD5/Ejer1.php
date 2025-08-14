<?php
/**
 * @author Izan Garrido Quintana
 * Ejercicio 4 Dados dos números enteros, realizar operaciones de suma, resta, división y
 * multiplicación según la selección del usuario, y mostrar los resultados concatenando la
 * operación (expresión con operandos y operador) y el resultado. También se valida que los
 * datos introducidos sean numéricos y no estén vacíos.
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 1</h1>

<!-- Formulario para capturar los dos números y la operación seleccionada por el usuario -->
<form action="./Ejer1.php" method="post">
    <label for="num1">Número 1:</label>
    <input type="text" id="num1" name="num1"><br><br>
    
    <label for="num2">Número 2:</label>
    <input type="text" id="num2" name="num2"><br><br>

    <!-- Selector múltiple para que el usuario elija una o más operaciones -->
    <label for="operacion">Elige la operación</label>
    <select name="operacion[]" id="operacion" multiple>
        <option value="+">Suma</option>
        <option value="-">Resta</option>
        <option value="/">División</option>
        <option value="*">Multiplicación</option>
    </select><br><br>
    
    <input type="submit" name="calcular" value="Calcular">
</form>

</body>
</html>

<?php 

// Función principal que realiza las operaciones seleccionadas
function tipo($num1, $num2) {
    // Itera sobre cada operación seleccionada por el usuario
    foreach ($_POST["operacion"] as $operacion) {
        switch ($operacion) {
            case '+':
                // Realiza la suma y muestra el resultado
                echo "Suma: " . $num1 . " + " . $num2 . " = " . ($num1 + $num2) . "<br>";
                break;

            case '-':
                // Realiza la resta y muestra el resultado
                echo "Resta: " . $num1 . " - " . $num2 . " = " . ($num1 - $num2) . "<br>";
                break;

            case '/':
                // Verifica que el segundo número no sea cero antes de dividir
                if ($num2 != 0) {
                    echo "División: " . $num1 . " / " . $num2 . " = " . ($num1 / $num2) . "<br>";
                } else {
                    echo "No se puede dividir entre cero<br>";
                }
                break;

            case '*':
                // Realiza la multiplicación y muestra el resultado
                echo "Multiplicación: " . $num1 . " x " . $num2 . " = " . ($num1 * $num2) . "<br>";
                break;
        }
    }
}

// Función que comprueba que los valores introducidos son válidos
function comprobar($num1, $num2) {
    // Verifica que ambos números no estén vacíos y sean numéricos
    if (vacio($num1, $num2) && numerico($num1, $num2)) {
        tipo($num1, $num2); // Si los valores son válidos, realiza las operaciones
    }
}

// Función para comprobar si los campos están vacíos
function vacio($num1, $num2) {
    if (empty($num1) || empty($num2)) {
        echo "No puede estar vacío<br>";
        return false;
    } else {
        return true;
    }
}

// Función para comprobar que los valores introducidos sean numéricos
function numerico($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "Ha de ser numérico<br>";
        return false;
    } else {
        return true;
    }
}

// Verifica si el botón "calcular" ha sido presionado
if (isset($_POST["calcular"])) {
    // Obtiene los valores introducidos por el usuario
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    // Llama a la función para comprobar la validez de los datos
    comprobar($num1, $num2);
}
?>
