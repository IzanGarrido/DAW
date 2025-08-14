<?php 

/**
 * @author Izan Garrido
 */

class Vehiculo{

    private static $vehiculosCreados;
    private static $kilometrosTotales;
    protected $kilometrosRecorridos;

    public function __construct(){
        self::$vehiculosCreados++;
        self::$kilometrosTotales += $this->kilometrosRecorridos;
    }

    public function avanza($km){
        $this->kilometrosRecorridos += $km;
        self::$kilometrosTotales += $km;
    }

    public function verKMRecorridos(){
        return $this->kilometrosRecorridos;
    }

    public static function verKMTotales(){
        return self::$kilometrosTotales;
    }

    public static function verVehiculosCreados(){
        return self::$vehiculosCreados;
    }

}

?>