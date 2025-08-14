<?php 

/**
 * @author Izan Garrido
 */

include_once "Vehiculo.php";
class Coche extends Vehiculo {

    public function __construct() {
        parent::__construct();
    }

    public function llenarDeposito() {
        
    }

    public function quemaRueda() {
        
    }

    public function verKMRecorridos(){
        return $this->kilometrosRecorridos;
    }

}

?>