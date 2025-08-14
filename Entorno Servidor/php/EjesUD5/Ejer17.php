<?php
/**
 * 
 * @author Izan Garrido Quintana
 * 
 * 17. Escribe un programa que dadas 10 palabras en inglés muestre su traducción al castellano a su
 * derecha en una tabla. El usuario debe seleccionar la/s palabra/s a traducir (podría
 * seleccionarlas todas)
 * 
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 17</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }

    </style>
</head>

<body>

<form action=".\Ejer17.php" method="post">
    <label for="palabras">Palabras a traducir:</label>
    <select multiple size="10" name="palabras[]">
        <option value="one">one</option>
        <option value="two">two</option>
        <option value="three">three</option>
        <option value="four">four</option>
        <option value="five">five</option>
        <option value="six">six</option>
        <option value="seven">seven</option>
        <option value="eight">eight</option>
        <option value="nine">nine</option>
        <option value="ten">ten</option>
    </select><br><br>
    <input type="submit" name="enviar" value="Traducir">

</form>

</body>
</html>

<?php
// traducciones.php
$traducciones = array(
    "one" => "uno",
    "two" => "dos",
    "three" => "tres",
    "four" => "cuatro",
    "five" => "cinco",
    "six" => "seis",
    "seven" => "siete",
    "eight" => "ocho",
    "nine" => "nueve",
    "ten" => "diez"
);

if (isset($_POST['enviar'])) {
    if (isset($_POST['palabras']) && !empty($_POST['palabras'])) {
        $palabrasSeleccionadas = $_POST['palabras'];

        echo "<h2>Traducciones:</h2>";
        echo "<table>";
        echo "<tr><th>Inglés</th><th>Español</th></tr>";

        foreach ($palabrasSeleccionadas as $palabra) {
            $traduccion = $traducciones[$palabra] ?? "No disponible";
            echo "<tr><td>" . $palabra . "</td><td>" . $traduccion . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p><b>No has seleccionado ninguna palabra para traducir.</b></p>";
    }
}

?>