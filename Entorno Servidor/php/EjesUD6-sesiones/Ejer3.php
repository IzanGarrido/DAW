<?php
/**
 * @author Izan Garrido Quintana
 * 
 * 3. Usa el formulario del ejercicio 3 de Cookies del selector de operación de modo que uses la
 * sesión para mostrar el resultado de la operación indicando cuáles han sido los números, las
 * operaciones elegidas y el resultado en la ejecución actual y los números y las operaciones
 * elegidas en la ejecución anterior a la actual.
 * 
 */


// Función para comprobar que los valores introducidos sean numéricos
function numerico($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "<p style='color: red'>Ha de ser numérico</p><br>";
        return false;
    } else {
        return true;
    }
}

// Función principal que realiza las operaciones seleccionadas
function operar($num1, $num2) {
    // Itera sobre cada operación seleccionada por el usuario
    foreach ($_POST["operacion"] as $operacion) {
        switch ($operacion) {
            case '+':
                // Realiza la suma y muestra el resultado
                return "Suma: " . $num1 . " + " . $num2 . " = " . ($num1 + $num2) . "<br>";
                break;

            case '-':
                // Realiza la resta y muestra el resultado
                return "Resta: " . $num1 . " - " . $num2 . " = " . ($num1 - $num2) . "<br>";
                break;

            case '/':
                // Verifica que el segundo número no sea cero antes de dividir
                if ($num2 != 0) {
                    return "División: " . $num1 . " / " . $num2 . " = " . ($num1 / $num2) . "<br>";
                } else {
                    return "No se puede dividir entre cero<br>";
                }
                break;

            case '*':
                // Realiza la multiplicación y muestra el resultado
                return "Multiplicación: " . $num1 . " x " . $num2 . " = " . ($num1 * $num2) . "<br>";
                break;
        }
    }
}

session_start();

if (isset($_POST["enviar"])) {
    if (isset($_POST["num1"], $_POST["num2"], $_POST["operacion"])) {

        if (numerico($_POST["num1"], $_POST["num2"])) {

            // Opero los numeros 1 y 2, quito los estapcios en blanco de los numeros si tienen y establezco la sesión
            $valores = operar(trim($_POST["num1"]),trim($_POST["num2"]));

            echo "Usuario actual:<br>";
            print($valores);
        
            if (isset($_SESSION["misesion"])) {
                echo "Usuario anterior<br>";
                print($_SESSION["misesion"]);
            }
            $_SESSION["misesion"] = $valores;
            
        }
    
    } else {
        echo "<p style='color: red'>Rellena todos los datos</p>";
    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Izan Garrido Quintana</title>
</head>
<body>

    <form action="Ejer3.php" method="post"> 
        <fieldset>
            <legend><h1>Ejercicio 3 - Izan</h1></legend>

            <label for="num1">Número 1:</label>
            <input type="text" name="num1"><br><br>
            
            <label for="num2">Número 2:</label>
            <input type="text" name="num2"><br><br>

            <label for="operacion">Elige la operación</label>
            <select name="operacion[]" multiple>
                <option value="+">Suma</option>
                <option value="-">Resta</option>
                <option value="/">División</option>
                <option value="*">Multiplicación</option>
            </select><br><br>

            <input type="submit" value="Enviar" name="enviar"><br><br>
        </fieldset>

    </form>
    
</body>
</html>