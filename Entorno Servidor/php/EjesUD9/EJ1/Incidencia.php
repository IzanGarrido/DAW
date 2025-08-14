<?php

/**
 * Clase Incidencia que gestiona el CRUD de incidencias en la BD.
 * 
 * @author Izan Garrido Quintana
 */
include_once "../traitDB.php";

class Incidencia {
    use traitDB;

    private $codigo;
    private $problema;
    private $estado;
    private $Resolucion;

    /**
     * Constructor de la clase Incidencia.
     */
    public function __construct($codigo, $problema, $estado = "Pendiente", $Resolucion = "") {
        $this->codigo = $codigo;
        $this->problema = $problema;
        $this->estado = $estado;
        $this->Resolucion = $Resolucion;
    }

    /** Getters y Setters */
    public function getCodigo() {
        return $this->codigo;
    }
    
    public function getproblema() {
        return $this->problema;
    }
    
    public function setproblema($problema) {
        $this->problema = $problema;
    }
    
    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function getResolucion() {
        return $this->Resolucion;
    }
    
    public function setResolucion($Resolucion) {
        $this->Resolucion = $Resolucion;
    }

    /**
     * Crea una nueva incidencia en la base de datos.
     */
    public static function creaIncidencia($codigo, $problema) {
        $sql = "INSERT INTO INCIDENCIA (codigo, problema, estado, Resolucion) VALUES (?, ?, 'Pendiente', '')";
        self::queryPreparadaDB($sql, [$codigo, $problema]);
        return new self($codigo, $problema);
    }

    /**
     * Marca una incidencia como resuelta con una solución.
     */
    public function resuelve($Resolucion) {
        $sql = "UPDATE INCIDENCIA SET estado = 'Resuelta', Resolucion = ? WHERE codigo = ?";
        self::queryPreparadaDB($sql, [$Resolucion, $this->codigo]);
        $this->setEstado("Resuelta");
        $this->setResolucion($Resolucion);
    }

    /**
     * Obtiene el número de incidencias pendientes.
     */
    public static function getPendientes() {
        $sql = "SELECT COUNT(*) as total FROM INCIDENCIA WHERE estado = 'Pendiente'";
        $resultado = self::queryPreparadaDB($sql, []);
        return $resultado[0]['total'];
    }

    /**
     * Lee una incidencia específica.
     */
    public static function leeIncidencia($codigo) {
        $sql = "SELECT * FROM INCIDENCIA WHERE codigo = ?";
        $resultado = self::queryPreparadaDB($sql, [$codigo]);
        return $resultado[0];
    }

    /**
     * Lista todas las incidencias.
     */
    public static function leeTodasIncidencias() {
        $sql = "SELECT * FROM INCIDENCIA";
        return self::queryPreparadaDB($sql, []);
    }

    /**
     * Actualiza la información de una incidencia.
     */
    public function actualizaIncidencia($problema, $Resolucion) {
        $sql = "UPDATE INCIDENCIA SET problema = ?, Resolucion = ? WHERE codigo = ?";
        self::queryPreparadaDB($sql, [$problema, $Resolucion, $this->codigo]);
        $this->setproblema($problema);
        $this->setResolucion($Resolucion);
    }

    /**
     * Elimina una incidencia de la base de datos.
     */
    public function borraIncidencia() {
        $sql = "DELETE FROM INCIDENCIA WHERE codigo = ?";
        self::queryPreparadaDB($sql, [$this->codigo]);
    }

    /**
     * Devuelve la incidencia en formato de texto.
     */
    public function __toString() {
        return "Incidencia " . $this->getCodigo() . ": " . $this->getproblema() . " (" . $this->getEstado() . ") - Solución: " . $this->getResolucion() . "\n";
    }
}