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
    <title>Formulario 3</title>
</head>
<body>

<h1>Izan Garrido - Formulario de registro 3</h1>

<form action="/formulario3.php" method="get">

    <!-- El nombre, con un control de tipo texto. Tamaño máximo 50 caracteres -->
    <label for="nombre" >Nombre: </label>
    <input type="text" name="nombre" maxlength="50"><br><br>

    <!-- Los apellidos, con un control de tipo texto. Tamaño máximo 200 caracteres -->
    <label for="apellidos">Apellidos: </label>
    <input type="text" name="apellidos" maxlength="200"><br><br>

    <!-- El correo electrónico, con un control de tipo texto. Tamaño máximo 250 caracteres -->
    <label for="correo">Correo: </label>
    <input type="text" name="correo" maxlength="250"><br><br>

    <!-- El usuario, con un control de tipo texto. Tamaño máximo 5 caracteres -->
    <label for="usuario">Nombre de usuario: </label>
    <input type="text" name="usuario" maxlength="5"><br><br>

    <!-- El password, con un control adecuado al contenido. Tamaño máximo 15 caracteres -->
    <label for="password">Password: </label>
    <input type="password" name="password" maxlength="15"><br><br>

    <!-- El sexo, con dos opciones excluyentes: hombre o mujer -->
    <label for="sexo">Sexo: </label>
    <input type="radio" name="sexo" VALUE="hombre">hombre
    <input type="radio" name="sexo" VALUE="mujer">mujer<br><br>

    <!-- Horario de contacto: un desplegable con los valores De 8 a 14 horas, De 14 a 18 horas
    y De 18 a 21 horas de modo que se podrá seleccionar uno o varios de ellos. Deberá mostrar 2 elementos cada vez. -->
    <label for="contacto">Horario de contacto:</label>
    <select multiple size="3" name="contacto[]">
        <option value="mañana">De 8 a 14 horas</option>
        <option value="tarde">De 14 a 18 horas</option>
        <option value="noche">De 18 a 21 horas</option>
    </select><br><br>

    <!-- ¿Cómo nos ha conocido? con checkbox para Un amigo, Web, Prensa y Otros -->
     <label for="conocer">¿Cómo nos ha conocido?</label><br><br>
    <INPUT TYPE="checkbox" NAME="conocer[]" VALUE="amigo" >Un amigo
    <INPUT TYPE="checkbox" NAME="conocer[]" VALUE="web">Web
    <INPUT TYPE="checkbox" NAME="conocer[]" VALUE="prensa">Prensa
    <INPUT TYPE="checkbox" NAME="conocer[]" VALUE="otros">Otros<br><br>

    <!-- Comentario: Deberá mostrar un área de texto para que el usuario pueda escribir lo que desee. Su
    tamaño será de 6x60 -->
    <label for="comentario">Comentario: </label>
    <textarea COLS="60" ROWS="6" NAME="comentario"></textarea><br><br>

    <!-- Una casilla de verificación con el texto "Deseo recibir información sobre novedades y ofertas".
    Deberá estar activada por defecto -->
    <INPUT TYPE="checkbox" NAME="info" checked>Deseo recibir información sobre novedades y ofertas<br><br>

    <!-- Una casilla de verificación con el texto "Declaro haber leído y aceptar las condiciones generales
    del programa y la normativa sobre protección de datos" -->
    <INPUT TYPE="checkbox" NAME="condiciones">Declaro haber leído y aceptar las condiciones generales
    del programa y la normativa sobre protección de datos<br><br>

    <!-- Un botón de envío y otro de reset para limpiar el formulario. -->
    <INPUT TYPE="reset" NAME="limpiar" VALUE="Limpiar">
    <INPUT TYPE="submit" NAME="enviar" VALUE="Enviar">

</form>
    
</body>
</html>