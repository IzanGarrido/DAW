<?php

// Funcion para iniciar el tablero en blanco
function inicializarTablero() {
    $GLOBALS['tablero'] = array(
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
            printf("%2s",$tablero[$i][$j]);
            if ($j < count($tablero[$i]) - 1) {
                echo " |";
            }
        }
        echo "\n";
        if ($i < count($tablero) - 1) {
            echo "---|---|---\n";
        }
    }

}

function verificarGanador() {
    
    global $tablero;

    for ($i=0; $i < count($tablero); $i++) { 
        for ($j=0; $j < count($tablero[$i]); $j++) { 
            if ($tablero[$i][$j] == " ") {
            } else  {
               
            }
            if ($j < count($tablero[$i]) - 1) {
            }
        }
        if ($i < count($tablero) - 1) {
        }
    }

    return false;
}


// Función para comprobar si el tablero esta lleno
function tableroLleno() {
    global $tablero;

    $lleno = false;
    for ($i=0; $i < count($tablero); $i++) { 
        for ($j=0; $j < count($tablero[$i]); $j++) { 
            if ($tablero[$i][$j] != " ") {
                $lleno = true;
            }
            if ($j < count($tablero[$i]) - 1) {
            }
        }
        if ($i < count($tablero) - 1) {
        }
    }
    return $lleno;

}

// Funcion para iniciar una partida
function iniciarPartida() {
    global $jugadores;
    inicializarTablero();
    
    // Bucle para las jugadas de ambos jugadores
    while (!verificarGanador() && !tableroLleno()) {
        imprimirTablero(); // Imprimir tablero cada vez que se hace una jugada
        
            // Pido las posiciones
            $jugador1 = array( // Jugador 1
                "fila" => readline($jugadores["jugador1"]["nombre"] . " (" . $jugadores["jugador1"]["simbolo"] .  ")" . ", indica la fila (0-2) o escribe 's' para abandonar la partida: "),
                "columna" => readline($jugadores["jugador1"]["nombre"] . " (" . $jugadores["jugador1"]["simbolo"] .  ")" . ", indica la columna (0-2) o escribe 's' para abandonar la partida: ")
            );

            $jugador2 = array( // Jugador 2
                "fila" => readline($jugadores["jugador2"]["nombre"] . "(" . $jugadores["jugador2"]["simbolo"] .  ")" . ", indica la fila (0-2) o escribe 's' para abandonar la partida: "),
                "columna" => readline($jugadores["jugador2"]["nombre"] . "(" . $jugadores["jugador2"]["simbolo"] .  ")" . ", indica la columna (0-2) o escribe 's' para abandonar la partida: ")
            );
            // Compruebo si algun jugador abandona la partida
            if ($jugador1["fila"] == "s" || $jugador1["columna"] == "s") {
                $jugadores["jugador2"]["Victorias"]++;
                $jugadores["jugador1"]["Derrotas"]++;
                return "";
            } else if($jugador2["fila"] == "s" || $jugador2["columna"] == "s") {
                $jugadores["jugador1"]["Victorias"]++;
                $jugadores["jugador2"]["Derrotas"]++;
                return "";
            }
        // Pongo las fichas
        // jugador 1
        global $tablero;
        $tablero[$jugador1["fila"]][$jugador1["columna"]] = $jugadores["jugador1"]["simbolo"];
        $tablero[$jugador2["fila"]][$jugador2["columna"]] = $jugadores["jugador2"]["simbolo"];
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

    printf("%s Iniciando un nuevo torneo de 3 partidas %s\n" ,str_repeat("-",3), str_repeat("-",3));
    
    // Bucle para las partidas
    for ($i=0; $i < 3; $i++) { 
        iniciarPartida();
    }

    //Mostrar estadisticas
    printf("%s Estadísticas del torneo %s\n" ,str_repeat("-",3), str_repeat("-",3));

    //Estadísitcas jugador 1
    echo $jugadores["jugador1"]["nombre"] . " (" . 
         $jugadores["jugador1"]["simbolo"] . ") Victorias: " . 
         $jugadores["jugador1"]["Victorias"] . ", Derrotas: " . 
         $jugadores["jugador1"]["Derrotas"] .", Copas: ". 
         $jugadores["jugador1"]["Copas"] . "\n";

    // Estadísticas jugador 2
    echo $jugadores["jugador2"]["nombre"] . " (" . 
    $jugadores["jugador2"]["simbolo"] . ") Victorias: " . 
    $jugadores["jugador2"]["Victorias"] . ", Derrotas: " . 
    $jugadores["jugador2"]["Derrotas"] .", Copas: ". 
    $jugadores["jugador2"]["Copas"] . "\n";

    $torneo = readline("Desean jugar otro torneo? (s para iniciar otro, cualquier otra tecla para no continuar): ");
    
} while ($torneo == "s"); // Sale cuando pongas unas 's'

echo "Gracias por jugar " . $jugadores["jugador1"]["nombre"] ." y " . $jugadores["jugador2"]["nombre"] . ".";

?>