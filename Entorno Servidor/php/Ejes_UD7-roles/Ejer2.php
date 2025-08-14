<?php

/**
 * @author Izan Garrido Quintana
 */

/*
2. Crea un formulario de identificación de usuario de modo que el usuario introduzca su nombre,
apellido, asignatura y grupo. Además debe seleccionar si es menor o mayor de edad y si tiene
un cargo o no. Según los datos introducidos, se clasificará en un perfil según la siguiente tabla:

Perfil       Mayor de edad      Menor de edad      Con cargo      Sin cargo
Delegado                              X                X
Estudiante                            X                              X
Profesor           X                                                 X
Director           X                                   X

Genera una página para cada perfil de la tabla en la que se muestre un saludo de bienvenida
indicando los datos del usuario (nombre y apellidos) y mostrando la asignatura y grupo elegidos.
Además deberá poder cerrar la sesión y volver a la página del formulario. Utiliza las sesiones
para poder realizar este ejercicio.
*/

session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $_SESSION["usuario"] = $_POST["nombre"] . " " . $_POST["apellido"];
    $_SESSION["asignatura"] = $_POST["asignatura"];
    $_SESSION["grupo"] = $_POST["grupo"];
    $_SESSION["edad"] = $_POST["edad"];
    $_SESSION["cargo"] = $_POST["cargo"];

    if (isset($_POST["submit"])) {

        if (isset($_SESSION['usuario'], $_SESSION["asignatura"], $_SESSION["grupo"], $_SESSION["edad"], $_SESSION["cargo"])) {

            $perfil = $_SESSION["edad"] . "," . $_SESSION["cargo"];

            switch ($perfil) {
                case 'mayor,sin_cargo':
                    $location = 'Location: Profesor.php';
                    break;
                case 'mayor,con_cargo':
                    $location = 'Location: Director.php';
                    break;
                case 'menor,sin_cargo':
                    $location = 'Location: Estudiante.php';
                    break;
                case 'menor,con_cargo':
                    $location = 'Location: Delegado.php';
                    break;
            }
            header($location);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Izan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Ejercicio 2 Main</h1>

    <!-- Formulario para seleccionar el cálculo deseado -->
    <form action="Ejer2.php" method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" ><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" ><br><br>

        <label for="asignatura">Asignatura:</label>
        <input type="text" name="asignatura" ><br><br>

        <label for="grupo">Grupo:</label>
        <select name="grupo">
            <option value="A">Grupo A</option>
            <option value="B">Grupo B</option>
            <option value="C">Grupo C</option>
        </select><br><br>

        <label for="edad">Edad:</label>
        <select name="edad">
            <option value="mayor">Mayor de edad</option>
            <option value="menor">Menor de edad</option>
        </select><br><br>

        <label for="cargo">Cargo:</label>
        <select name="cargo" required>
            <option value="con_cargo">Con cargo</option>
            <option value="sin_cargo">Sin cargo</option>
        </select><br><br>

        <input type="submit" name="submit">
    </form>

</body>

</html>