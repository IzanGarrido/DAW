<?php

/**
 * @author Izan Garrido Quintana
 */

    if (isset($_POST['enviar'])) {
        echo "<h2>Resultados:</h2>";
        echo "<p><i>Nombre:</i> <b> " . ($_POST['nombre']) . "</b></p>";
        echo "<p><i>Apellidos:</i> <b> " . ($_POST['apellidos']) . "</b></p>";
        echo "<p><i>Correo electrónico:</i> <b> " . ($_POST['correo']) . "</b></p>";
        echo "<p><i>Usuario:</i> <b> " . ($_POST['usuario']) . "</b></p>";
        echo "<p><i>Contraseña:</i> <b> " . ($_POST['password']) . "</b></p>";
        echo "<p><i>Sexo:</i> <b> " . (isset($_POST['sexo']) ? ($_POST['sexo']) : 'No seleccionado') . "</b></p>";

        echo "<p><i>Provincia:</i> <b> " . ($_POST['provincia']) . "</b></p>";

        echo "<p><i>Horario de contacto:</i> <b> ";
        if (isset($_POST['contacto'])) {
            echo (implode(", ", $_POST['contacto']));
        } else {
            echo "No seleccionado";
        }
        echo "</b></p>";

        echo "<p><i>Cómo nos has conocido:</i> <b> ";
        if (isset($_POST['conocer'])) {
            echo strtoupper(implode(", ", $_POST['conocer']));
        } else {
            echo "No seleccionado";
        }
        echo "</b></p>";

        echo "<p><i>Tipo de incidencia:</i> <b> " . ($_POST['tipo']) . "</b></p>";
        echo "<p><i>Descripción de la incidencia:</i> <b> " . ($_POST['descripcion']) . "</b></p>";

    }

?>