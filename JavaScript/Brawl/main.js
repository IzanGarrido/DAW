// main.js - Código frontend para consumir la API de Brawl Stars a través de nuestro proxy

// Función para obtener datos de un jugador
async function obtenerJugador(tagJugador) {
  // Eliminar el # del inicio si existe
  tagJugador = tagJugador.startsWith('#') ? tagJugador.substring(1) : tagJugador;

  const url = `http://localhost:3000/api/player/${tagJugador}`;

  try {
    const respuesta = await fetch(url);

    if (!respuesta.ok) {
      throw new Error(`Error HTTP: ${respuesta.status}`);
    }

    const datos = await respuesta.json();
    return datos;
  } catch (error) {
    console.error('Error al obtener datos del jugador:', error);
    return null;
  }
}

// Función para obtener el registro de batallas de un jugador
async function obtenerBatallas(tagJugador) {
  // Eliminar el # del inicio si existe
  tagJugador = tagJugador.startsWith('#') ? tagJugador.substring(1) : tagJugador;

  const url = `http://localhost:3000/api/player/${tagJugador}/battlelog`;

  try {
    const respuesta = await fetch(url);

    if (!respuesta.ok) {
      throw new Error(`Error HTTP: ${respuesta.status}`);
    }

    const datos = await respuesta.json();
    return datos;
  } catch (error) {
    console.error('Error al obtener registro de batallas:', error);
    return null;
  }
}

// Función para obtener información de un club
async function obtenerClub(tagClub) {
  // Eliminar el # del inicio si existe
  tagClub = tagClub.startsWith('#') ? tagClub.substring(1) : tagClub;

  const url = `http://localhost:3000/api/club/${tagClub}`;

  try {
    const respuesta = await fetch(url);

    if (!respuesta.ok) {
      throw new Error(`Error HTTP: ${respuesta.status}`);
    }

    const datos = await respuesta.json();
    return datos;
  } catch (error) {
    console.error('Error al obtener datos del club:', error);
    return null;
  }
}

// Función para obtener la lista de brawlers
async function obtenerBrawlers() {
  const url = 'http://localhost:3000/api/brawlers';

  try {
    const respuesta = await fetch(url);

    if (!respuesta.ok) {
      throw new Error(`Error HTTP: ${respuesta.status}`);
    }

    const datos = await respuesta.json();
    return datos;
  } catch (error) {
    console.error('Error al obtener lista de brawlers:', error);
    return null;
  }
}

// Ejemplo de uso
async function ejemploDeUso() {
  try {
    // Obtener información de un jugador (reemplaza con un tag real)
    const jugador = await obtenerJugador('Q82UUCR');
    console.log('Información del jugador:', jugador);

    if (jugador) {
      // Obtener batallas del jugador
      const batallas = await obtenerBatallas('Q82UUCR');
      console.log('Registro de batallas:', batallas);

      // Si el jugador tiene un club, obtener información del club
      if (jugador.club && jugador.club.tag) {
        const clubTag = jugador.club.tag.replace('#', '');
        const club = await obtenerClub(clubTag);
        console.log('Información del club:', club);
      }
    }

    // Obtener lista de brawlers
    const brawlers = await obtenerBrawlers();
    console.log('Lista de brawlers:', brawlers);
  } catch (error) {
    console.error('Error en el ejemplo de uso:', error);
  }
}

// Ejecutar el ejemplo cuando se cargue la página
document.addEventListener('DOMContentLoaded', () => {
  console.log('Iniciando ejemplo de uso de la API de Brawl Stars...');
  ejemploDeUso();
});