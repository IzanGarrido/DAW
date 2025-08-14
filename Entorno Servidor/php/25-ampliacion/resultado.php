<?php

/**
 * @author Izan Garrido Quintana
 */

// Recuperar datos enviados por la URL
$nombre = $_GET['nombre'] ?? '';
$contraseña = $_GET['contraseña'] ?? '';
$nivel_estudios = $_GET['nivel_estudios'] ?? '';
$nacionalidad = $_GET['nacionalidad'] ?? '';
$email = $_GET['email'] ?? '';
$idiomas = explode(',', $_GET['idiomas'] ?? '');
$foto = $_GET['foto'] ?? '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
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
    <h1>Datos del Formulario</h1>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
    <p><strong>Contraseña:</strong> <?= htmlspecialchars($contraseña) ?></p>
    <p><strong>Nivel de Estudios:</strong> <?= htmlspecialchars($nivel_estudios) ?></p>
    <p><strong>Nacionalidad:</strong> <?= htmlspecialchars($nacionalidad) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Idiomas:</strong> <?= htmlspecialchars(implode(', ', $idiomas)) ?></p>
    <p><strong>Foto:</strong></p>
    <?php if (!empty($foto)): ?>
        <p><strong>Ruta de la imagen:</strong> temp/<?= htmlspecialchars($foto) ?></p>
        <img src="temp/<?= htmlspecialchars($foto) ?>" alt="Foto subida" width="200">
    <?php endif; ?>
    </div>
</body>
</html>