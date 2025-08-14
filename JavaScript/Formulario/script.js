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

function comprobar_apellidos() {
    let apellidos = document.getElementById('apellidos').value;
    if (apellidos.length > 45) {
        alert("Apellidos demasiado largos")
    }

    let arr = apellidos.split('')
    for (let i = 0; i < arr.length; i++) {
        if (arr[i].match(/^[0-9]$/)) {
            document.getElementById("lastname").style.color = "red";
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

function comprobar_password() {
    let password = document.getElementById('password').value;
    let comprobar = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#])[A-Za-z\d$@$!%*?&#]{8,15}/;
    if (!comprobar.test(password)) {
        document.getElementById("pass").style.color = "red";
    }


}

function comprobar_repassword() {
    let password = document.getElementById('password').value;
    let repassword = document.getElementById('repassword').value;

    if (password != repassword) {
        document.getElementById("reppass").style.color = "red";
    }


}

function comprobar_ip() {
    let ip = document.getElementById('ip').value;
    let comprobar = /^([0-255]{1,3}).([0-255]{1,3}).([0-255]{1,3}).([0-255]{1,3})$/

    if (!comprobar.test(ip)) {
        document.getElementById("ipequip").style.color = "red";
    }

}