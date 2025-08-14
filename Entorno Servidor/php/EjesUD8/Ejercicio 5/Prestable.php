<?php
interface Prestable {
    public function estaPrestado(): bool;
    public function presta(): void;
    public function devuelve(): void;
}
?>