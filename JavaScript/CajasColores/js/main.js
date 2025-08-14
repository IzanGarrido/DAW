/**
 * @author Izan Garrido Quintana
 * 
 */

function circulo(elemento) {
    elemento.classList.toggle("circulo")
}
function sombra(elemento) {
    elemento.classList.toggle("sombra")

}
function sombraInt(elemento){
    elemento.classList.toggle("sombraInt")

}
function eliminar(elemento) {
    elemento.parentNode.remove();
    
}