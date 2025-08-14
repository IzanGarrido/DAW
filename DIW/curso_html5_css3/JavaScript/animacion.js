window.addEventListener("load", iniciar, false);

function iniciar() {
    animarChincheta1(); // Inicia la animación de la chincheta 1 al cargar la página
}

function animarChincheta1() {
    var chincheta1 = document.getElementById("chincheta1");
    chincheta1.classList.add("achincheta1");
    chincheta1.addEventListener("animationend", animarArticle1, false);
}   

function animarArticle1() {
    var article1 = document.getElementById("primero");   
    article1.classList.add("aprimero"); 
    article1.addEventListener("animationend", animarChincheta2, false);
}

function animarChincheta2() {
    var chincheta2 = document.getElementById("chincheta2");
    chincheta2.classList.add("achincheta2");
    chincheta2.addEventListener("animationend", animarChincheta3, false);
}

function animarChincheta3() {
    var chincheta3 = document.getElementById("chincheta3");
    chincheta3.classList.add("achincheta3");
    chincheta3.addEventListener("animationend", animarArticle3, false);
}

function animarArticle3() {
    var article3 = document.getElementById("tercero");
    article3.classList.add("atercero");
    //article3.addEventListener("animationend", animarArticle3, false);
}