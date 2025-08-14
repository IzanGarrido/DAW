document.addEventListener("DOMContentLoaded", function () {
    
    let modoSeleccionado = null; // Almacena el modo de juego seleccionado
    const modos = document.getElementsByClassName("modo"); // Obtiene los elementos que representan los modos de juego
    const botonJugar = document.getElementById("jugar"); // Obtiene el botón para iniciar el juego
    
    // Agrega un listener a cada modo de juego para seleccionar el modo al hacer clic
    Array.from(modos).forEach(function (modo) {
        modo.addEventListener("click", function () {
            
            cajaModo1 = document.getElementById("modo1");
            cajaModo2 = document.getElementById("modo2");
            modoSeleccionado = this.id; // Guarda el modo seleccionado
            
            // Cambia el color del modo seleccionado y quita el color del otro modo
            if (modoSeleccionado === "modo1") {
                cajaModo1.classList.add("color-modo");
                cajaModo2.classList.remove("color-modo");
            } else if (modoSeleccionado === "modo2") {
                cajaModo2.classList.add("color-modo");
                cajaModo1.classList.remove("color-modo");
            }
            
            // Resalta el modo seleccionado
            Array.from(modos).forEach(m => m.classList.remove("seleccionado"));
            this.classList.add("seleccionado");
        });
    });

    // Listener para el botón de iniciar el juego
    botonJugar.addEventListener("click", function () {
        let pelotas = document.getElementById("cantidad").value; // Obtiene el número de pelotas a crear
        
        if (modoSeleccionado) { // Verifica si se seleccionó un modo
            limpiarJuego();
            // Inicia el juego en el modo correspondiente
            if (modoSeleccionado === "modo1") {
                modo1(pelotas);
            } else if (modoSeleccionado === "modo2") {
                modo2(pelotas);
            }   
        }
    });
});

let cronometro;
let segundos = 0;
let aciertos = 0;
let fallos = 0;
let colorObjetivo;
const colores = ["rojo", "verde", "azul", "amarillo"]; // Colores posibles para las pelotas

// Función para el modo 1
function modo1(pelotas) {
    limpiarJuego();
    
    const campo = document.getElementById("campo");
    campo.innerHTML = ''; // Limpia el campo de juego
    
    // Listener para contar clics incorrectos
    campo.addEventListener("click", function(e) {
        if (e.target === this) {
            actualizarContadores();
        }
    });

    // Crea las pelotas aleatorias en el campo
    for (let i = 0; i < pelotas; i++) {
        crearPelota(campo, "modo1", colores[Math.floor(Math.random() * colores.length)]);
    }

    iniciarCronometro(); // Inicia el cronómetro
}

// Función para el modo 2
function modo2(pelotas) {
    limpiarJuego();
    
    const campo = document.getElementById("campo");
    campo.innerHTML = ''; // Limpia el campo de juego
    
    // Listener para contar clics incorrectos
    campo.addEventListener("click", function(e) {
        if (e.target === this) {
            actualizarContadores();
        }
    });

    // Selecciona el color objetivo para eliminar en este modo
    colorObjetivo = colores[Math.floor(Math.random() * colores.length)];
    mostrarMensaje("Elimina todas las pelotas de color: " + colorObjetivo);

    // Calcula la cantidad de pelotas del color objetivo y de otros colores
    let pelotasObjetivo = Math.floor(pelotas / 2);
    let pelotasOtros = pelotas - pelotasObjetivo;

    // Crea las pelotas del color objetivo
    for (let i = 0; i < pelotasObjetivo; i++) {
        crearPelota(campo, "modo2", colorObjetivo);
    }

    // Crea las pelotas de otros colores
    for (let i = 0; i < pelotasOtros; i++) {
        let colorDisponible;
        do {
            colorDisponible = colores[Math.floor(Math.random() * colores.length)];
        } while (colorDisponible === colorObjetivo);
        crearPelota(campo, "modo2", colorDisponible);
    }

    iniciarCronometro(); // Inicia el cronómetro
}

// Muestra un mensaje temporal en el campo de juego
function mostrarMensaje(mensaje, duracion = 3000) {
    const campo = document.getElementById("campo");

    const mensajeElement = document.createElement("div");
    mensajeElement.textContent = mensaje;
    mensajeElement.classList.add("mensaje-en-campo");
    campo.appendChild(mensajeElement);

    // Elimina el mensaje después de un tiempo
    setTimeout(() => {
        campo.removeChild(mensajeElement);
    }, duracion);
}

// Función para crear una pelota en el campo de juego
function crearPelota(campo, modo, colorForzado = null) {
    const pelota = document.createElement("div");
    pelota.className = "pelota";
    
    const tamano = Math.floor(Math.random() * 31) + 20;
    pelota.style.width = `${tamano}px`;
    pelota.style.height = `${tamano}px`;

    const maxX = campo.clientWidth - tamano;
    const maxY = campo.clientHeight - tamano;
    pelota.style.left = `${Math.floor(Math.random() * maxX)}px`;
    pelota.style.top = `${Math.floor(Math.random() * maxY)}px`;

    let color = colorForzado || colores[Math.floor(Math.random() * colores.length)];
    pelota.classList.add(color);

    // Listener para eliminar la pelota al hacer clic en ella
    pelota.addEventListener("click", function() {
        if (modo === "modo1" || (modo === "modo2" && color === colorObjetivo)) {
            aciertos++;
            this.remove();
            
            // Verifica si el jugador ha ganado
            if (modo === "modo1" && campo.children.length === 0) {
                mostrarMensaje("¡Has ganado! Tiempo: " + document.getElementById("temp").textContent);
                limpiarJuego();
            } else if (modo === "modo2") {
                let pelotasObjetivoRestantes = Array.from(campo.children).filter(p => p.classList.contains(colorObjetivo));
                if (pelotasObjetivoRestantes.length === 0) {
                    campo.innerHTML = ''; 
                    mostrarMensaje("¡Has ganado! Has eliminado todas las pelotas de color " + colorObjetivo + ". Tiempo: " + document.getElementById("temp").textContent);
                    limpiarJuego();
                }
            }
        } else {
            fallos++;
            this.remove();
        }
        actualizarContadores(); // Actualiza los contadores de aciertos y fallos
    });

    campo.appendChild(pelota);
}

// Reinicia el juego y resetea los contadores
function limpiarJuego() {
    if (cronometro) {
        clearInterval(cronometro);
    }
    document.getElementById("temp").textContent = "00:00:00";
    aciertos = 0;
    fallos = 0;
    document.getElementById("acierto").textContent = 0;
    document.getElementById("fallo").textContent = 0;
}

// Actualiza los contadores de aciertos y fallos
function actualizarContadores() {
    document.getElementById("acierto").textContent = aciertos;
    document.getElementById("fallo").textContent = fallos;
}

// Inicia el cronómetro
function iniciarCronometro() {
    segundos = 0;
    actualizarCronometro();
    cronometro = setInterval(actualizarCronometro, 1000);
}

// Actualiza el cronómetro y el tiempo mostrado
function actualizarCronometro() {
    segundos++;
    const horas = Math.floor(segundos / 3600);
    const minutos = Math.floor((segundos % 3600) / 60);
    const segs = segundos % 60;
    
    const tiempoFormateado = `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segs.toString().padStart(2, '0')}`;
    
    document.getElementById("temp").textContent = tiempoFormateado;
}