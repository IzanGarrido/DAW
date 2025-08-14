<?php

/**
 * @author Izan Garrido Quintana
 * 
 * 25. Crea una Web para obtener los siguientes datos:
 * Nombre completo, Contraseña (mínimo 6 caracteres),
 * Nivel de Estudios(Sin estudios, Educación Secundaria Obligatoria, Bachillerato, Formación Profesional, Estudios Universitarios),
 * Nacionalidad (Española, Otra),
 * Idiomas (Español, Inglés, Francés, Alemán Italiano),
 * Email, Adjuntar Foto (sólo extensiones jpg, gif y png, tamaño máximo 50 KB).
 * Además de las comprobaciones de validación, se debe comprobar que sube fichero,
 * que el fichero tiene extensión (puedes usar explode()) y ésta es válida,
 * que hay directorio donde guardarlo y que se genera con nombre único.
 * Si todo ha ido bien, redirige al usuario a una página donde se le indique que
 * se ha procesado con éxito e incluye tu nombre y grupo de clase.
 */

// Inluyo el archivo de funciones de validaciones
include 'validaciones.php';

// Inicializar un array para almacenar errores de validación
$errores = [];

// Variable para guardar temporalmente el nombre del archivo subido
$foto_temporal = '';

// Directorio temporal donde se almacenarán las fotos subidas
$directorio_temporal = 'temp/';

// Verificar si el formulario usa el metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verificar si he pulsado el botón de validar, si es asi, me dispongo a realizar las siguientes comprobaciones.
    if (isset($_POST['validar']) || isset($_POST['enviar'])) {

        // Validar el nombre
        if (campoVacio($_POST['nombre'])) {
            $errores['nombre'] = 'El campo nombre está vacío.';
        } else if (!validarNombre($_POST['nombre'])) {
            $errores['nombre'] = 'El nombre completo es obligatorio y debe contener solo letras y espacios.';
        }


        // Validar la contraseña (mínimo 6 caracteres)
        if (campoVacio($_POST['contraseña'])) {
            $errores['contraseña'] = 'El campo contraseña está vacío.';
        } else if (!validarContrasena($_POST['contraseña'])) {
            $errores['contraseña'] = 'La contraseña debe tener al menos 6 caracteres.';
        }

        // Validar nivel de estudios
        if (campoVacio($_POST['nivel_estudios'])) {
            $errores['nivel_estudios'] = 'Debe seleccionar un nivel de estudios.';
        }

        // Validar nacionalidad
        if (!isset($_POST['nacionalidad'])) {
            $errores['nacionalidad'] = 'Debe seleccionar una nacionalidad.';
        }

        // Validar selección de idiomas (al menos uno)
        if (!isset($_POST['idiomas'])) {
            $errores['idiomas'] = 'Debe seleccionar al menos un idioma.';
        }

        // Validar email
        if (campoVacio($_POST['email'])) {
            $errores['email'] = 'El campo email está vacio.';
        } else if (validarEmail($_POST['email'])) {
            $errores['email'] = 'El email no es válido.';
        }

        // Validar subida de foto
        if (!campoVacio($_FILES['foto']['name'])) {
            $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif']; // Extensiones válidas
            $tamano_maximo = 51200; // Tamaño máximo permitido (50 KB)
            $archivo = $_FILES['foto']; // Archivo subido
            $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION); // Obtener extensión del archivo

            // Validar extensión
            if (!in_array(strtolower($extension), $extensiones_permitidas)) {
                $errores['foto'] = 'La foto debe ser JPG, JPEG, PNG o GIF';
            }

            // Validar tamaño del archivo
            else if ($archivo['size'] > $tamano_maximo) {
                $errores['foto'] = 'El tamaño de la foto no debe superar los 50 KB';
            }

            // Si no hay errores, mover el archivo a la carpeta temporal
            else {
                if (!is_dir($directorio_temporal)) {
                    mkdir($directorio_temporal); // Crear directorio si no existe
                }
                $foto_temporal = uniqid() . '.' . $extension; // Generar un nombre único para la foto
                move_uploaded_file($archivo['tmp_name'], $directorio_temporal . $foto_temporal);
            }
        }

        // Si no se subió una nueva foto, usar la foto temporal anterior
        else {
            if (isset($_POST['foto_temporal']) && !campoVacio($_POST['foto_temporal'])) {
                $foto_temporal = $_POST['foto_temporal'];
            } else {
                $errores['foto'] = 'Debe subir una foto';
            }
        }

        if (isset($_POST['enviar'])) {
            if (campoVacio($errores)) {

                $url = 'resultado.php?' .
                    'nombre=' . $_POST['nombre'] . // Codificar nombre
                    '&contraseña=' . $_POST['contraseña'] . // Codificar contraseña
                    '&nivel_estudios=' . $_POST['nivel_estudios'] . // Codificar nivel de estudios
                    '&nacionalidad=' . (isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '') . // Codificar nacionalidad
                    '&email=' . $_POST['email'] . // Codificar email
                    '&idiomas=' . (isset($_POST['idiomas']) ? implode(',', $_POST['idiomas']) : '') . // Codificar idiomas seleccionados
                    '&foto=' . $foto_temporal; // Codifica el nombre del archivo de foto
                header("Location: $url"); // Redirigir a resultado.php
                exit;
            } else if (!campoVacio($errores)) {

                echo "<p class='errores'>Todavía hay errores</p>";
            }
        }

        // Si se presionó enviar y no hay errores, redirigir a resultado.php con los datos


        // Limpiar todos los valores
        if (isset($_POST['limpiar'])) {
            $_POST = []; // Esto limpia todo el formulario al presionar el botón de "limpiar".
            $foto_temporal = '';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Ampliado</title>
    <style>
        .errores {
            color: red;
        }

        .exito {
            color: green;
        }

        body {
            background-color: rgb(235, 235, 235);
        }

        label {
            font-size: 20px;
            font-weight: bold;
            margin-left: 24px;
        }

        input,
        select {
            margin-top: 10px;
            font-size: 16px;
            margin-left: 24px;
        }

        .boton {
            height: 30px;
            width: 120px;
            border-radius: 5px;
            background-color: rgb(220, 220, 220);
            cursor: pointer;
        }

        .boton:hover {
            background-color: rgb(200, 200, 200);
        }
    </style>
</head>

<body>


    <!-- Mostrar errores si los hay -->
    <?php if (!campoVacio($errores) && !isset($_POST['enviar'])): ?>
        <div class="errores">
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif (isset($_POST['validar']) && campoVacio($errores)): ?>
        <!-- Mensaje de éxito si el formulario es válido -->
        <div class="exito">Formulario validado correctamente</div>
        <?php if (!campoVacio($foto_temporal)): ?>
            <p>Foto subida:</p>
            <img src="temp/<?= htmlspecialchars($foto_temporal) ?>" alt="Foto subida" width="200">
        <?php endif; ?>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <h1>Ejercicio 25 ampliado - Izan Garrido</h1>
            </legend>

            <!-- Campo invisible tamaño imagen-->
            <input type="hidden" name="MAX_FILE_SIZE" value="51200">

            <!-- Campos visibles -->

            <!-- Nombre -->
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
            <br><br>

            <!-- Contraseña -->
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" value="<?= htmlspecialchars($_POST['contraseña'] ?? '') ?>">
            <br><br>

            <!-- Nivel de estudios, uso un select -->
            <label for="nivel_estudios">Nivel de estudios:</label>
            <select id="nivel_estudios" name="nivel_estudios">
                <option value="">Seleccione</option>
                <option value="Sin estudios" <?= ($_POST['nivel_estudios'] ?? '') === 'Sin estudios' ? 'selected' : '' ?>>Sin estudios</option>
                <option value="ESO" <?= ($_POST['nivel_estudios'] ?? '') === 'ESO' ? 'selected' : '' ?>>ESO</option>
                <option value="Bachillerato" <?= ($_POST['nivel_estudios'] ?? '') === 'Bachillerato' ? 'selected' : '' ?>>Bachillerato</option>
                <option value="FP" <?= ($_POST['nivel_estudios'] ?? '') === 'FP' ? 'selected' : '' ?>>FP</option>
                <option value="Universitarios" <?= ($_POST['nivel_estudios'] ?? '') === 'Universitarios' ? 'selected' : '' ?>>Universitarios</option>
            </select>
            <br><br>

            <!-- Nacionalidad, uso un input radio -->
            <label for="nacionalidad">Nacionalidad:</label>
            <input type="radio" id="nacionalidad_española" name="nacionalidad" value="Española" <?= ($_POST['nacionalidad'] ?? '') === 'Española' ? 'checked' : '' ?>> Española
            <input type="radio" id="nacionalidad_otra" name="nacionalidad" value="Otra" <?= ($_POST['nacionalidad'] ?? '') === 'Otra' ? 'checked' : '' ?>> Otra
            <br><br>

            <!-- Idiomas, uso un checkbox -->
            <label for="idiomas">Idiomas:</label>
            <input type="checkbox" name="idiomas[]" value="Español" <?= in_array('Español', $_POST['idiomas'] ?? []) ? 'checked' : '' ?>> Español
            <input type="checkbox" name="idiomas[]" value="Inglés" <?= in_array('Inglés', $_POST['idiomas'] ?? []) ? 'checked' : '' ?>> Inglés
            <input type="checkbox" name="idiomas[]" value="Francés" <?= in_array('Francés', $_POST['idiomas'] ?? []) ? 'checked' : '' ?>> Francés
            <input type="checkbox" name="idiomas[]" value="Alemán" <?= in_array('Alemán', $_POST['idiomas'] ?? []) ? 'checked' : '' ?>> Alemán
            <input type="checkbox" name="idiomas[]" value="Italiano" <?= in_array('Italiano', $_POST['idiomas'] ?? []) ? 'checked' : '' ?>> Italiano
            <br><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <br><br>

            <label for="foto">Adjuntar foto:</label>
            <input type="file" id="foto" name="foto">
            <input type="hidden" name="foto_temporal" value="<?= htmlspecialchars($foto_temporal) ?>">
            <br><br>

            <button type="submit" name="limpiar" class="boton">Limpiar</button><br><br>
            <button type="submit" name="validar" class="boton">Validar</button>
            <button type="submit" name="enviar" class="boton">Enviar</button>
        </fieldset>
    </form>

</body>

</html>