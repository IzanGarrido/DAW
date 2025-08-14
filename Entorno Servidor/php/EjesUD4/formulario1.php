<?php 
/**
 * @author Izan Garrido Quintana
 */
?>

<!DOCtype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 1</title>
</head>
<body>

<h1>Izan Garrido - Formulario de registro</h1>

<form action="/formulario1.php" method="get">

    <!-- El nombre, con un control de tipo texto. Tamaño máximo 50 caracteres -->
    <label for="nombre" >Nombre: </label>
    <input type="text" name="nombre" maxlength="50"><br><br>

    <!-- Los apellidos, con un control de tipo texto. Tamaño máximo 200 caracteres -->
    <label for="apellidos">Apellidos: </label>
    <input type="text" name="apellidos" maxlength="200"><br><br>

    <!-- El sexo, con dos opciones excluyentes: hombre o mujer -->
    <label for="sexo">Sexo: </label>
    <input type="radio" name="sexo" VALUE="hombre">hombre
    <input type="radio" name="sexo" VALUE="mujer">mujer<br><br>

    <!-- El correo electrónico, con un control de tipo texto. Tamaño máximo 250 caracteres -->
    <label for="correo">Correo: </label>
    <input type="text" name="correo" maxlength="250"><br><br>

    <!-- Provincia: un desplegable con los valores Alicante, Castellón y Valencia y sólo se podrá seleccionar uno de ellos -->
    <label for="provincia">Provincia: </label>
    <select name="provincia">
        <option value="alicante">Alicante</option>
        <option value="castellon">Castellon</option>
        <option value="valencia">Valencia</option>
    </select><br><br>

    <!-- Una casilla de verificación con el texto "Deseo recibir información sobre novedades y ofertas".
    Deberá estar activada por defecto -->
    <INPUT TYPE="checkbox" NAME="info" checked>Deseo recibir información sobre novedades y ofertas<br><br>

    <!-- Una casilla de verificación con el texto "Declaro haber leído y aceptar las condiciones generales
    del programa y la normativa sobre protección de datos" -->
    <INPUT TYPE="checkbox" NAME="condiciones">Declaro haber leído y aceptar las condiciones generales
    del programa y la normativa sobre protección de datos<br><br>

    <!-- Un botón de envío -->
    <INPUT TYPE="submit" NAME="enviar" VALUE="Enviar">

</form>
    
</body>
</html>