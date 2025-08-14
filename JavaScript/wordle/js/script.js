const palabras = [
    "campo", "flota", "perro", "gusto", "traje", "leche", "piano", "brisa", "rocas", "llama",
    "pluma", "hielo", "monte", "arena", "luzco", "cielo", "fresa", "lucha", "marea", "pasto",
    "salud", "mente", "jugar", "nieve", "sonar", "cuero", "dudar", "manos", "tecla", "circo",
    "donde", "sueño", "barco", "ojear", "verde", "botas", "cesta", "banda", "amigo", "tenis",
    "perla", "notar", "lunar", "abrir", "vista", "ratón", "lista", "salto", "lento", "limón",
    "voces", "cabra", "coral", "borde", "ratel", "llave", "sombra", "mover", "hojas", "mujer",
    "dieta", "blusa", "pique", "falta", "carne", "rubor", "volar", "tigre", "marco", "pauta",
    "punto", "bravo", "aviso", "bueno", "trama", "acera", "deuda", "pilar", "freno", "diosa",
    "noche", "clave", "flaco", "pista", "silla", "drama", "mosca", "llano", "verbo", "astro",
    "manto", "sabio", "juego", "monje", "poder", "fondo", "mitad", "tarde", "rival", "ruido",
    "ronda", "vapor", "cerro", "plato", "puño", "gripe", "regla", "firma", "cable", "llano"
];

let filaActual = 0;
let columnaActual = 0;
let celda;
const maxColumnas = 5;
let palabraActual = palabras[Math.floor(Math.random() * palabras.length)].toUpperCase();
console.log("Palabra Actual: " + palabraActual)
let palabra = "";

// Función que hace funcionar el teclado virtual
document.addEventListener("DOMContentLoaded", function () {
    // Inicialmente resaltar la primera celda
    resaltarCeldaActual();

    document.querySelectorAll('#tabla2 th').forEach(function (letra) {
        letra.addEventListener("click", function () {
            const current = this.innerText;
            if (current === "ENVIAR") {
                enviarFila();
            } else if (current === "DEL") {
                borrarUltimaLetra();
            } else {
                escribir(current);
            }
        });
    });
});

// Función que hace funcionar el teclado real
document.addEventListener("keydown", function (event) {
    const key = event.key;

    if (/^[a-zA-ZñÑ]$/.test(key)) {
        escribir(key.toUpperCase());
    }

    else if (key === "Backspace") {
        borrarUltimaLetra();
    }
    else if (key === "Enter") {
        enviarFila();
    }
});

// Función para resaltar la celda actual
function resaltarCeldaActual() {
    // Quitar el estilo de todas las celdas
    document.querySelectorAll('#tabla1 th').forEach(function (celda) {
        celda.classList.remove("celda-activa");
    });

    // Resaltar la celda actual
    celda = document.querySelector(`#tabla1 tr:nth-child(${filaActual + 1}) th:nth-child(${columnaActual + 1})`);
    if (celda) {
        celda.classList.add("celda-activa");
    }
}

// Función para escribir una letra
function escribir(letra) {
    if (columnaActual < maxColumnas) {
        celda = document.querySelector(`#tabla1 tr:nth-child(${filaActual + 1}) th:nth-child(${columnaActual + 1})`);
        celda.innerText = letra;
        palabra += letra;

        // Agregar la clase de animación
        celda.classList.add("celda-animada");

        // Remover la clase de animación después de que termine (200ms)
        setTimeout(() => {
            celda.classList.remove("celda-animada");
        }, 200);

        columnaActual++;
        resaltarCeldaActual();
    }
}

// Función para mover a la siguiente fila
function enviarFila() {
    if (filaActual <= 5 && palabra.length == 5) {
        comprobar();

        palabra = "";
        columnaActual = 0;
        filaActual++;
        resaltarCeldaActual();
    }
}

// Función para borrar la última letra
function borrarUltimaLetra() {
    if (columnaActual > 0) {
        columnaActual--;
        celda = document.querySelector(`#tabla1 tr:nth-child(${filaActual + 1}) th:nth-child(${columnaActual + 1})`);
        celda.innerText = '';
        palabra = palabra.slice(0, palabra.length - 1);

        celda.classList.remove("celda-animada", "coincide", "esta", "NoEsta");
        resaltarCeldaActual();

    }
}

// Función para comprobar si las letras coinciden y si la palabra coincide
function comprobar() {
    // Verificar si la letra coincide
    for (let i = 0; i < 5; i++) {
        celda = document.querySelector(`#tabla1 tr:nth-child(${filaActual + 1}) th:nth-child(${i + 1})`);

        if (palabraActual[i] === palabra[i]) {
            celda.classList.add("coincide");
            resaltarTecla(palabra[i], "coincide");
        } else if (palabraActual.includes(palabra[i])) {
            celda.classList.add("esta");
            resaltarTecla(palabra[i], "esta");
        } else {
            celda.classList.add("NoEsta");
            resaltarTecla(palabra[i], "NoEsta");
        }
    }

    // Verificar si la palabra coincide
    var mensajeDiv = document.getElementById("mensaje");
    if (palabraActual === palabra) {
        mensajeDiv.innerText = "¡Felicidades, has ganado!";
        mensajeDiv.classList.add("mensaje-animado");
        document.body.classList.add("congelar");
        crearBotonReiniciar();
    } else if (filaActual == 5 && columnaActual == 5) {
        mensajeDiv.innerText = `Has perdido. La palabra era: ${palabraActual}`;
        mensajeDiv.classList.add("mensaje-animado");
        crearBotonReiniciar();
    }
}

// Función para crear el botón de reinicio
function crearBotonReiniciar() {
    const mensajeDiv = document.getElementById("mensaje");

    // Crear el botón
    const botonReiniciar = document.createElement("button");
    botonReiniciar.innerText = "Reiniciar Partida";
    botonReiniciar.classList.add("boton-reiniciar");

    // Añadir evento de clic al botón para reiniciar el juego
    botonReiniciar.addEventListener("click", reiniciarPartida);   

    // Agregar el botón al mensaje
    mensajeDiv.appendChild(botonReiniciar);
}

// Función para reiniciar la partida
function reiniciarPartida() {
    // Resetear fila y columna
    filaActual = 0;
    columnaActual = 0;
    palabraActual = palabras[Math.floor(Math.random() * palabras.length)].toUpperCase();
    palabra = "";

    // Limpiar todas las celdas
    document.querySelectorAll('#tabla1 th').forEach(function (celda) {
        celda.innerText = '';
        celda.classList.remove("celda-animada", "coincide", "esta", "NoEsta");
    });

    // Limpiar las clases del teclado virtual
    document.querySelectorAll("#tabla2 th").forEach(function (tecla) {
        tecla.classList.remove("coincide", "esta", "NoEsta");
    });

    // Limpiar el mensaje
    const mensajeDiv = document.getElementById("mensaje");
    mensajeDiv.innerText = "";
    mensajeDiv.classList.remove("mensaje-animado");

    // Quitar el botón de reinicio
    const botonReiniciar = document.querySelector(".boton-reiniciar");
    if (botonReiniciar) {
        botonReiniciar.remove();
    }

    // Resaltar la primera celda nuevamente
    resaltarCeldaActual();
}


// Función para resaltar las teclas del teclado virtual
function resaltarTecla(letra, clase) {
    // Seleccionar todas las teclas del teclado virtual
    const teclas = document.querySelectorAll("#tabla2 th");

    // Recorrer cada tecla y aplicar la clase si la letra coincide
    teclas.forEach(function (tecla) {
        if (tecla.innerText === letra) {
            tecla.classList.add(clase);
        }
    });
}