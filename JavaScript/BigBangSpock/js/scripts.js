//Mensajes de los resultados de las jugadas
var mensajes = {
    tipa: "Tijeras cortan papel",
    papi: "Papel tapa piedra",
    pila:"Piedra aplasta lagarto",
    lasp: "Lagarto envenena a Spock",
    spti: "Spock rompe tijeras",
    tila: "Tijeras decapitan lagarto",
    lapa: "Lagarto devora papel",
    pasp: "Papel desautoriza a Spock",
    sppi: "Spock vaporiza piedra",
    piti: "Piedra aplasta tijeras"
}

//Variables que contendrán los elementos HTML que vayamos a necesitar
const piedra = document.getElementById("piedra")
const papel = document.getElementById("papel")
const tijera = document.getElementById("tijera")
const lagarto = document.getElementById("lagarto")
const spock = document.getElementById("spock")

window.onload = function(){
    cargarTablero();
    asignarElementosHTML();

}

function asignarElementosHTML() {
    let seleccionado = document.getElementById("seleccionado").innerHTML = "";
}

function cargarEventos() {
    //Función donde cargaremos los eventos que necesite cada elemento de la partida
    jugadaEnemiga();
    deliverar();
}

function reset(){
    let jugador = document.getElementById("jugador").innerHTML = "";
    let maquina = document.getElementById("maquina").innerHTML = "";

}

function gameOver() {

    let jugador = document.getElementById("jugador");
    let maquina = document.getElementById("maquina");
    let parrafo = document.getElementById("parrafo");

    if (jugador.querySelectorAll("div").length == 10) {
        parrafo.innerHTML = "HAS GANADO!";
        mostrarMensaje();
        reset();
        
    } else if (maquina.querySelectorAll("div").length == 10) {
        parrafo.innerHTML = "HAS PERDIDO";
        mostrarMensaje();
        reset();
    }
}

function comparaciones () {
    let mio = document.getElementById("seleccionado").innerHTML;
    let enemigo = document.getElementById("enemigo").innerHTML;

    let carmio = mio.substring(14,16);;
    let carenemigo = enemigo.substring(14,16);
    let unionGanar = carmio + carenemigo;
    let unionPerder = carenemigo + carmio;
    let parrafo = document.getElementById("parrafo");

    let jugador = document.getElementById("jugador");
    let maquina = document.getElementById("maquina");
    let punto = document.createElement("div");

    for (var key in mensajes) {

        if (unionGanar == key) {
            parrafo.innerHTML = mensajes[key];
            jugador.appendChild(punto);
            punto.classList.add("punto")
            punto.classList.add("mio")
        } else if (unionPerder == key) {
            parrafo.innerHTML = mensajes[key];
            maquina.appendChild(punto);
            punto.classList.add("punto")
            punto.classList.add("suyo")
        } else if (carmio == carenemigo){
            parrafo.innerHTML = "Empate";
        }
        
    }
    
}

function continuar() {
    //Función que lanzamos cuando pulsamos al botón continuar
    //Volvemos a ocultar el mensaje;
    document.getElementById("mensaje").className = "invisible";
    document.getElementById("proteccion").className = "invisible";
    document.getElementById("deliveracion").className = "invisible";


    //Si es una jugada reiniciamos todo menos los contadores de puntos.
    //Si es el final de la partida, también incluimos los contadores de puntos.
    setTimeout(gameOver, 500)
    cargarTablero();
    asignarElementosHTML();
}

function deliverar() {
    document.getElementById("proteccion").className="visible";
    document.getElementById("deliveracion").className="visible";
    setTimeout(mostrarMensaje,2000);
    setTimeout(comparaciones,2000);
}

function mostrarMensaje() {
    var mensaje = document.getElementById("mensaje");
    mensaje.className = "visible";
    var botonContinuar = document.getElementById("continuar").addEventListener("click", continuar);

}

function cargarTablero() {
    document.getElementById("seleccionado").addEventListener("drop", drop);
    document.getElementById("seleccionado").addEventListener("dragover", allowDrop);

    let imgs = document.querySelectorAll(".item img");
    for(img of imgs) {
        // Le indicamos que la imagen es arrastrable
        img.draggable = true;
        // Llamada a la función a la que se llama cuando empieza el arrastre
        img.addEventListener("dragstart", drag);
    }

    let img2 = document.createElement("img");
    enemigo = document.getElementById("enemigo");
    enemigo.innerHTML = '';
    img2.src = "img/interrogante.png";
    enemigo.appendChild(img2);
    
}

function jugadaEnemiga() {
    const imagenes = [ "img/piedra.png" , 
                    "img/papel.png" , 
                    "img/tijera.png" , 
                    "img/lagarto.png" , 
                    "img/spock.png" , ]

enemigo = document.getElementById("enemigo");
enemigo.innerHTML = '';
var img = document.createElement("img");
img.src = imagenes[Math.floor(Math.random() * imagenes.length)]
enemigo.appendChild(img);
}

/***************************DRAG AND DROP ****************************/

//Funciones para el drag&drop
function allowDrop(ev) {
    /*
        Por defecto no se pueden arrastrar elementos dentro de otros.
        Cambiamos este comportamiento en los divs
    */
  ev.preventDefault();
}

// Funcion que coge el ID del elemento arratrado
function drag(ev) {
    // Nos guardamos la información del "id" en un campo llamada "id"
  ev.dataTransfer.setData("id", this.id);
}


function drop(ev) {
  ev.preventDefault();

  // Cogemos el dato del id guardado en el campo arrastrado "id"
  var idElement = ev.dataTransfer.getData("id");

  // Añadimos el objeto arrastrado como hijo de nuestro div, accediendo con su id
  this.innerHTML = '';
  this.appendChild(document.getElementById(idElement).cloneNode(true));
  cargarEventos();
  
}
 
 /***************************FIN DRAG AND DROP **************************/