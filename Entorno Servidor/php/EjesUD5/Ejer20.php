<?php
/**
 * 
 * @author Izan Garrido Quintana
 * 
 * 20. Realiza un programa que pida una hora por teclado y que muestre luego el saludo, esto es:
 * buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de
 * 13 a 20 y de 21 a 5 respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben
 * introducir por teclado.
 * 
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 20</title>

    

</head>

<body>

<form action=".\Ejer20.php" method="post">
    <label for="hora">Introduce la hora:</label>
    <input type="text" name="hora"><br><br>
    <input type="submit" name="enviar" value="Enviar">
    


</form>

</body>
</html>

<?php

if (isset($_POST['enviar'])) {
    
    $hora = $_POST['hora'];

    if (is_numeric($hora) && $hora >= 0 && $hora <= 23) {
        
        switch ($hora) {
            case $hora>=6 && $hora<=12:

                echo "<h1>Buenos días</h1>";
                
                break;
            
            case $hora>=13 && $hora<=20:

                echo "<h1>Buenas tardes</h1>";
                
                break;

            case ($hora>=21 && $hora<=24) || ($hora>=1 && $hora<=5):

                echo "<h1>Buenas noches</h1>";
                
                break;
            
        }

    } else {
        echo "<h1>Debe ser un entero del 0 al 23!</h1>";
    }

}

?>