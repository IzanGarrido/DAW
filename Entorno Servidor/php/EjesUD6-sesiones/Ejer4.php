<?php
/**
 * @author Izan Garrido Quintana
 * 
 * 4. Usa el formulario del ejercicio 5 de Cookies con indicación de la quincena dado el día de la
 * semana de modo que uses la sesión para mostrar el día y la quincena actuales y además muestre
 * el día y la quincena anteriores.
 * 
 */

// Función que realiza la conversión según la opción seleccionada
function convertir($num, $conversion) {
    // Definición de la tasa de conversión entre euros y pesetas
    $tasa_conversion = 166.386; 

    // Según la opción elegida, realiza la conversión y muestra el resultado
    if ($conversion == "euros") {
        // Uso sprintf para dar formato y que no salgan demasiados decimales
        // Conversión de euros a pesetas
        return $num . " euros son " . sprintf("%.2f",$num * $tasa_conversion) . " pesetas.<br>";
    } else {
        // Conversión de pesetas a euros
        return $num . " pesetas son " . sprintf("%.2f",($num / $tasa_conversion)) . " euros.<br>";
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

session_start();

if (isset($_POST["enviar"])) {
    if (isset($_POST["num"], $_POST["convertir"])) {

        if (numerico(trim($_POST["num"]))) {

            $num = trim($_POST["num"]);
            $conversion = $_POST["convertir"];


            $valores = convertir($num,$conversion);

            
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
    <title>Ejercicio 4 - Izan Garrido Quintana</title>
</head>
<body>

    <form action="Ejer4.php" method="post"> 
        <fieldset>
            <legend><h1>Ejercicio 4 - Izan</h1></legend>

            <label for="num">Cantidad:</label>
            <input type="text" name="num"><br><br>

            <input type="radio" name="convertir" value="euros">
            <label for="euro">Euros a Pesetas</label><br>
            <input type="radio" name="convertir" value="pesetas">
            <label for="peseta">Pesetas a Euros</label><br><br>

            <input type="submit" value="Enviar" name="enviar"><br><br>
        </fieldset>
    </form>
    
</body>
</html>