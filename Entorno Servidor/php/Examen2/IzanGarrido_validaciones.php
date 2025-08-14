<?php 

/**
 * 
 * @author Izan Garrido Quintana
 * 
 * Validaciones para el examen
 * 
 */


// Función para verificar que un campo no esté vacío
function campoVacio($campo) {
    if (empty($campo)) {
        return true;
    } else {
        return false;
    }
}

// Función para verificar que el nombre solo contenga letras y espacios
function validarNombre($nombre) {

    if (ctype_alpha(str_replace(' ', '', $nombre)) === false) {
        return false;
    } else {
        return true;
    }

}

// Funcion para comprobar que la contraseña tenga un mínimo de 6 caracteres
function validarContrasena($contrasena) {

    if (strlen($contrasena) < 6) {
        return false;
    } else {
        return true;
    }

}

// Funcion para comprobar que el texto solo contiene letras y numeros
function letrasnumeros($texto) {

    $array = explode('', $texto);

    foreach ($array as $caracter) {
        if (ctype_digit($caracter) === false && ctype_alpha($caracter) === false) {
            return false;
        }
    }
    return true;

}

// Función para comprobar que el email tenga el formato correcto
function validarEmail($email) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }

}

?>