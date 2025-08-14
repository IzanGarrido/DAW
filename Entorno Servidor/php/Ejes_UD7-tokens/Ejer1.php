<?php

/**
 * @author Izan Garrido Quintana
 */

/*
1. Crea un token de formulario para el formulario del ejercicio 1 de Roles (Gerente, Sindicalista y
Responsable de Nóminas) de modo que se pueda asegurar la sesión de cada usuario desde la
página del formulario a la página personalizada de cada uno. Debes comprobar el resultado
avisando en caso de que el token no coincida. Puedes añadir un botón cambiar SID que
generará un nuevo token en la sesión y así comprobar que detecta si la SID no coincide
*/

session_start();
if (!isset($_SESSION["token"])) {
    $_SESSION["token"] = bin2hex(random_bytes(24));
}

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

    if (!isset($_POST['token'])) {
        print('No se ha encontrado token!');
    } else {
        if (hash_equals($_POST['token'], $_SESSION['token']) === false) {
            print('El token no coincide!');
        } else {
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
    <title>Ejercicio 1 - Izan</title>
</head>

<body>

    <h1>Ejercicio 1 Main</h1>

    <!-- Formulario para seleccionar el cálculo deseado -->
    <form action="Ejer1.php" method="post">

        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

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

        <input type="submit" name="submit"><br><br>
        <input type="submit" name="generartoken" value="Generar Nuevo token">
    </form>

</body>

</html>