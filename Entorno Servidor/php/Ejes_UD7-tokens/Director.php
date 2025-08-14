<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {


    if (isset($_POST["cerrarSesion"])) {
        session_unset();
        header("Location: Ejer2.php");
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Director</h1>
    <?php
    printf("<h2>Bienvenido a la asignatura de %s del grupo %s, %s</h2>", $_SESSION["asignatura"], $_SESSION["grupo"], $_SESSION["usuario"]);
    ?>
    <form action="Director.php" method="post">
        <input type="submit" name="cerrarSesion" value="Cerrar Sesion">
    </form>
</body>

</html>