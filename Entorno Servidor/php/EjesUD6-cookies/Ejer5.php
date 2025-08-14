<?php
/**
 * @author Izan Garrido Quintana
 * 
 * 5. Usa el formulario (Ejercicio 3 UD5) del conversor euros a pesetas y
 * viceversa de la cantidad introducida por el usuario y guardar los
 * datos en una Cookie. Se deben mostrar la cantidad, moneda y conversión
 * actual y la cantidad, moneda y conversión anterior (cookie).
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

if (isset($_POST["enviar"])) {
    if (isset($_POST["num"], $_POST["convertir"])) {

        if (numerico(trim($_POST["num"]))) {

            $num = trim($_POST["num"]);
            $conversion = $_POST["convertir"];


            $valores = convertir($num,$conversion);
            setcookie("migalleta", $valores, time() + 3600);
            
            echo "Usuario actual:<br>";
            print($valores);
        
            if (isset($_COOKIE["migalleta"])) {
                echo "Usuario anterior<br>";
                print($_COOKIE["migalleta"]);
            }
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