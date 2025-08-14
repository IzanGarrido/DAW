<?php

/**
 * @author Izan Garrido Quintana
 */

if (isset($_POST['enviar'])) {
    echo "<h2>Datos Enviados:</h2>";
    echo "<p><i>Nombre:</i> <b> " . strtoupper($_POST['nombre']) . "</b></p>";
    echo "<p><i>Apellidos:</i> <b> " . strtoupper($_POST['apellidos']) . "</b></p>";
    echo "<p><i>Correo:</i> <b> " . strtoupper($_POST['correo']) . "</b></p>";
    echo "<p><i>Usuario:</i> <b> " . strtoupper($_POST['usuario']) . "</b></p>";
    echo "<p><i>Contraseña:</i> <b> " . strtoupper($_POST['password']) . "</b></p>";
    echo "<p><i>Sexo:</i> <b> " . (isset($_POST['sexo']) ? strtoupper($_POST['sexo']) : 'No seleccionado') . "</b></p>";

    echo "<p><i>Horario de contacto:</i> <b> ";
    if (isset($_POST['contacto'])) {
        echo strtoupper(implode(", ", $_POST['contacto']));
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

    echo "<p><i>Descripción de la incidencia:</i> <b> " . strtoupper($_POST['comentario']) . "</b></p>";

    echo "<p><i>Deseo recibir información:</i> <b> " . (isset($_POST['info']) ? "Ha seleccionado recibir ofertas" : "No ha seleccionado
    recibir ofertas") . "</b></p>";
    echo "<p><i>Condiciones:</i> <b> " . (isset($_POST['condiciones']) ? "Ha aceptado las condiciones" : "No ha aceptado las condiciones") . "</b></p>";
}

?>