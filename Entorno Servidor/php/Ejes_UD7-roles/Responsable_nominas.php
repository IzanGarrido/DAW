<?php
/**
 * @author Izan Garrido Quintana
 */

# Ejercicio 23 Dado un vector asociativo de trabajadores con su salario, crea usando funciones
# y a criterio del usuario, el salario máximo, el salario mínimo y el salario medio. (puede elegir uno
# de ellos, varios o todos)

session_start();

// Array asociativo de trabajadores con sus respectivos salarios
$trabajadores = array(
    "Juan" => 2500,
    "Ana" => 3000,
    "Carlos" => 2800,
    "Marta" => 3200,
    "Luis" => 2700
);

// Función que calcula el salario máximo
function maximo($arr) {
    // La función max() devuelve el valor mayor de un array
    echo "Salario máximo: " . max($arr) . "<br>";
}

// Función que calcula el salario mínimo
function minimo($arr) {
    // La función min() devuelve el valor menor de un array
    echo "Salario mínimo: " . min($arr) . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (isset($_POST["submit"])) {
        $salario = $_POST["salario"]; // Recupera las opciones seleccionadas por el usuario
    
        // Recorre cada selección y llama a la función correspondiente
        foreach ($salario as $valor) {
            $valor($trabajadores); // Llama a la función con el nombre almacenado en $valor
        }
    }

    if (isset($_POST["cerrarSesion"])) {
        session_unset();
        header("Location: Ejer1.php");
    }
    
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Izan</title>
</head>
<body>

<?php 
    echo "<h1>" . $_SESSION['rol'] . " - " . $_SESSION['usuario'] . "</h1>"
?>


<!-- Formulario para seleccionar el cálculo deseado -->
<form action="Responsable_nominas.php" method="post">
    <label for="salario">Salario a calcular:</label>
    <select name="salario[]" id="salario" multiple>
        <option value="maximo">Salario Máximo</option>
        <option value="minimo">Salario Mínimo</option>
    </select><br><br>
    <input type="submit" name="submit" value="Calcular"><br><br>
    <input type="submit" name="cerrarSesion" value="Cerrar Sesion" >
    
</form>
    
</body>
</html>