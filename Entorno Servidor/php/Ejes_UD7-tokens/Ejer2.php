<?php

/**
 * @author Izan Garrido Quintana
 */

/*
2. Crea un token de formulario para el formulario del ejercicio 2 de Roles (Delegado, Estudiante,
Profesor y Director) de modo que se pueda asegurar la sesión de cada usuario desde la página
del formulario a la página personalizada de cada uno. Debes comprobar el resultado avisando
en caso de que el token no coincida. Puedes añadir un botón cambiar SID que generará un
nuevo token en la sesión y así comprobar que detecta si la SID no coincide
*/

session_start();
if (!isset($_SESSION["token"])) {
    $_SESSION["token"] = bin2hex(random_bytes(24));
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $_SESSION["usuario"] = $_POST["nombre"] . " " . $_POST["apellido"];
    $_SESSION["asignatura"] = $_POST["asignatura"];
    $_SESSION["grupo"] = $_POST["grupo"];
    $_SESSION["edad"] = $_POST["edad"];
    $_SESSION["cargo"] = $_POST["cargo"];

    if (!isset($_POST['token'])) {
        print('No se ha encontrado token!');
    } else {
        if (hash_equals($_POST['token'], $_SESSION['token']) === false) {
            print('El token no coincide!');
        } else {
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
    }

    if (isset($_POST["generartoken"])) {
        $_SESSION["token"] = bin2hex(random_bytes(24));
       
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

        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">


        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido"><br><br>

        <label for="asignatura">Asignatura:</label>
        <input type="text" name="asignatura"><br><br>

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

        <input type="submit" name="submit"><br><br>
        <input type="submit" name="generartoken" value="Generar Nuevo token">

    </form>

</body>

</html>