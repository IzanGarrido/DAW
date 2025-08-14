<?php 

/**
 * @author Izan Garrido
 */

class Persona {
    private $nombre;
    private $DNI;
    private $edad;
    private $sexo ;
    private $peso;
    private $altura;

    const INFRAPESO = -1;
    const PESO_IDEAL = 0;
    const SOBREPESO = 1;

    public function __construct($nombre = "", $edad = 0, $sexo = "H", $peso = 0, $altura = 0) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public static function consNomEdSex($nombre, $edad, $sexo) {
        return new self($nombre, $edad, $sexo);
    }


    public static function consFull($nombre, $edad, $sexo, $peso, $altura) {
        return new self($nombre, $edad, $sexo, $peso, $altura);
    }

    public function comprobarSexo($sexo) {
        if ($sexo != "H" || $sexo != "M") {
            $this->sexo = "H";
        }
       
    }


    public function strIMC() {
        $peso = $this->calcularIMC();

        if ($peso == -1) {
            $str = "Está por debajo de su peso";
        } else if ($peso == 0) {
            $str = "Está en su peso ideal";
        } else {
            $str = "tiene sobrepeso";
        }

        return $this->nombre . " " . $str;
       
    }

    public function  MostrarIMC() {
        $str = $this->strIMC();
        echo $str;
    }

    public function calcularIMC() {
        $imc = $this->peso / ($this->altura * $this->altura);
        echo $imc;

        if ($imc < 20) {
            return self::INFRAPESO;
        } elseif ($imc >= 20 && $imc <= 25) {
            return self::PESO_IDEAL;
        } else {
            return self::SOBREPESO;
        }

    }

    public function esMayorDeEdad() {
        if ($this->edad >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function __toString(){
        return $this->nombre . " " . $this->edad . " " . $this->sexo . " " . $this->peso . " " . $this->altura;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEdad($edad) {        
        $this->edad = $edad;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
        
    }

    public function setPeso($peso) {        
        $this->peso = $peso;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

}

?>