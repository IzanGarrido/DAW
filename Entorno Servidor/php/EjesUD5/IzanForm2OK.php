<?php

/**
 * @author Izan Garrido Quintana
 */

if (isset($_POST['enviar'])) {
    echo "<h2>Resultados:</h2>";
    echo "<p><i>Nombre:</i> <b> " . ($_POST['nombre']) . "</b></p>";
    echo "<p><i>Apellidos:</i> <b> " . ($_POST['apellidos']) . "</b></p>";
    echo "<p><i>Correo:</i> <b> " . ($_POST['correo']) . "</b></p>";
    echo "<p><i>Usuario:</i> <b> " . ($_POST['usuario']) . "</b></p>";
    echo "<p><i>Contraseña:</i> <b> " . ($_POST['password']) . "</b></p>";
    echo "<p><i>Sexo:</i> <b> " . (isset($_POST['sexo']) ? ($_POST['sexo']) : 'No seleccionado') . "</b></p>";

    echo "<p><i>Provincia:</i> <b> " . ($_POST['provincia']) . "</b></p>";

    echo "<p><i>Situación:</i> <b> ";
    if (isset($_POST['situacion'])) {
        echo (implode(", ", $_POST['situacion']));
    } else {
        echo "No seleccionado";
    }
    echo "</b></p>";

    echo "<p><i>Descripción de la incidencia:</i> <b> " . ($_POST['comentario']) . "</b></p>";
    echo "<p><i>Deseo recibir información:</i> <b> " . (isset($_POST['info']) ? "Ha seleccionado recibir ofertas" : "No ha seleccionado
    recibir ofertas") . "</b></p>";
    echo "<p><i>Condiciones:</i> <b> " . (isset($_POST['condiciones']) ? "Ha aceptado las condiciones" : "No ha aceptado las condiciones") . "</b></p>";
}

?>