<?php

/**
 * @author Izan Garrido
 * Ej6UD8 - Lagarto.php
 */

// Inluyo la clase Animal
include_once "Animal.php";

// Creacion de la clase Lagarto que extiende de la clase Animal
class Lagarto extends Animal {

    // Función para alimentar al lagarto
    public function alimentarse() {
        echo "Lagarto $this->nombre: Estoy comiendo insectos<br>";
    }

    // Función que hace tomar el sol al lagarto
    public function tomarSol() {
        echo "Lagarto $this->nombre: Estoy tomando el sol<br>";
    }

}

?>