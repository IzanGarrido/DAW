<?php

/**
 * @author Izan Garrido
 * Ej6UD8 - Gato.php
 */

// Inluyo la clase Mamifero
include_once "Mamifero.php";
class Gato extends Mamifero{
    // Atributo
    private $raza;

    // Constructor de la clase
    public function __construct($sexo = "M", $nombre = "", $raza = ""){
        parent::__construct($sexo, $nombre);
        $this->raza = $raza;
    }

    // Función para obtener la raza
    public function getRaza(){
        return $this->raza;
    }

    // Función para establecer la raza
    public function setRaza($raza){
        $this->raza = $raza;
    }

    // Función para alimentar al gato
    public function alimentarse(){
        echo "Gato {$this->getNombre()}: Estoy comiendo pescado<br>";
    }

    // Función que el gato maulla
    public function maulla(){
        echo "Gato {$this->getNombre()}: Miauuuu<br>";
    }

    // Función para mostrar la descripción del gato
    public function __toString() {
        $descripcion = parent::__toString();
        $descripcion = preg_replace('/<br>\s*$/', '', $descripcion);

        if (strpos($descripcion, "llamado " . $this->getNombre()) !== false) {
            $nombrePattern = "/, llamado " . preg_quote($this->getNombre(), '/') . "/";
            $descripcion = preg_replace($nombrePattern, '', $descripcion);
            return $descripcion . ", raza {$this->getRaza()} y mi nombre es {$this->getNombre()}<br>\n";
        } else {
            return $descripcion . ", raza {$this->getRaza()} y no tengo nombre<br>\n";
        }
    }
}
