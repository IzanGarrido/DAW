<?php
/**
 * @author Izan Garrido Quintana
 * 
 * 2. Crea un formulario en el que se le pida al usuario los siguientes datos: nombre 
 * y preferencia de idioma, color y ciudad. Crea una Cookie que almacene estos datos 
 * y que, al recargar la página por realizar una nueva selección de datos 
 * (y posiblemente usuario) muestre los datos introducidos en el formulario junto con 
 * los datos obtenidos de la Cookie.
 * 
 */

if (isset($_POST["enviar"])) {
    if (isset($_POST["nombre"], $_POST["idioma"], $_POST["color"], $_POST["ciudad"])) {

        $nombre = $_POST["nombre"];
        $idioma = $_POST["idioma"];
        $color = implode(", ", $_POST["color"]);
        $ciudad = $_POST["ciudad"];

        $valores = "$nombre,$idioma,$color,$ciudad";
    
        setcookie("migalleta", $valores, time() + 3600);
        
        echo "Usuario actual:<br>";
        printf("Nombre: %s<br>Idioma: %s<br>Colores: %s<br>Ciudad: %s<br>",$nombre,$idioma,$color,$ciudad);
    
        if (isset($_COOKIE["migalleta"])) {
            $galleta = explode(",", $_COOKIE["migalleta"]);
            echo "Usuario anterior<br>";
            printf("Nombre: %s<br>Idioma: %s<br>Colores: %s<br>Ciudad: %s<br>",$galleta[0],$galleta[1],$galleta[2],$galleta[3]);
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
    <title>Ejercicio 2 - Izan Garrido Quintana</title>
</head>
<body>

    

    <form action="Ejer2.php" method="post"> 
        <fieldset>
            <legend><h1>Ejercicio 2 - Izan</h1></legend>
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
            <select name="ciudad" >
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