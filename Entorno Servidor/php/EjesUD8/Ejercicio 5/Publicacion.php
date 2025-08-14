<?php
abstract class Publicacion {
    protected string $isbn;
    protected string $titulo;
    protected int $anyo;

    public function __construct(string $isbn, string $titulo, int $anyo = 2024) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anyo = $anyo;
    }

    abstract public function __toString(): string;
}
?>
