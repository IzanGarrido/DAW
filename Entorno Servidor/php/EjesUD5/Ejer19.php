<?php
/**
 * 
 * @author Izan Garrido Quintana
 * 
 * 19. Crea un programa donde se le seleccione el curso (radiobutton), los módulos (a seleccionar de
 * un desplegable) y las horas (marcar o desmarcar) y genere un horario usando una tabla
 * 
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 19</title>

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: grey;
        }
    </style>

</head>

<body>

<form action=".\Ejer19.php" method="post">
    <label for="curso">Curso:</label>
    <input type="radio" name="curso" value="Primero">1º
    <input type="radio" name="curso" value="Segundo">2º
    <br><br>

    <label for="modulo">Módulo:</label>
    <select name="modulos[]" multiple>
        <option value="Daw">Daw</option>
        <option value="Diw">Dam</option>
        <option value="Entorno Servidor">Entorno Servidor</option>
        <option value="Entorno Cliente">Entorno Cliente</option>
    </select>
    <br><br> 
    <label for="horas">Horas:</label><br>
    <input type="checkbox" name="horas[]" value="14:00 - 15:00">14:00 - 15:00<br>
    <input type="checkbox" name="horas[]" value="15:00 - 16:00">15:00 - 16:00<br>
    <input type="checkbox" name="horas[]" value="16:00 - 17:00">16:00 - 17:00<br>
    <input type="checkbox" name="horas[]" value="17:00 - 18:00">17:00 - 18:00<br>
    <input type="checkbox" name="horas[]" value="18:00 - 19:00">18:00 - 19:00<br>
    <input type="checkbox" name="horas[]" value="19:00 - 20:00">19:00 - 20:00<br><br>
    <input type="submit" name="enviar" value="Generar horario">


</form>

</body>
</html>

<?php

if (isset($_POST['enviar'])) {
    $curso = $_POST['curso'];
    $modulos = $_POST['modulos'];
    $horas = $_POST['horas'];

    if ($curso && $modulos && $horas) {
        echo "<h2 style='text-align:center;'>Horario para $curso</h2>";
        echo "<table>";
        echo "<tr><th>Hora</th><th>Módulo</th></tr>";

        // Limitar el número de módulos y horas a mostrar
        // El tamaño se escogerá siempre el más pequeño para poder rellenar la tabla.
        $maxItems = min(count($modulos), count($horas));
        
        // Muestra los valores indicados dentro de la tabla
        for ($i = 0; $i < $maxItems; $i++) {
            echo "<tr><td>{$horas[$i]}</td><td>{$modulos[$i]}</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='color:red;'>Debes selccionar cada dato.</p>";
    }
    

}

?>