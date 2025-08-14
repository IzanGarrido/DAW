<?php
/**
 * @author Izan Garrido Quintana
 * 
 * 1. Usa el formulario del ejercicio 1 de Cookies de saludo o despedida de modo que uses la sesión
 * para mostrar el usuario y saludo actuales y además muestre el usuario y saludo anterior.
 * 
 */

session_start();

if (isset($_POST["enviar"])) {
    if (isset($_POST["nombre"]) && isset($_POST["accion"])) {

        $nombre = $_POST["nombre"];
        $accion = $_POST["accion"];

        if ($accion == "saludo") {
            $valor = "Hola $nombre";
        } else if ($accion == "despedida") {
            $valor = "Adios $nombre";
        }

        echo "Usuario actual:<br>";
        echo $valor . "<br><br>";
    
        if (isset($_SESSION["nombre"])) {
            echo "Usuario anterior: <br>";
            echo $_SESSION["nombre"] , "<br>";
        }

        $_SESSION["nombre"] = $valor;
    
    
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
    <title>Ejercicio 1 - Izan Garrido Quintana</title>
</head>
<body>

    <h1>Ejercicio 1 - Izan</h1>

    <form action="Ejer1.php" method="post"> 
        <label for="nombre">Indica tú nombre</label>
        <input type="text" name="nombre"><br>
        
        <label for="saludo">Saludo</label>
        <input type="radio" name="accion" value="saludo"><br>

        <label for="despedida">Despedida</label>
        <input type="radio" name="accion" value="despedida"><br><br>

        <input type="submit" value="Enviar" name="enviar"><br><br>

    </form>
    
</body>
</html>