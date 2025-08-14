function sombra(elemento) {
    elemento.classList.toggle("sombra");
}

function numero(elemento) {
    document.getElementById("texto").value += elemento;
}
function operacion(elemento) {  
    let texto = document.getElementById("texto").value;

    if (texto[texto.length - 1].match(/^[0-9]$/) || texto.match(")")) {
        document.getElementById("texto").value += elemento;
    }
}

function c() {
    document.getElementById("texto").value = "";

}

function res() {
    document.getElementById("texto").value = eval(document.getElementById("texto").value);


}

function porcentaje() {
    let texto = document.getElementById("texto").value + " / 100";
    if (texto[texto.length - 1].match(/^[0-9]$/)) {
        
        document.getElementById("texto").value = eval(texto);
    }

}

function borrar() {
    let texto = document.getElementById("texto").value;
    if (texto[texto.length - 1].match(/^[0-9./*+\-\)]+$/)) {
        
        texto = texto.substring(0, texto.length - 1)
        document.getElementById("texto").value = texto
    }


}

function parentesis() {
    let texto = document.getElementById("texto").value;

    if (texto[texto.length - 1].match(/^[0-9]$/) && !texto[texto.length - 1].match(/^[./*+\-\)]+$/)) {
        
        let texto = "(" + document.getElementById("texto").value + ")";
        document.getElementById("texto").value = texto;
    
    }
   
}

document.addEventListener("keydown", function(event) {
    const key = event.key;

    if (!isNaN(key)) {
        numero(key);
    }
    else if (key === "+" || key === "-" || key === "*" || key === "/") {
        operacion(key);
    }
    else if (key === "%") {
        porcentaje();
    }
    else if (key === "Backspace") {
        borrar();
    }
    else if (key === "=" || key === "Enter") {
        res();
    }
    else if (key === ".") {
        numero(".");
    }
    else if (key.toLowerCase() === "c") {
        c();
    }
    else if (key === "(" || key === ")") {
        parentesis();
    }
});
