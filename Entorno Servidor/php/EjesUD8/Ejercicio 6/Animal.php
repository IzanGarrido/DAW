<?php 

/**
 * @author Izan Garrido
 * Ej6UD8 - Animal.php
 */


// Creacion de la clase abstacta Animal 
abstract class Animal {
    
    // Atributos de instancia
    protected $sexo;
    protected $nombre;

    // Atributo estático
    protected static $totalAnimales = 0;

    // Constructor de la clase, el sexo por defecto es macho
    public function __construct($sexo = "M", $nombre = "") {
        $this->sexo = ($sexo === "H" || $sexo === "M") ? $sexo : "M";
        $this->nombre = $nombre;
        self::$totalAnimales++;
    }

    

    // Constructor para crear un animal con sexo
   public static function consSexo($sexo) {
       return new static($sexo);
   }

    // Constructor para crear un animal con sexo y nombre, la raza se usa para el perro y el gato
    public static function consFull($sexo, $nombre,$raza=null) {
        return new static($sexo, $nombre,$raza);
    }


   // Constructor para crear un animal con sexo y nombre
   public static function consSexoNombre($sexo, $nombre) {
    return new static($sexo, $nombre);
    }

    // Devuelve la descripció del animal
    protected function getAnimalDescripcion() {
        $sexoStr = ($this->sexo === "H") ? "HEMBRA" : "MACHO";
        return get_called_class() . " " . ($this->nombre ?: "");
    }

    // Devolver el total de animales
    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br>";
    }
    
    // Duerme al animal
    public function dormirse() {
        echo "{$this->getAnimalDescripcion()}: Zzzzzzz<br>";
    }
    
    // Alimenta al animal
    abstract public function alimentarse();
    
    // Mata al animal
    public function morirse() {
        self::$totalAnimales--;
        echo "{$this->getAnimalDescripcion()}: Adiós!<br>";
    }
    
    // Establece un nombre al animal
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Devuelve el nombre del animal
    public function getNombre() {
        return $this->nombre;
    }

    // Devuelve el sexo del animal
    public function getSexo() {
        return $this->sexo;
    }

    // Establece el sexo del animal
    public function setSexo($sexo) {
        $this->sexo = ($sexo === "H" || $sexo === "M") ? $sexo : "M";
    }

    // Función tostring
    public function __toString() {
        $sexoStr = ($this->sexo === "H") ? "HEMBRA" : "MACHO";
        
        // Determina si el animal es un Ave o un Mamífero.
        $categoria = $this instanceof Ave ? "un Ave" : ($this instanceof Mamifero ? "un Mamífero" : "");
        
        return "Soy un Animal" . ($categoria ? ", $categoria" : "") . ", en concreto un " . get_called_class() . ", con sexo $sexoStr" .
               ($this->nombre ? ", llamado $this->nombre" : "") . "<br>";
    }

}

?>