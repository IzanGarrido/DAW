var enlaceMenu;

function iniciarMenu() 
{
	enlaceMenu = document.querySelector("main>nav>a");
	enlaceMenu.addEventListener("click", despliegaMenu, false);
}

function despliegaMenu()
{
	document.querySelector("main>nav>ul").classList.toggle('desplegado');
}

window.addEventListener("load", iniciarMenu, false);
