<?php

/**
 * @author Izan Garrido
 * Ej6UD8 - Ave.php
 */

// Inluyo la clase Animal
include_once "Animal.php";

 // Creacion de la clase abstracta Ave que extiende de la clase animal
abstract class Ave extends Animal {

    // Contador estático
    protected static $totalAves = 0;

    // Constructor de la clase, el sexo por defecto es macho, utiliza el constructor de la clase padre
    public function __construct($sexo = "M", $nombre = "") {
        parent::__construct($sexo, $nombre);
        self::$totalAves++;
    }

    // Devolver el total de aves
    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br>";
    }

    // Si es Hembra pone un huevo
    public function ponerHuevo() {
        echo get_class($this) . " " . ($this->nombre ?? "") . ": " . ($this->sexo == "H" ? "He puesto un huevo!" : "Soy macho, no puedo poner huevos") . "<br>";
    }

    // Mata al animal
    public function morirse() {
        parent::morirse();
        self::$totalAves--;
    }
}

?>