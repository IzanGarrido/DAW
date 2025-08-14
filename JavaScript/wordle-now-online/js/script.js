let filaActual = 0;
let columnaActual = 0;
let celda;
const maxColumnas = 5;
let palabraActual;
let palabra = "";

// Función que hace funcionar el teclado virtual
document.addEventListener("DOMContentLoaded", function () {
    // Inicialmente resaltar la primera celda
    resaltarCeldaActual();
    palabraAleatoria();

    document.querySelectorAll('#tabla2 th').forEach(function (letra) {
        letra.addEventListener("click", function () {
            const current = this.innerText;
            if (current === "ENVIAR") {
                existe(pala);
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

    if (/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]$/.test(key)) {
        escribir(key.toUpperCase());
    }

    else if (key === "Backspace") {
        borrarUltimaLetra();
    }
    else if (key === "Enter") {
        existe();
    }
});

// Funcion para generar una palabra aleatoria
function palabraAleatoria() {

    fetch("https://random-word-api.herokuapp.com/word?lang=es&length=5")
        .then(response => response.json())
        .then(data => {
            let placeholder = data[0].toUpperCase();
            placeholder = placeholder.trim();
            console.log("Palabra Aleatoria: " + placeholder)
            mensajeGenerandoPalabra();
            fetch("https://rae-api.com/api/words/" + placeholder)
                .then(response => {
                    if (response.ok) {
                        palabraActual = placeholder
                    } else {
                        palabraAleatoria();
                    }

                })  
        })
}

// Funcion para comprobar si la palabra existe
function existe() {

    if (palabra.length == 5 || filaActual <= 5) {
        console.log("Palabra: " + palabra)
        fetch("https://rae-api.com/api/words/" + palabra.toLowerCase())
            .then(response => {
                if (response.ok) {
                    enviarFila();
                } else {
                    mensajeInvalido();
                }

            })
    }

}

// Funcion para poner un gif mientras se genera la palabra
function mensajeGenerandoPalabra() {
    let mensaje = document.getElementById("invalido");
    mensaje.innerHTML = "GENERANDO PALABRA";
    mensaje.className = "mostrar";
    setTimeout(function () {
        mensaje.className = "ocultar";
    }, 2000);
}

// Función para mostrar el mensaje de palabra inválida
function mensajeInvalido() {
    let mensaje = document.getElementById("invalido");
    mensaje.innerHTML = "ESTA PALABRA NO EXISTE";
    mensaje.className = "mostrar";
    setTimeout(function () {
        mensaje.className = "ocultar";
    }, 2000);

}

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
    console.log(palabraActual.length + " " + palabra.length)
    var mensajeDiv = document.getElementById("mensaje");
    if (palabraActual == palabra) {
        mensajeDiv.innerText = "¡Felicidades, has ganado!";
        console.log("has ganao")
        mensajeDiv.className = "mostrar";
        mensajeDiv.classList.add("mensaje-animado");
        document.body.classList.add("congelar");
        crearBotonReiniciar();
    } else if (filaActual == 5 && columnaActual == 5) {
        mensajeDiv.innerText = `Has perdido. La palabra era: ${palabraActual}`;
        mensajeDiv.className = "mostrar";
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
    palabraAleatoria();
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
    mensajeDiv.className = "ocultar";

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