<?php

/**
 * @author Izan Garrido
 * Ej6UD8 - Perro.php
 */

// Inluyo la clase Mamifero
include_once "Mamifero.php";
class Perro extends Mamifero {
    // Atributo 
    private $raza;

    // Constructor de la clase raza por defecto es teckel
    public function __construct($sexo = "M", $nombre = "", $raza = "teckel"){
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

    // Función para alimentar al perro
    public function alimentarse(){
        echo "Perro {$this->getNombre()}: Estoy comiendo carne<br>";
    }

    // Función que el perro ladre
    public function ladra(){
        echo "Perro {$this->getNombre()}: Guau guau<br>";
    }

    // Función para mostrar la descripción del perro
    public function __toString()
    {
        // Llamamos al método padre para obtener la descripción base
        $descripcion = parent::__toString();
        $descripcion = preg_replace('/<br>\s*$/', '', $descripcion);

        if (strpos($descripcion, "llamado " . $this->getNombre()) !== false) {
            $nombrePattern = "/, llamado " . preg_quote($this->getNombre(), '/') . "/";
            $descripcion = preg_replace($nombrePattern, '', $descripcion);
            // Retornamos la descripción con la raza y el nombre correctamente formateados
            return $descripcion . ", raza {$this->getRaza()} y mi nombre es {$this->getNombre()}<br>\n";
        } else {
            return $descripcion . ", raza {$this->getRaza()} y no tengo nombre<br>\n";
        }
    }
}
