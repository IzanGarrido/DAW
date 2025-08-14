<?php

/**
 * @author Izan Garrido
 * Ej6UD8 - Mamifero.php
 */

// Inluyo la clase Animal
include_once "Animal.php";

// Creacion de la clase abstracta Mamifero que extiende de la clase animal
abstract class Mamifero extends Animal {
    
    // Contador estático
    protected static $totalMamiferos = 0;
    
    // Constructor de la clase, el sexo por defecto es macho
    public function __construct($sexo = "M", $nombre = "") {
        parent::__construct($sexo, $nombre);
        self::$totalMamiferos++;
    }
    
    // Devolver el total de mamiferos
    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br>";
    }
    
    // Si es Hembra amamanta a sus crías
    public function amamantar() {
        echo get_class($this) . " " . ($this->nombre ?? "") . ": " . ($this->sexo == "H" ? "Amamantando a mis crías" : "Soy macho, no puedo amamantar") . "<br>";
    }

    // Mata al animal
    public function morirse() {
        parent::morirse();
        self::$totalMamiferos--;
    }

}

?>