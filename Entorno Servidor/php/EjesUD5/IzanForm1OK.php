<?php
/**
 * @author Izan Garrido Quintana
 */

if (isset($_GET['enviar'])) {
    echo "<h2>Resultados:</h2>";
    echo "<p><i>Nombre:</i> <b> " . ($_GET['nombre']) . "</b></p>";
    echo "<p><i>Apellidos:</i> <b> " . ($_GET['apellidos']) . "</b></p>";
    echo "<p><i>Sexo:</i> <b> " . (isset($_GET['sexo']) ? ($_GET['sexo']) : 'No seleccionado') . "</b></p>";
    echo "<p><i>Correo:</i> <b> " . ($_GET['correo']) . "</b></p>";
    echo "<p><i>Provincia:</i> <b> " . ($_GET['provincia']) . "</b></p>";
    echo "<p><i>Info:</i> <b> " . (isset($_GET['info']) ? "Ha seleccionado recibir ofertas" : "No ha seleccionado recibir ofertas") . "</b> </p>";
    echo "<p><i>Condiciones:</i> <b> " . (isset($_GET['condiciones']) ? "Ha aceptado las condiciones" : "No ha aceptado las condiciones") . "</b></p>";
 }
 ?>