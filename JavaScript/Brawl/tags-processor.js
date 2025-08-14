// tags-processor.js - Procesa múltiples tags de jugadores y los ordena por copas

// Lista de tags de jugadores a procesar
const playerTags = [
    'Q82UUCR', 
    'GGJL989L', 
    '889YCL2Y', 
    'JPQRPYCL', 
    'GGRP9PU2', 
    '2YGLGLJ9', 
    '8RU00ULLC', 
    '8ORYYG90Q'
  ];
  
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
      console.error(`Error al obtener datos del jugador ${tagJugador}:`, error);
      return null;
    }
  }
  
  // Función para procesar todos los jugadores y ordenarlos por copas
  async function procesarJugadores() {
    try {
      // Mostrar mensaje de carga
      const resultadosDiv = document.getElementById('resultados');
      resultadosDiv.innerHTML = '<p>Cargando datos de jugadores...</p>';
      
      // Array para almacenar los resultados
      const jugadores = [];
      
      // Procesar cada jugador
      for (const tag of playerTags) {
        const jugador = await obtenerJugador(tag);
        if (jugador) {
          // Extraer solo la información relevante
          jugadores.push({
            tag: jugador.tag,
            nombre: jugador.name,
            copas: jugador.trophies,
            copasMasAltas: jugador.highestTrophies,
            nivel: jugador.expLevel,
            club: jugador.club ? jugador.club.name : 'Sin club',
            victorias3vs3: jugador['3vs3Victories'],
            victoriasSolo: jugador.soloVictories,
            victoriasDuo: jugador.duoVictories,
            brawlersDesbloqueados: jugador.brawlers.length
          });
        }
      }
      
      // Ordenar por copas de forma descendente
      jugadores.sort((a, b) => b.copas - a.copas);
      
      // Mostrar resultados en formato de tabla
      mostrarTablaJugadores(jugadores);
      
    } catch (error) {
      console.error('Error al procesar jugadores:', error);
      const resultadosDiv = document.getElementById('resultados');
      resultadosDiv.innerHTML = `<p>Error al procesar jugadores: ${error.message}</p>`;
    }
  }
  
  // Función para mostrar los jugadores en una tabla HTML
  function mostrarTablaJugadores(jugadores) {
    const resultadosDiv = document.getElementById('resultados');
    
    // Si no hay jugadores
    if (jugadores.length === 0) {
      resultadosDiv.innerHTML = '<p>No se encontraron jugadores.</p>';
      return;
    }
    
    // Crear tabla
    let tablaHTML = `
      <table>
        <thead>
          <tr>
            <th>Posición</th>
            <th>Nombre</th>
            <th>Tag</th>
            <th>🏆 Copas</th>
            <th>🔝 Copas Máx</th>
            <th>Nivel</th>
            <th>Club</th>
            <th>3vs3</th>
            <th>Solo</th>
            <th>Dúo</th>
            <th>Brawlers</th>
          </tr>
        </thead>
        <tbody>
    `;
    
    // Añadir filas para cada jugador
    jugadores.forEach((jugador, index) => {
      tablaHTML += `
        <tr>
          <td>${index + 1}</td>
          <td>${jugador.nombre}</td>
          <td>${jugador.tag}</td>
          <td>${jugador.copas.toLocaleString()}</td>
          <td>${jugador.copasMasAltas.toLocaleString()}</td>
          <td>${jugador.nivel}</td>
          <td>${jugador.club}</td>
          <td>${jugador.victorias3vs3?.toLocaleString() || 0}</td>
          <td>${jugador.victoriasSolo?.toLocaleString() || 0}</td>
          <td>${jugador.victoriasDuo?.toLocaleString() || 0}</td>
          <td>${jugador.brawlersDesbloqueados}</td>
        </tr>
      `;
    });
    
    tablaHTML += `
        </tbody>
      </table>
    `;
    
    // Añadir estilos para la tabla
    tablaHTML += `
      <style>
        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
          font-family: Arial, sans-serif;
        }
        th, td {
          border: 1px solid #ddd;
          padding: 8px;
          text-align: center;
        }
        th {
          background-color: #4CAF50;
          color: white;
        }
        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
        tr:hover {
          background-color: #ddd;
        }
        tr:first-child {
          font-weight: bold;
          background-color: #ffeb3b;
        }
      </style>
    `;
    
    resultadosDiv.innerHTML = tablaHTML;
  }
  
  // Añadir un botón para procesar jugadores
  function agregarBotonProcesar() {
    const div = document.createElement('div');
    div.className = 'form-group';
    div.style.marginTop = '20px';
    
    const button = document.createElement('button');
    button.id = 'procesar-jugadores';
    button.textContent = 'Procesar Todos los Jugadores';
    button.addEventListener('click', procesarJugadores);
    
    div.appendChild(button);
    
    // Insertar antes del div de resultados
    const resultadosDiv = document.getElementById('resultados');
    resultadosDiv.parentNode.insertBefore(div, resultadosDiv);
  }
  
  // Ejecutar cuando se cargue la página
  document.addEventListener('DOMContentLoaded', () => {
    agregarBotonProcesar();
  });