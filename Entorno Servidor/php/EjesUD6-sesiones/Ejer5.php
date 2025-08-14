<?php
/**
 * @author Izan Garrido Quintana
 * 
 * 5. Usa el formulario del ejercicio 4 de Cookies del conversor de euros y pesetas de modo que uses
 * la sesión para mostrar la cantidad, moneda y conversión actuales y además muestre la cantidad,
 * moneda y conversión anterior.

 * 
 */

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
       return true;
    } else {
        return false;
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

session_start();

if (isset($_POST["enviar"])) {
    if (isset($_POST["num"])) {

        if (comprobar(trim($_POST["num"]))) {

            $num = trim($_POST["num"]);

            $valores = $num . "," . quinzena($num);

            
            echo "Usuario actual:<br>";
            printf("Para el número %d , es la %s",$num, quinzena($num));
        
            if (isset($_SESSION["misesion"])) {
                $misesion =  explode(",", $_SESSION["misesion"]);
                echo "Usuario anterior<br>";
                printf("Para el número %d , es la %s",$misesion[0], $misesion[1]);
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
    <title>Ejercicio 5 - Izan Garrido Quintana</title>
</head>
<body>

    

    <form action="Ejer5.php" method="post"> 
        <fieldset>
            <legend><h1>Ejercicio 5 - Izan</h1></legend>

            <label for="num">Número:</label>
            <input type="text" name="num"><br><br>

            <input type="submit" value="Enviar" name="enviar"><br><br>
        </fieldset>

    </form>
    
</body>
</html>