<?php

include_once 'Publicacion.php';
include_once 'Prestable.php';
class Libro extends Publicacion implements Prestable {
    private bool $prestado = false;

    public function __toString(): string {
        $estado = $this->prestado ? "prestado" : "no prestado";
        return "ISBN: $this->isbn, título: $this->titulo, año de publicación: $this->anyo ($estado)<br>\n";
    }

    public function estaPrestado(): bool {
        return $this->prestado;
    }

    public function presta(): void {
        if ($this->prestado) {
            echo "El libro '$this->titulo' ya está prestado.<br>\n";
        } else {
            $this->prestado = true;
            echo "Se ha prestado el libro '$this->titulo'.<br>\n";
        }
    }

    public function devuelve(): void {
        if (!$this->prestado) {
            echo "El libro '$this->titulo' no estaba prestado.<br>\n";
        } else {
            $this->prestado = false;
            echo "Se ha devuelto el libro '$this->titulo'.<br>\n";
        }
    }

    public function mostrarPrestado(): void {
        echo "El libro '$this->titulo' " . ($this->prestado ? "está prestado" : "no está prestado") . "<br>\n";
    }
}
?>
