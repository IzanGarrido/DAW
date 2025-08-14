document.addEventListener("DOMContentLoaded", () => {
    const breadcrumbs = document.getElementById("breadcrumbs");

    // Define las rutas y nombres para las migas de pan
    const breadcrumbPaths = {
        "../index.html": "Inicio",
        "nosotros.html": "Sobre Nosotros",
        "eventos.html": "Eventos",
        "contacto.html": "Contacto",
        "documento.html": "Guía de Estilo",
    };

    // Obtén el nombre del archivo actual
    const currentPath = window.location.pathname.split("/").pop();

    // Construye las migas de pan
    let breadcrumbHtml = `<li><a href="../index.html">Inicio</a></li>`;
    if (currentPath !== "../index.html" && breadcrumbPaths[currentPath]) {
        breadcrumbHtml += `<li>${breadcrumbPaths[currentPath]}</li>`;
    }

    // Actualiza el contenido del contenedor
    breadcrumbs.innerHTML = breadcrumbHtml;
});
