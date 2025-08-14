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
 * 
 * 
 * Añadir boton validar
 * Usar otro php
 * Mostrar la foto
 */

// Variable global

if (isset($_POST['oculta'])) {
    $imagenoculta = $_POST['oculta'];
} else {
    $imagenoculta = '';
}

// Funcion que valida los campos del formulario
function validar()
{
    // Verifico si todos los campos están validados
    if (validarNombre() && validarPassword() && validarCorreo() && validarImagen() && validarNacionalidad() && validarIdiomas()) {
        return true;
    } else {
        return false;
    }
}

// Función para validar el formato del nombre
function validarNombre()
{

    $nombre = $_POST["nombre"]; // Cojo el nombre con post

    // Utilizo expresiones regulares para que el nombre no contenga numeros ni simbolos
    if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/', $nombre)) {
        return false;
    } else {
        return true;
    }
}

// Función para validar la longitud de la contraseña
function validarPassword()
{

    $password = $_POST["password"]; // Cojo la contraseña con post

    if (strlen($password) < 6) { // Compruebo que tenga mas de 6 caracteres
        return false;
    } else {
        return true;
    }
}

// Funcion para validar el formato del correo
function validarCorreo()
{

    $email = $_POST["email"];

    // Expresión regular para valida el email
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        return false;
    } else {
        return true;
    }
}

// Función para verificar que la imagen tenga la extensión correcta y el peso adecuado 
function validarImagen()
{
    global $imagenoculta;
        //Obtengo la extension y el tamaño de la imagen proporcionada

            if ($imagenoculta != '') {
                $imagen = explode('.',$imagenoculta);
                $extension = $imagen[1];
                $tamaño = filesize($imagenoculta);
                return true;
            
            } else {
                $extension = $_FILES["imagen"]["type"]; 
                $tamaño = $_FILES["imagen"]["size"];
            }
        // Incluyo también la extensión jpeg, ya que hace la misma función que jpg pero a veces la extension
        // la llama de una forma y a veces de otra
        if ($_FILES["imagen"]["name"] == null){
            return false;
        } else if(($extension != "jpg" || $extension != "jpeg" || $extension != "gif" || $extension != "png") && $tamaño >= 50000) {
            return false;
        } else {
            guardarImagen();
            return true;
        }

}

// Función para crear el directorio si no existe, y guardar el archivo con nombre unico dentro de el
function guardarImagen() {
    $directorio = 'img'; // Directorio donde guardar las imágenes
    $archivo = $_FILES['imagen'];

    // Crear el directorio si no existe
    if (!is_dir($directorio)) {
        mkdir($directorio);
    }

    // Fecha de hoy
    $fecha = date("m-d_H-i_");

    // Generar un nombre único para el archivo
    $nombreUnico = $fecha . "Imagen.jpg";

    // Ruta completa donde se guardará el archivo
    $rutaDestino = $directorio . '/' . $nombreUnico;

    global $imagenoculta;

    $imagenoculta = $rutaDestino;

    // Mover el archivo subido a la carpeta destino
   move_uploaded_file($archivo['tmp_name'], $rutaDestino);

}

// Función para verificar que el campo de nacionalidad no esté vacío
function validarNacionalidad()
{

    if (!isset($_POST["nacionalidad"])) {
        return false;
    } else {
        return true;
    }
}

// Función para verificar que el campo de idiomas no esté vacío
function validarIdiomas()
{

    if (!isset($_POST["idiomas"])) {
        return false;
    } else {
        return true;
    }
}

// Cuando le das al boton validar te envía a la función de validar
if (isset($_POST["validar"])) {

    echo "<ul>";

    // Saca una lista si algún campo es incorrecto con los siguientes mensajes al pulsar el botón de validar
    if (!validarNombre()) {

        echo "<li class='rojo'>Formato de nombre incorrecto</li>";
    } else {
        echo "<li class='verde'>Nombre: " . $_POST['nombre'] . "</li>";

    }

    if (!validarPassword()) {

        echo "<li class='rojo'>Contraseña debe contener almenos 6 caracteres</li>";
    } else {
        echo "<li class='verde'>Contraseña: " . $_POST['password'] . "</li>";

    }

    if (!validarNacionalidad()) {

        echo "<li class='rojo'>Campo nacionalidad no puede estar vacio</li>";
    } else {
        echo "<li class='verde'>Nacionalidad: " . $_POST['nacionalidad'] . "</li>";

    }


    if (!validarIdiomas()) {

        echo "<li class='rojo'>Campo idiomas no puede estar vacio</li>";
    } else {
        echo "<li class='verde'>Idiomas: " . implode(', ', $_POST['idiomas']) . "</li>";

    }

    if (!validarCorreo()) {

        echo "<li class='rojo'>Formato de correo incorrecto</li>";
    } else {
        echo "<li class='verde'>Correo: " . $_POST['email'] . "</li>";

    }
    
    if (!validarImagen()) {

        echo "<li class='rojo'>Formato de imagen incorrecto</li>";
    } else {
        global $imagenoculta;
        echo "<li class='verde'>Imagen subida correctamente <img src='$imagenoculta' alt='Imagen pasada'> </li>";
    }

    echo "</ul>";
}

// Detectar si se ha pulsado "Reset" o si el formulario no ha sido enviado.
if (isset($_POST['reset'])) {
    $_POST = []; // Vacía los datos si no se ha enviado el formulario.
}

// Al pulsar el botón enviar si no está validado te lo indica, y si ya lo está, te envía a la pagina 'res25.php' para mostrar los datos
if (isset($_POST["enviar"])) {

    if (!validar()) {
        echo "<p class='rojo'>Faltan campos por validar</p>";
    } else {
        header('Location: res25.php?' . http_build_query($_POST)); 
        exit();

    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro - Izan Garrido Quintana</title>
    <style>
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

        .rojo {
            color: red;
            font-size: 18px;
        }

        .verde {
            color: green;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <form action="Ejer25.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <h1>Formulario de Registro - Izan Garrido Quintana</h1>
            </legend>

            <label for="nombre">Nombre completo: </label><br>
            <input type="text" name="nombre" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"><br><br>

            <label for="password">Contraseña: </label><br>
            <input type="text" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>"><br><br>

            <label for="estudios">Nivel de estudios: </label><br>
            <select name="estudios">
                <option value="sin_estudios" <?php echo (isset($_POST['estudios']) && $_POST['estudios'] == 'sin_estudios') ? 'selected' : ''; ?>>Sin estudios</option>
                <option value="eso" <?php echo (isset($_POST['estudios']) && $_POST['estudios'] == 'eso') ? 'selected' : ''; ?>>ESO</option>
                <option value="bach" <?php echo (isset($_POST['estudios']) && $_POST['estudios'] == 'bach') ? 'selected' : ''; ?>>Bachillerato</option>
                <option value="fp" <?php echo (isset($_POST['estudios']) && $_POST['estudios'] == 'fp') ? 'selected' : ''; ?>>FP</option>
                <option value="uni" <?php echo (isset($_POST['estudios']) && $_POST['estudios'] == 'uni') ? 'selected' : ''; ?>>Universidad</option>
            </select><br><br>

            <label for="nacionalidad">Nacionalidad: </label><br>
            <input type="radio" name="nacionalidad" value="espanya" <?php echo (isset($_POST['nacionalidad']) && $_POST['nacionalidad'] == 'espanya') ? 'checked' : ''; ?>>España
            <input type="radio" name="nacionalidad" value="otra" <?php echo (isset($_POST['nacionalidad']) && $_POST['nacionalidad'] == 'otra') ? 'checked' : ''; ?>>Otra <br><br>

            <label for="idiomas">Idiomas: </label><br>
            <?php
            $idiomasSeleccionados = isset($_POST['idiomas']) ? $_POST['idiomas'] : [];
            ?>
            <input type="checkbox" name="idiomas[]" value="espanyol" <?php echo in_array('espanyol', $idiomasSeleccionados) ? 'checked' : ''; ?>>Español
            <input type="checkbox" name="idiomas[]" value="ingles" <?php echo in_array('ingles', $idiomasSeleccionados) ? 'checked' : ''; ?>>Inglés
            <input type="checkbox" name="idiomas[]" value="frances" <?php echo in_array('frances', $idiomasSeleccionados) ? 'checked' : ''; ?>>Francés <br>
            <input type="checkbox" name="idiomas[]" value="aleman" <?php echo in_array('aleman', $idiomasSeleccionados) ? 'checked' : ''; ?>>Alemán
            <input type="checkbox" name="idiomas[]" value="italiano" <?php echo in_array('italiano', $idiomasSeleccionados) ? 'checked' : ''; ?>>Italiano <br><br>

            <label for="email">Correo electrónico: </label><br>
            <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>

            <label for="imagen">Añada una imagen: </label><br>
            <input type="hidden" name="oculta" value="<?= $imagenoculta; ?>">

            <input type="file" name="imagen"><br><br>

            <input type="submit" value="Limpiar" class="boton" name="reset"><br><br>
            <input type="submit" value="Validar" class="boton" name="validar">
            <input type="submit" value="Enviar" class="boton" name="enviar">

        </fieldset>
    </form>
</body>

</html>