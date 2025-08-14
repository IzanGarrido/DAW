
// Esta función comprueba si un numero es feliz o no
function esfeliz(num) { 
    // contador para saber el numero de veces en encontrar un numero feliz
    let veces = 1;

    for (let i = 0; i < 8; i++) {
        parseInt(num);
        let x = num
        x = x.toString();
        let arr = x.split("");

        for (let i = 0; i < arr.length; i++) {
            arr[i] = Math.pow(parseInt(arr[i]), 2);

        }
        let suma = 0;
        parseInt(suma);
        for (let i = 0; i < arr.length; i++) {
            suma += parseInt(arr[i]);

        }
        if (suma == 1) {
            anadirNumInfeliz(veces)
            return true
        } else num = suma;
        veces++;

    }
    
    return false
}

// Esta función elimina los divs dentro del div padre cada vez que se cambia el número
function eliminarHijos() {
    let nodoPadreIzq = document.getElementById("izquierda");
    while(nodoPadreIzq.firstChild) { 
        nodoPadreIzq.removeChild(nodoPadreIzq.firstChild); 
    }
    let nodoPadreDcha = document.getElementById("derecha");
    while(nodoPadreDcha.firstChild) { 
        nodoPadreDcha.removeChild(nodoPadreDcha.firstChild); 
    }
    nodoPadreIzq.innerHTML = "Número Feliz"
    nodoPadreDcha.innerHTML = "Cantidad de números infelices (hasta encontrarlo)"
}

// Esta función es para añadir todos los numeros felizes
function anadirNumFeliz(num) {

    let nodoPadre = document.getElementById("izquierda");
    let div = document.createElement("div");
    let parrafo = document.createElement("p");
    let texto = document.createTextNode(num);
    div.classList.add("numero");
    div.addEventListener("click", numclickado); 
    div.addEventListener("mouseover", resalto); 
    div.addEventListener("mouseout", quitarResalto); 
    parrafo.appendChild(texto);
    div.appendChild(parrafo);
    nodoPadre.appendChild(div);

}

// Esta funcíon es para poner las veces que se tarda en encontrar un numero feliz
function anadirNumInfeliz(num) {

    let nodoPadre = document.getElementById("derecha");
    let div = document.createElement("div");
    let parrafo = document.createElement("p");
    let texto = document.createTextNode(num);
    div.classList.add("numero");
    div.addEventListener("click", numclickado); 
    div.addEventListener("mouseover", resalto); 
    div.addEventListener("mouseout", quitarResalto); 
    parrafo.appendChild(texto);
    div.appendChild(parrafo);
    nodoPadre.appendChild(div);

}

// Función principal que llama a las demás funciones
function feliz() {
    eliminarHijos();
    let inicial = document.getElementById("inicial").value;
    let cont = parseInt(inicial);
    let felices = [];
    let cantidad = document.getElementById("cantidad").value;

    // Llama a la función para comprobar números felices
    while (felices.length < parseInt(cantidad)) {
        if (esfeliz(cont)) {
            felices.push(cont);
        }

        cont++;
    }

    // Añade los números felices a la lista
    for (let i = 0; i < felices.length; i++) {
        anadirNumFeliz(felices[i]);

    }
}

// Función que cuando clickas un número se pone en Nº Clickado
function numclickado() {
    let div = document.getElementById("clickado");
    document.getElementById("clickado").innerHTML = event.target.innerText
    div.classList.add("numero-superior")
}

// Pone el resalto al número cuando se pasa el ratón por encima
function resalto() {
    event.currentTarget.classList.add("numeroAmarillo")
}
// Quita el resalto al número cuando se quita el ratón de encima
function quitarResalto() {
    event.currentTarget.classList.remove("numeroAmarillo")
}