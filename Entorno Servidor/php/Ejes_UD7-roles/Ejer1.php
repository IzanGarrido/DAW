<?php

/**
 * @author Izan Garrido Quintana
 */

/*
1. Crea un formulario de autenticación para visualizar resultados basándote en el Ejercicio 10 de la
UD5 de modo que, según el usuario que acceda (recoge un nombre y perfil (Gerente,
Sindicalista y Responsable de Nóminas, todos excluyentes entre sí) y crea el vector de
empleados en este formulario), sea redirigido a su página personalizada donde pueda ver los
datos a los que tiene permiso. Así pues, el Gerente podrá ver todos los resultados del salario
mínimo, máximo y promedio, el sindicalista sólo puede acceder al salario medio y la
responsable de Nóminas al salario mínimo y máximo. Añade un título a cada página indicando
el rol o si es el formulario de la empresa junto con tu nombre. En cada perfil, aña
*/

session_start();

// Array asociativo de trabajadores con sus respectivos salarios
$trabajadores = array(
    "Juan" => 2500,
    "Ana" => 3000,
    "Carlos" => 2800,
    "Marta" => 3200,
    "Luis" => 2700
);

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['rol'] = $_POST['rol'];

    if (isset($_POST["submit"])) {

        if (isset($_SESSION['usuario'])) {
            switch ($_SESSION['rol']) {
                case 'Gerente':
                    $location = 'Location: Gerente.php';
                    break;
                case 'Sindicalista':
                    $location = 'Location: Sindicalista.php';
                    break;
                case 'Responsable_nominas':
                    $location = 'Location: Responsable_nominas.php';
                    break;
            }
        }
        header($location);
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

    <h1>Ejercicio 1 Main</h1>

    <!-- Formulario para seleccionar el cálculo deseado -->
    <form action="Ejer1.php" method="post">

        Nombre: <select name="usuario">
            <?php foreach ($trabajadores as $key => $value) {
                echo "<option value='$key'>$key</option>";
            } ?>
        </select><br><br>

        Perfil: <select name="rol">
            <option value="Gerente">Gerente</option>
            <option value="Sindicalista">Sindicalista</option>
            <option value="Responsable_nominas">Responsable de nóminas</option>
        </select><br><br>

        <input type="submit" name="submit">
    </form>

</body>

</html>