<?php

/**
 * @author Izan Garrido
 */

/*
2. Implementa la clase Movil como subclase de Terminal (con atributos número y tiempo de
conversación y el método llama($terminal,$segundosDeLlamada) donde se pasa el terminal al
que se llama y se actualiza el tiempo de conversación para el terminal que llama y el llamado).
Cada móvil lleva asociada una tarifa que puede ser “rata”, “mono” o “bisonte”. El coste por
minuto es de 6, 12 y 30 céntimos respectivamente. Se tarifican los segundos exactos.
Obviamente, cuando un móvil llama a otro, se le cobra al que llama, no al que recibe la llamada.
A continuación, se proporciona el contenido del main y el resultado que debe aparecer por
pantalla.
*/

include "Terminal.php";

class Movil extends Terminal {
    private $tarifa;
    private $costePorMinuto;
    private $tiempoTarificado;
    private $costeTotal;

    public function __construct($numero, $tarifa) {
        parent::__construct($numero);
        $this->tarifa = $tarifa;
        $this->tiempoTarificado = 0;
        $this->costeTotal = 0;

        switch ($tarifa) {
            case "rata":
                $this->costePorMinuto = 0.06;
                break;
            case "mono":
                $this->costePorMinuto = 0.12;
                break;
            case "bisonte":
                $this->costePorMinuto = 0.30;
                break;
            default:
                $this->costePorMinuto = 0;
        }
    }

    public function llama($terminal, $segundosDeLlamada) {
        parent::llama($terminal, $segundosDeLlamada);
        $this->tiempoTarificado += $segundosDeLlamada;
        $this->costeTotal += ($segundosDeLlamada / 60) * $this->costePorMinuto;
    }

    public function __toString() {
        $minutosTotal = intdiv($this->tiempoConversacion, 60);
        $segundosTotal = $this->tiempoConversacion % 60;

        $minutosTarificados = intdiv($this->tiempoTarificado, 60);
        $segundosTarificados = $this->tiempoTarificado % 60;

        $costeFormateado = number_format($this->costeTotal, 2);

        return "Nº $this->numero - $minutosTotal m y $segundosTotal s de conversación en total - tarificados $minutosTarificados m y $segundosTarificados s por un importe de $costeFormateado euros";
    }
}

?>