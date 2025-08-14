<?php

/**
 * @author Izan Garrido
 * Ej6UD8 - Canario.php
 */

// Inluyo la clase Ave
include_once "Ave.php";

// Creacion de la clase Canario que extiende de la clase Ave
class Canario extends Ave {

    // Función para alimentar al canario
    public function alimentarse() {
        echo "Canario $this->nombre: Estoy comiendo alpiste<br>";
    }

    // Función que hace piar al canario
    public function pia() {
        echo "Canario $this->nombre: Pio pio pio<br>";
    }

}

?>