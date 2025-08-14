<?php

/**
 * @author Izan Garrido
 * Ej6UD8 - Pinguino.php
 */

// Inluyo la clase Ave
include_once "Ave.php";

// Creacion de la clase Pinguino que extiende de la clase Ave
class Pinguino extends Ave {

    // Función para alimentar al pinguino
    public function alimentarse() {
        echo "Pingüino $this->nombre: Estoy comiendo peces<br>";
    }

    // Función para piar, dice que programa en php
    public function pia() {
        echo "Pingüino $this->nombre: Soy un pingüino programando en PHP<br>";
    }

    // Función para programar
    public function programar() {
        echo "Pingüino $this->nombre: Estoy programando en PHP<br>";
    }

}
?>