function comprobar_nombre() {
    let nombre = document.getElementById('nombre').value;
    if (nombre.length > 15) {
        alert("Nombre demasiado largo!")
    }
    let arr = nombre.split('')
    for (let i = 0; i < arr.length; i++) {
        if (arr[i].match(/^[0-9]$/)) {
            /*alert("El nombre no contiene números!")*/
            document.getElementById("name").style.color = "red";


        }

    }

}

function comprobar_email() {
    let email = document.getElementById('email').value;
    let comprobar = /^\w+@\w+(.\w+)*$/;
    if (!comprobar.test(email)) {
        document.getElementById("mail").style.color = "red";
    }


}

function comprobar_dni() {
    let dni = document.getElementById('dni').value;
    let comprobar = /^\d{8}[A-Za-z]$/;
    let cadena = "TRWAGMYFPDXBNJZSQVHLCKET";
    let dninum = parseInt(dni);
    let posicion = dninum % (cadena.length - 1);

    if (!comprobar.test(dni)) {
        document.getElementById("nif").style.color = "red";
    }

    if (comprobar.test(dni)) {
        if (cadena[posicion].toLowerCase() != (dni[dni.length - 1]).toLowerCase()) {
            document.getElementById("nif").style.color = "red";
        }
    }

}

function comprobar() {

    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;
    let dni = document.getElementById("dni").value;
    if (nombre == "") return alert("Existen campos vacíos en el formulario");
    if (email == "") return alert("Existen campos vacíos en el formulario");
    if (dni == "") return alert("Existen campos vacíos en el formulario");
    comprobar_nombre();
    comprobar_email();
    comprobar_dni();
    copiar();
}

function copiar() {

    
    let nombre = document.getElementById("nombre").value;
    let dni = document.getElementById("dni").value;
    let email = document.getElementById("email").value;
    let datos = nombre + " con DNI " + dni + " e e-mail " + email;
    let lista = document.getElementById("selector").value
    let nodoPadre = document.getElementById(lista);

    let div = document.createElement("div");
    let parrafo = document.createElement("p");
    let texto = document.createTextNode(datos);
    div.classList.add("par");
    div.addEventListener("dblclick",mover);
    parrafo.appendChild(texto);
    div.appendChild(parrafo);
    nodoPadre.appendChild(div);

}
function mover() {

    let lista = document.getElementById("selector").value
    let nodoPadre = document.getElementById(lista);

    let div = document.createElement("div");
    let parrafo = document.createElement("p");
    let datos = event.target.innerText;
    let texto = document.createTextNode(datos);
    div.classList.add("par");
    div.addEventListener("dblclick",mover).
    parrafo.appendChild(texto);
    div.appendChild(parrafo);
    nodoPadre.appendChild(div);

    event.currentTarget.remove()

}

function cambiar() {
    let nombre = document.getElementById("nombre").value;
    let dni = document.getElementById("dni").value;
    let email = document.getElementById("email").value;
    let parrafos = document.getElementsByTagName("p");
    let datos = nombre + " con DNI " + dni + " e e-mail " + email;
    for (let i = 0; i < parrafos.length; i++) {
        parrafos[i].innerText = datos;
    }

}