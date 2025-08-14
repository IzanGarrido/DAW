<?php
/**
 * @author Izan Garrido Quintana
 * 
 * 6. Usa el formulario del ejercicio 6 de Cookies con la tabla de multiplicar de modo que uses la
 * sesión para mostrar el multiplicando, el multiplicador y la tabla actuales y además muestre el
 * multiplicando, el multiplicador y la tabla de la ejecución anterior
 * 
 */

session_start();

if (isset($_POST["enviar"])) {
    if (isset($_POST["num"], $_POST["multiplicador"])) {

        if (!is_numeric(trim($_POST["num"]))) {
            echo "<p style='color: red'>Tiene que ser númerico</p>";

        } else {
            
            $numero = $_POST["num"];
            $multiplicador = $_POST["multiplicador"];

            $valores = "$numero,$multiplicador";
            
            echo "Usuario actual:<br>";
            for ($i=0; $i <= $multiplicador; $i++) { 
                printf("%2d x %2d = %4d<br>", $numero, $i, ($numero*$i));
                
            }
        
            if (isset($_SESSION["misesion"])) {
                $datos = explode("," ,$_SESSION["misesion"]);
                echo "Usuario anterior<br>";
                for ($i=1; $i <= $datos[1]; $i++) { 
                    printf("%2d x %2d = %4d<br>", $datos[0], $i, ($datos[0]*$i));
                }

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
    <title>Ejercicio 6 - Izan Garrido Quintana</title>
</head>
<body>

    <form action="Ejer6.php" method="post"> 
        <fieldset>
            <legend><h1>Ejercicio 6 - Izan</h1></legend>

            <label for="numero">Número:</label>
            <input type="text" name="num"><br><br>

            <label for="multiplicador">Multiplicador:</label>
            <select name="multiplicador" id="multiplicador">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select><br><br>

            <input type="submit" value="Enviar" name="enviar"><br><br>
        </fieldset>
    </form>
    
</body>
</html>