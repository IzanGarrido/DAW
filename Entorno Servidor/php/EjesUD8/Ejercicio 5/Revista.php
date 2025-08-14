<?php

include_once 'Publicacion.php';
class Revista extends Publicacion {
    private int $numero;

    public function __construct(string $isbn, string $titulo, int $anio, int $numero) {
        parent::__construct($isbn, $titulo, $anio);
        $this->numero = $numero;
    }

    public function __toString(): string {
        return "ISBN: $this->isbn, título: $this->titulo, año de publicación: $this->anyo, número: $this->numero<br>\n";
    }
}
?>
