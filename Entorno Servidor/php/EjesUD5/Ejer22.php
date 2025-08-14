<?php

/**
 * 
 * @author Izan Garrido Quintana
 * 
 * 22. Escribe un formulario que solicite una dirección de correo y que la confirme e indique si
 * acepta recibir publicidad. Añade botón Enviar y Borrar. Cuando enviemos, iremos a otra página
 * donde se le indique el email y si ha aceptado recibir publicidad o no. El botón borrar se
 * mantendrá en el mismo formulario inicial pero limpiará todos los campos.
 * 
*/

if (isset($_POST['enviar'])) {

    $email = $_POST['email'];
    $aceptar = "";
    if (isset($_POST['aceptar'])) {
        $aceptar = $_POST['aceptar'];
    }
   
    if ($aceptar == "on") {
        $aceptar = "Si acepto la publicidad";
    } else {
        $aceptar = "No acepto la publicidad";
    }

   header("Location: Ejer22-enviar.php?email=$email&aceptar=$aceptar");
   exit;
     
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 22</title>

</head>

<body>

    <form action=".\Ejer22.php" method="post">
        <label for="email">Introduce tu correo electrónico:</label>
        <input type="text" name="email"><br><br>

        <label for="aceptar">¿Aceptas recibir publicidad?</label>
        <input type="checkbox" name="aceptar"><br><br>
        
        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" value="Borrar">

    </form>

</body>

</html>