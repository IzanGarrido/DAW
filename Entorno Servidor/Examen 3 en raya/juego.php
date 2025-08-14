<?php

// Funcion para iniciar el tablero en blanco
function inicializarTablero() {
    $tablero = array(
        array(" ", " ", " "),
        array(" ", " ", " "),
        array(" ", " ", " ")
    );

}

// Funcion para imprimir el tablero en pantalla 
function imprimirTablero() {
    global $tablero;
    for ($i=0; $i < count($tablero); $i++) { 
        for ($j=0; $j < count($tablero[$i]); $j++) { 
            echo $tablero[$i][$j];
            if ($j < count($tablero[$i]) - 1) {
                echo " | ";
            }
        }
        echo "\n";
        if ($i < count($tablero) - 1) {
            echo "---|---|---\n";
        }
    }
    

}

function verificarGanador() {

    

}

function tableroLleno() {

    

}

// Funcion para iniciar una partida
function iniciarPartida() {
    global $jugadores;
    inicializarTablero();
    
    // Bucle para las jugadas de ambos jugadores
    while (!verificarGanador() && !tableroLleno()) {
        imprimirTablero(); // Imprimir tablero cada vez que se hace una jugada
        $jugador1 = array( // Jugador 1
            "fila" => readline($jugadores["jugador1"]["nombre"] . "(" . $jugadores["jugador1"]["simbolo"] .  ")" . ", indica la fila (0-2) o escribe 's' para abandonar la partida: "),
            "columna" => readline($jugadores["jugador1"]["nombre"] . "(" . $jugadores["jugador1"]["simbolo"] .  ")" . ", indica la columna (0-2) o escribe 's' para abandonar la partida")
        );

        $jugador2 = array( // Jugador 2
            "fila" => readline($jugadores["jugador2"]["nombre"] . "(" . $jugadores["jugador2"]["simbolo"] .  ")" . ", indica la fila (0-2) o escribe 's' para abandonar la partida: "),
            "columna" => readline($jugadores["jugador2"]["nombre"] . "(" . $jugadores["jugador2"]["simbolo"] .  ")" . ", indica la columna (0-2) o escribe 's' para abandonar la partida")
        );
    }
}
// array de jugadores asociativos
$jugadores = array(
    "jugador1" => array(
        "nombre" => readline("Ingrese el nombre del jugador 1: "),
        "simbolo" => readline("Ingrese el simbolo del jugador 1: "),
        "Victorias" => 0,
        "Derrotas" => 0,
        "Copas" => 0
    ),
    "jugador2" => array(
        "nombre" => readline("Ingrese el nombre del jugador 2: "),
        "simbolo" => readline("Ingrese el simbolo del jugador 2: "),
        "Victorias" => 0,
        "Derrotas" => 0,
        "Copas" => 0
    )
);

// Bucle para los torneos 
do {

    printf("%s Iniciando un nuevo torneo de 3 partidas %s\n" ,str_repeat("-",3));
    // Bucle para las partidas
    for ($i=0; $i < 3; $i++) { 
        iniciarPartida();
    }
    $torneo = readline("Desean jugar otro torneo? (s para iniciar otro, cualquier otra tecla para no continuar): ");
    
} while ($torneo == "s"); // Sale cuando pongas unas 's'

?>