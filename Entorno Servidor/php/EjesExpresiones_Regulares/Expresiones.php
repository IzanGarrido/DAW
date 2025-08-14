<?php

/*
* @author Izan Garrido Quintana
*/

// Genera el patrón para los teléfonos fijos de la provincia de Valencia
function TlfVlc($tlf) {
    $patron = "/^96\d{7}$/";
    return preg_match($patron, $tlf) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para los códigos postales de la Comunidad Valenciana";
function CodPostalVlc($Cod) {
    $patron = "/^(46[0-9]{3}|03[0-9]{3}|12[0-9]{3})$/";
    return preg_match($patron, $Cod) ? "Cadena Valida " : "Cadena invalida ";
} 

// Genera el patrón para los teléfonos móviles";
function TlfMovil($Movil) {
    $patron = "/^(6|7)[0-9]{8}$/";
    return preg_match($patron, $Movil) ? "Cadena Valida " : "Cadena invalida ";
} 

// Genera el patrón para un NIF
function NIF($nif) {
    $patron = "/^[0-9]{8}[A-Z]$/";
    return preg_match($patron, $nif) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para fecha en formato dd/mm/aaaa o bien dd-mm-aaaa
function Fecha($fecha) {
    $patron = "/^\d{2}[\/\-]\d{2}[\/\-]\d{4}$/";
    return preg_match($patron, $fecha) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para una cadena que sea aprobado (puede ser mayúsculas o minúsculas)
function Aprobado($fecha) {
    $patron = "/^(aprobado|APROBADO)$/";
    return preg_match($patron, $fecha) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para una cadena que contenga aprobado en minúsculas
function AprobadoMinus($aprobado) {
    $patron = "/^aprobado$/";
    return preg_match($patron, $aprobado) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para una cadena que contenga aprobado tanto en mayúsculas como en minúsculas
function AprobadoTodo($aprobado) {
    $patron = "/^aprobado$/";

    $aprobado = strtolower($aprobado);

    return preg_match($patron, $aprobado) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para letras mayúsculas/minúsculas y espacios
function MayusMinusEspacios($cadena) {
    $patron = "/^[A-Za-z\s]+$/";
    return preg_match($patron, $cadena) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para solamente números, sin espacios
function Nums($nums) {
    $patron = "/^\d+$/";
    return preg_match($patron, $nums) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para números con espacios
function NumsEspacios($nums) {
    $patron = "/^\d+(?:\s+\d+)*$/";
    return preg_match($patron, $nums) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados
function Texto($texto) {
    $patron = "/^[\w\sáéíóúÁÉÍÓÚ]+$/u";
    return preg_match($patron, $texto) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para el caso anterior añadiendo los signos de puntuación: comillas simples, coma, punto, punto y coma, dos puntos y guiones
function Puntuacion($puntuacion) {
    $patron = '/^[\w\sáéíóúÁÉÍÓÚ.,;:\-\'"]+$/u';
    return preg_match($patron, $puntuacion) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para validar una dirección de email
function Email($email) {
    $patron = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    return preg_match($patron, $email) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para validar una URL sencilla (http://www.ieslasenia.org/ejercicio?16)
function Url($url) {
    $patron = "/^http:\/\/(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(?:\/\S*)?$/";
    return preg_match($patron, $url) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para validar una contraseña con al menos un carácter en minúscula, una mayúscula, un número y al menos 6 caracteres de longitud
function Contra($contra) {
    $patron = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/";
    return preg_match($patron, $contra) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para validar una IPv4
function Ip($ip) {
    $patron = "/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
    return preg_match($patron, $ip) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para validar una MAC separada por :
function Mac($mac) {
    $patron = "/^([0-9A-Fa-f]{2}(:)){5}[0-9A-Fa-f]{2}$/";
    return preg_match($patron, $mac) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para validar una MAC separada por -
function MacGuion($mac) {
    $patron = "/^([0-9A-Fa-f]{2}(-)){5}[0-9A-Fa-f]{2}$/";
    return preg_match($patron, $mac) ? "Cadena Valida " : "Cadena invalida ";
}

// Genera el patrón para validar una matrícula de vehículo española
function Matricula($matricula) {
    $patron = "/^[0-9]{4}[A-Z]{3}$/";
    return preg_match($patron, $matricula) ? "Cadena Valida " : "Cadena invalida ";
}



echo "a) Genera el patrón para los teléfonos fijos de la provincia de Valencia<br>";
echo "961234567: " . TlfVlc("961234567"). "<br>976234567: " . TlfVlc("976234567"). "<br><br>";

echo "b) Genera el patrón para los códigos postales de la Comunidad Valenciana<br>";
echo "46001: " . CodPostalVlc("46001"). "<br>47001: " . CodPostalVlc("47001"). "<br><br>";

echo "c) Genera el patrón para los teléfonos móviles<br>";
echo "678123456: " . TlfMovil("678123456"). "<br>888123456: " . TlfMovil("888123456"). "<br><br>";

echo "d) Genera el patrón para un NIF<br>";
echo "12345678Z: " . NIF("12345678Z"). "<br>1234567A: " . NIF("1234567A"). "<br><br>";

echo "e) Genera el patrón para fecha en formato dd/mm/aaaa o bien dd-mm-aaaa<br>";
echo "31/12/2024: " . Fecha("31/12/2024"). "<br>31.12.2024: " . Fecha("31.12.2024"). "<br><br>";

echo "f) Genera el patrón para una cadena que sea aprobado (puede ser mayúsculas o minúsculas)<br>";
echo "aprobado: " . Aprobado("aprobado"). "<br>Suspendido: " . Aprobado("Suspendido"). "<br><br>";

echo "g) Genera el patrón para una cadena que contenga aprobado en minúsculas<br>";
echo "aprobado: " . AprobadoMinus("aprobado"). "<br>Aprobado: " . AprobadoMinus("Aprobado"). "<br><br>";

echo "h) Genera el patrón para una cadena que contenga aprobado tanto en mayúsculas como en minúsculas<br>";
echo "aprobado: " . AprobadoTodo("aprobado"). "<br>Suspendido: " . AprobadoTodo("Suspendido"). "<br><br>";

echo "i) Genera el patrón para letras mayúsculas/minúsculas y espacios<br>";
echo "Le tRas: " . MayusMinusEspacios("Le tRas"). "<br>let-ras: " . MayusMinusEspacios("let-ras"). "<br><br>";

echo "j) Genera el patrón para solamente números, sin espacios<br>";
echo "1234: " . Nums("1234"). "<br>123 4: " . Nums("123 4"). "<br><br>";

echo "k) Genera el patrón para números con espacios<br>";
echo "12 34: " . NumsEspacios("12 34"). "<br>12 34r: " . NumsEspacios("12 34r"). "<br><br>";

echo "l) Genera el patrón para texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados<br>";
echo "Patrón texto: " . Texto("Patrón texto"). "<br>Patrón-texto: " . Texto("Patrón-texto"). "<br><br>";

echo "m) Genera el patrón para el caso anterior añadiendo los signos de puntuación: comillas simples, coma, punto, punto y coma, dos puntos y guiones<br>";
echo ";:Patrón-, 'texto'.: " . Puntuacion(";:Patrón-, 'texto'."). "<br>[;:Patrón-, 'texto'.]: " . Puntuacion("[;:Patrón-, 'texto'.]"). "<br><br>";

echo "n) Genera el patrón para validar una dirección de email<br>";
echo "email@gmail.com: " . Email("email@gmail.com"). "<br>email@gmail.com: " . Email("email.com"). "<br><br>";

echo "o) Genera el patrón para validar una URL sencilla (http://www.ieslasenia.org/ejercicio?16)<br>";
echo "http://www.ieslasenia.org/ejercicio?16: " . Url("http://www.ieslasenia.org/ejercicio?16"). "<br>www.senia.es: " . Url("www.senia.es"). "<br><br>";

echo "p) Genera el patrón para validar una contraseña con al menos un carácter en minúscula, una mayúscula, un número y al menos 6 caracteres de longitud<br>";
echo "Contra123: " . Contra("Contra123"). "<br>Contra: " . Contra("Contra"). "<br><br>";

echo "q) Genera el patrón para validar una IPv4<br>";
echo "192.168.0.1: " . Ip("192.168.0.1"). "<br>192.168.0: " . Ip("192.168.0"). "<br><br>";

echo "r) Genera el patrón para validar una MAC separada por :<br>";
echo "00:11:22:33:44:55: " . Mac("00:11:22:33:44:55"). "<br>00-11-22-33-44-55: " . Mac("00-11-22-33-44-55"). "<br><br>";

echo "s) Genera el patrón para validar una MAC separada por -<br>";
echo "00-11-22-33-44-55: " . MacGuion("00-11-22-33-44-55"). "<br>00:11:22:33:44:55: " . MacGuion("00:11:22:33:44:55"). "<br><br>";

echo "t) Genera el patrón para validar una matrícula de vehículo española<br>";
echo "1111BBB: " . Matricula("1111BBB"). "<br>1111BB: " . Matricula("1111BB"). "<br><br>";


?>