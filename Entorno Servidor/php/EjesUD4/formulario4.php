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
    <title>Formulario 4</title>

    <style>

    </style>

</head>
<body>

<h1>Izan Garrido - Formulario de registro 4</h1>

<form action="/formulario4.php" method="get">

    <fieldset>
        <legend>Datos Personales</legend>

        <!-- El nombre, con un control de tipo texto. Tamaño máximo 50 caracteres -->
        <label for="nombre" >Nombre: </label>
        <input type="text" name="nombre" maxlength="50" placeholder="Escriba su Nombre"><br><br>

        <!-- Los apellidos, con un control de tipo texto. Tamaño máximo 200 caracteres -->
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" maxlength="200" placeholder="Escriba sus Apellidos"><br><br>

        <!-- El correo electrónico, con un control de tipo texto. Tamaño máximo 250 caracteres -->
        <label for="correo">Correo: </label>
        <input type="text" name="correo" maxlength="250" placeholder="usuario@empresa.com"><br><br>

        <!-- El usuario, con un control de tipo texto. Tamaño máximo 5 caracteres -->
        <label for="usuario">Nombre de usuario: </label>
        <input type="text" name="usuario" maxlength="5" placeholder="Escriba su nombre de usuario"><br><br>

        <!-- El password, con un control adecuado al contenido. Tamaño máximo 15 caracteres -->
        <label for="password">Password: </label>
        <input type="password" name="password" maxlength="15" placeholder="Escriba su password"><br><br>

        <!-- El sexo, con dos opciones excluyentes: hombre o mujer -->
        <label for="sexo">Sexo: </label>
        <input type="radio" name="sexo" VALUE="hombre" checked>hombre
        <input type="radio" name="sexo" VALUE="mujer">mujer<br><br>

    </fieldset><br>

    <fieldset>
        <legend>Datos de contacto</legend>

        <!-- Provincia: un desplegable con los valores Alicante, Castellón y Valencia y sólo se podrá seleccionar uno de ellos -->
        <label for="provincia">Provincia: </label>
        <select name="provincia">
            <option value="alicante">Alicante</option>
            <option value="castellon">Castellon</option>
            <option value="valencia">Valencia</option>
        </select><br><br>

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

    </fieldset><br>

    <fieldset>
        <legend>Datos de la incidencia</legend>

        <!-- Un desplegable Tipo de incidencia con los valores Teléfono fijo, Teléfono móvil, Internet y 
        Televisión de los cuales sólo se podrá elegir un único valor -->
        <label for="tipo">Tipo: </label>
        <select name="tipo">
            <option value="fijo">Teléfono fijo</option>
            <option value="movil">Teléfono móvil</option>
            <option value="internet">Internet</option>
            <option value="television">Televisión</option>
        </select><br><br>

        <!-- Descripción de la incidencia: Deberá mostrar un área de texto para que el usuario pueda escribir lo que desee. Su tamaño será de 4x40 -->
        <label for="descripcion">Descripción de la incidencia: </label>
        <textarea COLS="40" ROWS="4" NAME="descripcion" placeholder="Describa la incidencia..."></textarea><br><br>

    </fieldset><br>

    <fieldset>

        <!-- Un botón de envío y otro de reset para limpiar el formulario. -->
        <INPUT TYPE="reset" NAME="limpiar" VALUE="Limpiar">
        <INPUT TYPE="submit" NAME="enviar" VALUE="Enviar">
        
    </fieldset><br>

</form>
    
</body>
</html>

<?php 

echo("Nombre: " . $_GET["nombre"] . "\n<br>");
echo("Apellidos: " . $_GET["apellidos"] . "\n<br>");
echo("Correo: " . $_GET["correo"] . "\n<br>");
echo("Usuario: " . $_GET["usuario"] . "\n<br>");
echo("Contraseña: " . $_GET["password"] . "\n<br>");
echo("Sexo: " . $_GET["sexo"] . "\n<br>");
echo("Provincia: " . $_GET["provincia"] . "\n<br>");
echo("Contacto: " . implode(", ", $_GET["contacto"]) . "\n<br>");
echo("Conocer: " . implode(", ", $_GET["conocer"]) . "\n<br>");
echo("tipo: " . $_GET["tipo"] . "\n<br>");
echo("Descripcion: " . $_GET["descripcion"] . "\n<br>");

?>