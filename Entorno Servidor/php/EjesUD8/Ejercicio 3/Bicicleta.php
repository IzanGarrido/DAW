<?php 

/**
 * @author Izan Garrido
 */

include_once "Vehiculo.php";

class Bicicleta extends Vehiculo {

    public function __construct() {
        parent::__construct();
    }

    public function hacerCaballito() {

    }

    public function ponerCadena() {

    }

    public function verKMRecorridos() {
        return $this->kilometrosRecorridos;
    }

}

?>