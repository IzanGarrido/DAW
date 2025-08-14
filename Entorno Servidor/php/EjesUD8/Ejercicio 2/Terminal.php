<?php

class Terminal {
    protected $numero;
    protected $tiempoConversacion;

    public function __construct($numero) {
        $this->numero = $numero;
        $this->tiempoConversacion = 0;
    }

    public function llama($terminal, $segundosDeLlamada) {
        $this->tiempoConversacion += $segundosDeLlamada;
        $terminal->tiempoConversacion += $segundosDeLlamada;
    }

    public function __toString() {
        $minutos = intdiv($this->tiempoConversacion, 60);
        $segundos = $this->tiempoConversacion % 60;
        return "Nº $this->numero - $minutos m y $segundos s de conversación en total";
    }
}