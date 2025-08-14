<?php

/**
 * @author Izan Garrido Quintana
 */

// Recuperar datos enviados por la URL
$nombre = $_GET['nombre'] ?? '';
$email = $_GET['email'] ?? '';
$usuario = $_GET['usuario'] ?? '';
$contraseña = $_GET['contraseña'] ?? '';
$poblacion = $_GET['poblacion'] ?? '';
$elementos = explode(',', $_GET['elementos'] ?? '');
$necesidades = explode(',', $_GET['necesidades'] ?? '');
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

        .azul {
            color: blue;
        }



    </style>
</head>
<body>
    <h2 class="azul">Sus datos han sido enviados correctamente - IzanGarrido</h2>
    <div class="container">
    <h1>Datos del Formulario</h1>
    <p><strong>Nombre:</strong> <?= htmlspecialchars(strtoupper($nombre)) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars(strtoupper($email)) ?></p>
    <p><strong>Usuario:</strong> <?= htmlspecialchars(strtoupper($usuario)) ?></p>
    <p><strong>Contraseña:</strong> <?= htmlspecialchars(strtoupper($contraseña)) ?></p>
    <p><strong>Población afectada:</strong> <?= htmlspecialchars(strtoupper($poblacion)) ?></p>
    <p><strong>Elementos afectados:</strong> <?= htmlspecialchars(strtoupper(implode(', ', $elementos))) ?></p>
    <p><strong>Necesidades:</strong> <?= htmlspecialchars(strtoupper(implode(', ', $necesidades))) ?></p>
    <p><strong>Foto:</strong></p>
    <?php if (!empty($foto)): ?>
        <p><strong>Ruta de la imagen:</strong> ./img/<?= htmlspecialchars($foto) ?></p>
        <img src="./img/<?= htmlspecialchars($foto) ?>" alt="Foto subida" width="200">
    <?php endif; ?>
    </div>
</body>
</html>