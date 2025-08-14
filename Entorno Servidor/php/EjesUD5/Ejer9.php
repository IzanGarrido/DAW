<?php
/**
 * @author Izan Garrido Quintana
 */

# Ejercicio 8. Crea la tabla de multiplicar de un número indicado por el usuario
# siendo que el multiplicador se podrá seleccionar entre 1 y 10. Se multiplicará
# desde 1 al multiplicador seleccionado.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 9</h1>

<form action="./Ejer9.php" method="post">
    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero"><br><br>

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

    <input type="submit" name="submit">

</form>
    
</body>
</html>

<?php 

if (isset($_POST["submit"])) {
    $numero = $_POST["numero"];
    $multiplicador = $_POST["multiplicador"];

    if (!is_numeric($numero)) {
        echo "Ha de ser númerico.";
        
    } else {
        for ($i=1; $i <= $multiplicador; $i++) { 
            printf("%2d x %2d = %4d<br>", $numero, $i, ($numero*$i));
        }
    }
}

?>      