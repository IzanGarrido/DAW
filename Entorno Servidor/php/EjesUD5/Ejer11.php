<?php
/**
 * @author Izan Garrido Quintana
 */

# Ejercicio 24 Con los trabajadores del ejercicio anterior, calcular el salario actual y el salario
# aumentado un porcentaje indicado por el usuario

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>
<body>

<h1>Izan Garrido - Ejercicio 11</h1>

<!-- Formulario para seleccionar el cálculo deseado -->
<form action="./Ejer11.php" method="post">

    <label for="porcentaje">Porcentaje a aumentar</label>
    <input type="text" name="porcentaje" id="porcentaje"><br><br>
    <input type="submit" name="submit">
</form>
    
</body>
</html>

<?php 

// Array asociativo de trabajadores con sus respectivos salarios
$trabajadores = array(
    "Juan" => 2500,
    "Ana" => 3000,
    "Carlos" => 2800,
    "Marta" => 3200,
    "Luis" => 2700
);

// Función para verificar que el valor ingresado sea numérico
function numerico($num) {
    if (!is_numeric($num)) {
        echo "Ha de ser numérico<br>";
        return false;
    } else {
        return true;
    }
}

// Comprueba si el formulario ha sido enviado
if (isset($_POST["submit"])) {
    $porcentaje = $_POST["porcentaje"]; // Recupera las opciones seleccionadas por el usuario

    if (numerico($porcentaje)) {
        // Recorre cada selección y llama a la función correspondiente
        foreach ($trabajadores as $trabajador => $salario) {
            print "$trabajador, Salario actual: $salario, Salario con un $porcentaje%: ". ($salario) + ($salario * ($porcentaje/100)) . "<br>";

        }
    }
    
}
?>