<?php
/**
 * 
 * @author Izan Garrido Quintana
 * 
 * 18. Escribe un programa para que, a criterio del usuario, obtenga la media, la moda (número más
 * frecuente) o la mediana (el número de en medio o el promedio de los dos centrales si son pares)
 * de los números que introduzca el usuario, Se podrán seleccionar de una a todas las opciones
 * calculadas pero se deben mostrar todas para que el usuario las marque o desmarque
 * 
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 18</title>

</head>

<body>

<form action=".\Ejer18.php" method="post">
    <label for="numeros">Introduce los números separados por comas:</label><br>
    <input type="text" id="numeros" name="numeros" required>
    <br><br>
    <label for="resultado">Escoge una o varias opciones:</label><br>
    <input type="checkbox" id="media" name="resultado[]" value="media">Media<br>
    <input type="checkbox" id="moda" name="resultado[]" value="moda">Moda<br>
    <input type="checkbox" id="mediana" name="resultado[]" value="mediana">Mediana<br><br>

    <input type="submit" name="enviar" value="Enviar">


</form>

</body>
</html>

<?php
// Funcion par comprobar sin el texto introducido son numeros
function SonNums() {
    $numeros = $_POST['numeros'];
    $numeros = explode(',', $numeros);
    foreach ($numeros as $numero) {
        if (!is_numeric($numero)) {
            return false;
        }   
    }
    return true;
}

function media() {
    $numeros = $_POST['numeros'];
    $numeros = explode(',', $numeros);
    return array_sum($numeros) / count($numeros);
}
function moda() {
    $numeros = $_POST['numeros'];
    $numeros = explode(',', $numeros);

    $conteos = array_count_values($numeros);

    $maxFrecuencia = max($conteos);

    $moda = array_keys($conteos, $maxFrecuencia);

    return count($moda) === 1 ? $moda[0] : implode(", ",$moda);
}

function mediana() {
    $numeros = $_POST['numeros'];
    $numeros = explode(',', $numeros);

    if (count($numeros) % 2 == 0) {
        return (($numeros[count($numeros) / 2 - 1] + $numeros[count($numeros) / 2]) / 2);
    } else {
        return $numeros[floor(count($numeros) / 2)];
    }
    return $mediana;

}

if (isset($_POST['enviar'])) {

    if (SonNums()) {
        $numeros = $_POST['numeros'];
        $numeros = explode(',', $numeros);

        $casos = $_POST['resultado'];

        foreach ($casos as $caso) {
            switch ($caso) {
                case "media":
                    echo "Media: ".media()."<br>";    
                    break;
                case 'moda':
                    echo "Moda: ".moda()."<br>";
                    break;
                case 'mediana':
                    echo "Mediana: ".mediana()."<br>";
                    break;
                
            }
            
        }
        
    } else {
        echo "Error: Debes introducir números separados por comas.";
    }

}

?>