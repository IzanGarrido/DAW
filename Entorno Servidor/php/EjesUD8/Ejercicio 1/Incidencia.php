<?php

/**
 * @author Izan Garrido
 */

/*
1. Una empresa quiere implementar un programa que lleve el control de las incidencias que se
producen en sus ordenadores. Cada incidencia tiene un código: 1, 2, 3, 4, etc. Cuando se crea
una nueva incidencia, se le asigna un código de forma automática y se pone el estado como
“pendiente”. Al crear una incidencia hay que indicar también el número de puesto (un número
entero). Cuando se resuelve una incidencia, hay que proporcionar información sobre cómo se ha
resuelto o qué es lo que fallaba, además, el estado pasa a “resuelta”. El siguiente trozo de
código que va dentro del main genera la salida que se muestra a continuación (El código <br>
se añade para salto de línea en depuración):
*/

class Incidencia {

    private static $cont = 0;

    private $codigo;

    private $descripcion;

    private $resuelta;

    public $solucionado;

    private static $pendientes = 0;

    public function __construct($codigo, $descripcion) {
        $this->codigo = $codigo;

        $this->descripcion = $descripcion;

        $this->resuelta = false;

        self::$pendientes++;

    }

    public function resuelve($solucion) {
        
        $this->resuelta = true;

        self::$pendientes--;
         
        $this->solucionado = $solucion;

    }

    public static function getPendientes() {

        return self::$pendientes;

    }

    public function __toString() {
        /*Incidencia 1 - Puesto: 105 - No tiene acceso a internet - Pendiente<br> */
        self::$cont++;// no va el return de abajo
        
        return "Incidencia " . self::$cont . " - Puesto: $this->codigo - $this->descripcion - " . ($this->resuelta ? "Resuelta" : "Pendiente") . ($this->resuelta ? " - " . $this->solucionado : "") . "<br>\n";

    }

}