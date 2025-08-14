<?php

/**
 * 
 * @author Izan Garrido Quintana
 * 
 * 21. Realiza un programa donde el usuario seleccione una zona horaria de un máximo de 20 y le
 * muestre la hora actual de dicha zona horaria
 * 
 */

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 21</title>

</head>

<body>

    <form action=".\Ejer21.php" method="post">
        <label for="zona">Selecciona una zona horaria:</label>
        <select name="zona">
            <option value="UTC">UTC</option>
            <option value="GMT">GMT</option>
            <option value="EST">EST</option>
            <option value="PST">PST</option>
            <option value="CET">CET</option>
            <option value="IST">IST</option>
            <option value="AEST">AEST</option>
            <option value="JST">JST</option>
            <option value="BST">BST</option>
            <option value="BRT">BRT</option>
        </select><br><br>
        <input type="submit" value="Enviar" name="enviar">

    </form>

</body>

</html>

<?php

if (isset($_POST['enviar'])) {

    $zona = $_POST['zona'];

    switch ($zona) {
        case 'UTC':
            $zona = 'UTC';
            break;
        case 'GMT':
            $zona = 'Europe/London';
            break;
        case 'EST':
            $zona = 'America/New_York';
            break;
        case 'PST':
            $zona = 'America/Los_Angeles';
            break;
        case 'CET':
            $zona = 'Europe/Paris';
            break;
        case 'IST':
            $zona = 'Asia/Kolkata';
            break;
        case 'AEST':
            $zona = 'Australia/Sydney';
            break;
        case 'JST':
            $zona = 'Asia/Tokyo';
            break;
        case 'BST':
            $zona = 'Europe/London'; // BST es el horario de verano de Londres
            break;
        case 'BRT':
            $zona = 'America/Sao_Paulo';
            break;
    }

    // Establecer la zona horaria y mostrar la hora actual
    date_default_timezone_set($zona);
    $horaActual = date('Y-m-d H:i:s');

    echo "<p>Zona horaria seleccionada: $zona</p>";
    echo "<p>Hora actual: $horaActual</p>";
}

?>