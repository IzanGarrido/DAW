<?php

/**
 * @author Izan Garrido Quintana
 * 
 * 2. Usa el formulario del ejercicio 2 de Cookies con selección de color, idioma y ciudad de modo
 * que uses la sesión para mostrar el nombre del usuario, color, idioma y ciudad actuales y además
 * muestre el nombre del usuario, color, idioma y ciudad anterior.
 * 
 */

session_start();

if (isset($_POST["enviar"])) {
    if (isset($_POST["nombre"], $_POST["idioma"], $_POST["color"], $_POST["ciudad"])) {

        $nombre = $_POST["nombre"];
        $idioma = $_POST["idioma"];
        $color = implode(", ", $_POST["color"]);
        $ciudad = $_POST["ciudad"];

        $valores = "$nombre.$idioma.$color.$ciudad";

        echo "Usuario actual:<br>";
        printf("Nombre: %s<br>Idioma: %s<br>Colores: %s<br>Ciudad: %s<br>", $nombre, $idioma, $color, $ciudad);

        if (isset($_SESSION["misesion"])) {
            $sesion = explode(".", $_SESSION["misesion"]);
            echo "Usuario anterior<br>";
            printf("Nombre: %s<br>Idioma: %s<br>Colores: %s<br>Ciudad: %s<br>", $sesion[0], $sesion[1], $sesion[2], $sesion[3]);
        }

        $_SESSION["misesion"] = $valores;

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
    <title>Ejercicio 2 - Izan Garrido Quintana</title>
</head>

<body>



    <form action="Ejer2.php" method="post">
        <fieldset>
            <legend>
                <h1>Ejercicio 2 - Izan</h1>
            </legend>
            <label for="nombre">Indica tú nombre: </label>
            <input type="text" name="nombre"><br><br>

            <label for="idioma">Preferencia de idioma:</label><br>
            <input type="radio" name="idioma" value="Español">Español<br>
            <input type="radio" name="idioma" value="Inglés">Inglés<br><br>

            <label for="color">Elige un o varios colores:</label><br><br>
            <input type="checkbox" name="color[]" value="Rojo">Rojo
            <input type="checkbox" name="color[]" value="Verde">Verde
            <input type="checkbox" name="color[]" value="Azul">Azul<br>
            <input type="checkbox" name="color[]" value="Amarillo">Amarillo
            <input type="checkbox" name="color[]" value="Rosa">Rosa
            <input type="checkbox" name="color[]" value="Morado">Morado<br><br>

            <label for="Ciudad">Elige una ciudad: </label>
            <select name="ciudad">
                <option value="Madrid">Madrid</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Valencia">Valencia</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Zaragoza">Zaragoza</option>
                <option value="Málaga">Málaga</option>
                <option value="Murcia">Murcia</option>
                <option value="Palma">Palma</option>
                <option value="Las Palmas">Las Palmas</option>
                <option value="Bilbao">Bilbao</option>
            </select><br><br>


            <input type="submit" value="Enviar" name="enviar"><br><br>
        </fieldset>

    </form>

</body>

</html>