<?php
/**
 * @author Izan Garrido Quintana
 */

// Iniciar la sesión
session_start();

# Ejercicio 5. Realiza el control de acceso a una caja fuerte. La combinación será un número de
# 4 cifras. El programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el
# mensaje “Lo siento, esa no es la combinación” en color rojo y si acertamos se nos dirá “La caja
# fuerte se ha abierto satisfactoriamente” en color verde. Tendremos cuatro oportunidades para
# abrir la caja fuerte.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 12</h1>

<?php 

$combinacion = 1234;

// Inicializar el contador de intentos si no existe
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0; // Contador de intentos
}

function comprobar($num) {
    if (strlen($num) == 4 && ctype_digit($num)) {
        return true;
    } else {
        echo "<span style='color: red;'>4 números!</span><br>";
        return false;
    }
}

echo "<form action='./Ejer12.php' method='post'>";
echo "<label for='probar'>Introduce la combinación</label><br>";
echo "<input type='text' name='probar' id='probar'>";
echo "<input type='submit' value='intento' name='submit'>";
echo "</form>";

// Comprueba si el formulario ha sido enviado
if (isset($_POST["submit"])) {
    $probar = $_POST["probar"]; // Recupera las opciones seleccionadas por el usuario

    if (comprobar($probar)) {
        $_SESSION['intentos']++; // Incrementar el contador de intentos

        if ($combinacion == $probar) {
            echo "La caja fuerte se ha abierto satisfactoriamente.<br>";
            // Reiniciar el contador de intentos
            unset($_SESSION['intentos']);
        } else {
            if ($_SESSION['intentos'] < 4) {
                echo "Lo siento, esa no es la combinación. Intento número " . $_SESSION['intentos'] . ".<br>";
            } else {
                echo "Se han agotado los intentos.<br>";
                // Reiniciar el contador de intentos
                unset($_SESSION['intentos']);
            }
        }
    }
}

?>

</body>
</html>