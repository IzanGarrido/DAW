<?php   

/**
 * 
 * @author Izan Garrido Quintana
 * 
 */

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$contra = isset($_GET['password']) ? $_GET['password'] : '';
$estudios = isset($_GET['estudios']) ? $_GET['estudios'] : '';
$nacionalidad = isset($_GET['nacionalidad']) ? $_GET['nacionalidad'] : '';
$idiomas = isset($_GET['idiomas']) ? $_GET['idiomas'] : '';
$correo = isset($_GET['email']) ? $_GET['email'] : '';
$imagen = isset($_GET['oculta']) ? $_GET['oculta'] : '';

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Datos</title>

    <style>

        * {
            font-family: Arial;
        }

        body {
            background-color: green;
        }

        .container {
            display: flex;
            flex-direction: column;
            margin-inline: 35%;
            margin-block: 2%;
            padding-inline: 5%;
            padding-block: 2%;
            background-color: salmon;
            border-radius: 20px;
            box-shadow: inset 0px 10px 10px green;
        
        }

        h1 {
            font-size: 28px;
        }

        p {
            font-size: 18px;
        }

        img {
            margin-inline: calc(60%/2);
            height: 5%;
            width: 40%;
        }



    </style>

</head>
<body>
    <div class="container">
        <h1>Resumen de los datos ingresados</h1>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
        <p><strong>Contraseña:</strong> <?= htmlspecialchars($contra) ?></p>
        <p><strong>Estudios:</strong> <?= htmlspecialchars($estudios) ?></p>
        <p><strong>Nacionalidad:</strong> <?= htmlspecialchars($nacionalidad) ?></p>
        <p><strong>Idiomas:</strong> <?= implode(', ', $idiomas) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($correo) ?></p>
        <p><strong>Imagen:</strong></p>
        <img src="<?= $imagen  ?>" alt="Imagen pasada">
    </div>
</body>
</html>