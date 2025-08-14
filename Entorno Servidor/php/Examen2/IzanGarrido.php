<?php 

/**
 * 
 * @author Izan Garrido Quintana
 * 
 * Nombre
 * Email
 * Usuario
 * Password
 * radio Particular o empresa
 * 
 * select: Población afectada: aldaia, catarroja, paiporta, picaña, sedavi
 * 
 * select multiple: casa, bajo, comercial, sotanos del garaje, trastero, vehiculo
 * 
 * checkbox multiple: extracción de lodo, limpieza, desinfeccion de lodo, limpieza,
 * desinfeccion, secado, revision de estructuras, tareas reconstrucción, excarcelación de coches.
 * 
 * acepta o no LOPDGDD, obligatorio
 * 
 * ADJUNTAr foto
 * 
 * validar, borrar y enviar
 */

// Inluyo el archivo de funciones de validaciones
include 'IzanGarrido_validaciones.php';

// Inicializar un array para almacenar errores de validación
$errores = [];

// Variable para guardar el nombre del archivo subido
$foto_temporal = '';

// Directorio donde se almacenarán las fotos subidas
$directorio_temporal = 'img/';

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

        // Validar email
        if (campoVacio($_POST['email'])) {
            $errores['email'] = 'El campo email está vacio.';
        } else if (validarEmail($_POST['email'])) {
            $errores['email'] = 'El email no es válido.';
        }

        // Validar usuario
        if (campoVacio($_POST['usuario'])) {
            $errores['usuario'] = 'El campo usuario está vacio.';
        }

        // Validar la contraseña (mínimo 6 caracteres) letras y numeros
        if (campoVacio($_POST['contraseña'])) {
            $errores['contraseña'] = 'El campo contraseña está vacío.';

        } else if (!validarContrasena($_POST['contraseña'])) {
            $errores['contraseña'] = 'La contraseña debe tener al menos 6 caracteres.';
        }

        // Validar particular o empresa
        if (!isset($_POST['trabajo'])) {
            $errores['trabajo'] = 'Debe poner particular o empresa.';
        }

        // Validar población afectada
        if (campoVacio($_POST['poblacion'])) {
            $errores['poblacion'] = 'Debe seleccionar una población afectada.';
        }

        // Validar elementos afectados
        if (!isset($_POST['elementos'])) {
            $errores['elementos'] = 'Debe seleccionar al menos un elemento afectado.';
        }

        // Validar necesidades
        if (!isset($_POST['necesidades'])) {
            $errores['necesidades'] = 'Debe marcar al menos una necesidad.';
        }

        // Validar LOPDGDD
        if (!isset($_POST['aceptar'])) {
            $errores['aceptar'] = 'Debe aceptar LOPDGDD.';
        }

        // Validar subida de foto
        if (!campoVacio($_FILES['foto']['name'])) {
            $archivo = $_FILES['foto'];
            $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION); 

            // Validar extensión
            if (strtolower($extension) != 'png') {
                $errores['foto'] = 'La foto debe ser PNG';
            }

            // Validar tamaño del archivo
            else if ($archivo['size'] > $_POST['MAX_FILE_SIZE']) {
                $errores['foto'] = 'El tamaño de la foto no debe superar los 100 KB';
            }

            // Si no hay errores, mover el archivo a la carpeta 
            else {
                if (!is_dir($directorio_temporal)) {
                    mkdir($directorio_temporal);
                }
               /* if (campoVacio["n"]) {
                    # code...
                }*/
                $foto_temporal = $_POST['nombre'] . '.' . $extension;
                echo $foto_temporal;
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

                $url = 'IzanGarrido_ok.php?' .
                    'nombre=' . $_POST['nombre'] . 
                    '&email=' . $_POST['email'] .
                    '&usuario=' . $_POST['usuario'] . 
                    '&contraseña=' . $_POST['contraseña'] . 
                    '&trabajo=' . (isset($_POST['trabajo']) ? $_POST['trabajo'] : '') . 
                    '&poblacion=' . (isset($_POST['poblacion']) ? $_POST['poblacion'] : '') . 
                    '&elementos=' . (isset($_POST['elementos']) ? implode(',', $_POST['elementos']) : '') . 
                    '&necesidades=' . (isset($_POST['necesidades']) ? implode(',', $_POST['necesidades']) : '') . 
                    '&foto=' . $foto_temporal; 
                header("Location: $url"); 
                exit;
            } else if (!campoVacio($errores)) {

                echo "<p class='rojo'>Todavía hay errores</p>";
            }
        }

        
    }
    // Limpiar todos los valores
    if (isset($_POST['limpiar'])) {
        $_POST = [];
        $foto_temporal = '';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izan Garrido</title>

    <style>
        .rojo {
            color: red;
        }
        .verde {
            color: green;

        }
    </style>
</head>

<body>

    <!-- Mostrar errores si los hay -->
    <?php if (!campoVacio($errores) && !isset($_POST['enviar'])): ?>
        <div class="rojo">
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif (isset($_POST['validar']) && campoVacio($errores)): ?>
        <!-- Mensaje de éxito si el formulario es válido -->
        <div class="verde">El formulario está listo para enviar</div>
    <?php endif; ?>


    <!-- Formulario -->
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <h1>Examen - Izan Garrido</h1>
            </legend>

            <!-- Campos invisibles -->

            <!-- Ruta de la foto  -->
            <input type="hidden" name="foto_temporal" value="<?= htmlspecialchars($foto_temporal) ?>">

            <!-- Tamaño maximo de la foto  -->
            <input type="hidden" name="MAX_FILE_SIZE" value="102400">


            <!-- Campos visibles -->

            <!-- Nombre -->
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
            <br><br>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <br><br>

            <!-- Usuario -->
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($_POST['usuario'] ?? '') ?>">
            <br><br>

            <!-- Contraseña -->
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" value="<?= htmlspecialchars($_POST['contraseña'] ?? '') ?>">
            <br><br>

            <!-- Particular o empresa -->
            <label for="trabajo">Trabajo:</label>
            <input type="radio" id="particular" name="trabajo" value="Particular" <?= ($_POST['trabajo'] ?? '') === 'Particular' ? 'checked' : '' ?>> Particular
            <input type="radio" id="empresa" name="trabajo" value="Empresa" <?= ($_POST['trabajo'] ?? '') === 'Empresa' ? 'checked' : '' ?>> Empresa
            <br><br>

            <!-- Población afectada -->
            <label for="poblacion">Población afectada:</label>
            <select id="poblacion" name="poblacion">
                <option value="">Seleccione</option>
                <option value="Aldaia" <?= ($_POST['poblacion'] ?? '') === 'Aldaia' ? 'selected' : '' ?>>Aldaia</option>
                <option value="Catarroja" <?= ($_POST['poblacion'] ?? '') === 'Catarroja' ? 'selected' : '' ?>>Catarroja</option>
                <option value="Paiporta" <?= ($_POST['poblacion'] ?? '') === 'Paiporta' ? 'selected' : '' ?>>Paiporta</option>
                <option value="Picaña" <?= ($_POST['poblacion'] ?? '') === 'Picaña' ? 'selected' : '' ?>>Picaña</option>
                <option value="Sedaví" <?= ($_POST['poblacion'] ?? '') === 'Sedaví' ? 'selected' : '' ?>>Sedaví</option>
            </select>
            <br><br>

            <!-- Elementos afectados -->
            <label for="elementos">Elementos afectados:</label>
            <select name="elementos[]" id="elementos" multiple size="3">
                <option value="casa" <?= isset($_POST['elementos']) && in_array('casa', $_POST['elementos']) ? 'selected' : '' ?>>Casa</option>
                <option value="bajo" <?= isset($_POST['elementos']) && in_array('bajo', $_POST['elementos']) ? 'selected' : '' ?>>Bajo</option>
                <option value="comercial" <?= isset($_POST['elementos']) && in_array('comercial', $_POST['elementos']) ? 'selected' : '' ?>>Comercial</option>
                <option value="sotanos_garage" <?= isset($_POST['elementos']) && in_array('sotanos_garage', $_POST['elementos']) ? 'selected' : '' ?>>Sótanos garage</option>
                <option value="trastero" <?= isset($_POST['elementos']) && in_array('trastero', $_POST['elementos']) ? 'selected' : '' ?>>Trastero</option>
                <option value="vehiculo" <?= isset($_POST['elementos']) && in_array('vehiculo', $_POST['elementos']) ? 'selected' : '' ?>>Vehículo</option>
            </select>
            <br><br>

            <!-- Necesidades -->
            <label for="necesidades">Necesidades:</label>
            <input type="checkbox" name="necesidades[]" value="extraccion_lodo" <?= in_array('extraccion_lodo', $_POST['necesidades'] ?? []) ? 'checked' : '' ?>> Extracción de lodo
            <input type="checkbox" name="necesidades[]" value="limpieza" <?= in_array('limpieza', $_POST['necesidades'] ?? []) ? 'checked' : '' ?>> Limpieza
            <input type="checkbox" name="necesidades[]" value="desinfeccion_secado" <?= in_array('desinfeccion_secado', $_POST['necesidades'] ?? []) ? 'checked' : '' ?>> Desinfección y secado
            <input type="checkbox" name="necesidades[]" value="revision_estructuras" <?= in_array('revision_estructuras', $_POST['necesidades'] ?? []) ? 'checked' : '' ?>> Revisión de estructura
            <input type="checkbox" name="necesidades[]" value="reconstruccion" <?= in_array('reconstruccion', $_POST['necesidades'] ?? []) ? 'checked' : '' ?>> Tareas de reconstrucción
            <input type="checkbox" name="necesidades[]" value="excarcelacion" <?= in_array('excarcelacion', $_POST['necesidades'] ?? []) ? 'checked' : '' ?>> Excarcelación de coches
            <br><br>

            <!-- Aceptar LOPDGDD -->
            <label for="aceptar">¿Aceptas LOPDGDD?</label>
            <input type="checkbox" name="aceptar" value="aceptar"<?= $_POST['aceptar'] ? 'checked' : '' ?>>
            <br><br>

            <!-- Adjuntar foto -->
            <label for="foto">Adjuntar foto:</label>
            <input type="file" id="foto" name="foto">
            <br><br>

            <!-- Botón limpiar formulario -->
            <button type="submit" name="limpiar" class="boton">Limpiar</button>
            <br><br>

            <!-- Botón validar formulario -->
            <button type="submit" name="validar" class="boton">Validar</button>

            <!-- Botón enviar formulario -->
            <button type="submit" name="enviar" class="boton">Enviar</button>
        </fieldset>
    </form>

</body>

</html>