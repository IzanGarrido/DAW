// server.js - Servidor proxy para la API de Brawl Stars

const express = require('express');
const cors = require('cors');
const axios = require('axios');
const app = express();
const PORT = 3000;

// Habilitar CORS para todas las rutas
app.use(cors());

// Middleware para parsear JSON
app.use(express.json());

// Ruta para obtener datos de jugador
app.get('/api/player/:playerTag', async (req, res) => {
  try {
    const playerTag = req.params.playerTag;
    const apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImQzNDY4NGZiLWFlNGMtNGMzYi05NTMyLTg1ZDU2M2MyYzE2OCIsImlhdCI6MTc0MDcwMjY2Miwic3ViIjoiZGV2ZWxvcGVyLzYxMzdlNmRlLWExZWItYmFiNy03ZTZjLWI2YTcxNWVmOGIxZCIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiNzkuMTE2LjIwOS41NiJdLCJ0eXBlIjoiY2xpZW50In1dfQ.Fm3eXa3BjgHtKp_O83HvRJuRk6ZO05eJJXNsouJeNI2sl5q_5kUWjkNlW7xutz4ufGot-RtvYKUvLuWLcRGodA'; // IMPORTANTE: Reemplaza con tu clave API de Brawl Stars
    
    const response = await axios.get(`https://api.brawlstars.com/v1/players/%23${playerTag}`, {
      headers: {
        'Authorization': `Bearer ${apiKey}`,
        'Accept': 'application/json'
      }
    });
    
    res.json(response.data);
  } catch (error) {
    console.error('Error:', error.response ? error.response.data : error.message);
    res.status(error.response ? error.response.status : 500).json({
      error: error.response ? error.response.data : error.message
    });
  }
});

// Ruta para obtener batallas de un jugador
app.get('/api/player/:playerTag/battlelog', async (req, res) => {
  try {
    const playerTag = req.params.playerTag;
    const apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImQzNDY4NGZiLWFlNGMtNGMzYi05NTMyLTg1ZDU2M2MyYzE2OCIsImlhdCI6MTc0MDcwMjY2Miwic3ViIjoiZGV2ZWxvcGVyLzYxMzdlNmRlLWExZWItYmFiNy03ZTZjLWI2YTcxNWVmOGIxZCIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiNzkuMTE2LjIwOS41NiJdLCJ0eXBlIjoiY2xpZW50In1dfQ.Fm3eXa3BjgHtKp_O83HvRJuRk6ZO05eJJXNsouJeNI2sl5q_5kUWjkNlW7xutz4ufGot-RtvYKUvLuWLcRGodA'; // IMPORTANTE: Reemplaza con tu clave API de Brawl Stars
    
    const response = await axios.get(`https://api.brawlstars.com/v1/players/%23${playerTag}/battlelog`, {
      headers: {
        'Authorization': `Bearer ${apiKey}`,
        'Accept': 'application/json'
      }
    });
    
    res.json(response.data);
  } catch (error) {
    console.error('Error:', error.response ? error.response.data : error.message);
    res.status(error.response ? error.response.status : 500).json({
      error: error.response ? error.response.data : error.message
    });
  }
});

// Ruta para obtener información de un club
app.get('/api/club/:clubTag', async (req, res) => {
  try {
    const clubTag = req.params.clubTag;
    const apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImQzNDY4NGZiLWFlNGMtNGMzYi05NTMyLTg1ZDU2M2MyYzE2OCIsImlhdCI6MTc0MDcwMjY2Miwic3ViIjoiZGV2ZWxvcGVyLzYxMzdlNmRlLWExZWItYmFiNy03ZTZjLWI2YTcxNWVmOGIxZCIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiNzkuMTE2LjIwOS41NiJdLCJ0eXBlIjoiY2xpZW50In1dfQ.Fm3eXa3BjgHtKp_O83HvRJuRk6ZO05eJJXNsouJeNI2sl5q_5kUWjkNlW7xutz4ufGot-RtvYKUvLuWLcRGodA'; // IMPORTANTE: Reemplaza con tu clave API de Brawl Stars
    
    const response = await axios.get(`https://api.brawlstars.com/v1/clubs/%23${clubTag}`, {
      headers: {
        'Authorization': `Bearer ${apiKey}`,
        'Accept': 'application/json'
      }
    });
    
    res.json(response.data);
  } catch (error) {
    console.error('Error:', error.response ? error.response.data : error.message);
    res.status(error.response ? error.response.status : 500).json({
      error: error.response ? error.response.data : error.message
    });
  }
});

// Ruta para obtener la lista de brawlers
app.get('/api/brawlers', async (req, res) => {
  try {
    const apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImQzNDY4NGZiLWFlNGMtNGMzYi05NTMyLTg1ZDU2M2MyYzE2OCIsImlhdCI6MTc0MDcwMjY2Miwic3ViIjoiZGV2ZWxvcGVyLzYxMzdlNmRlLWExZWItYmFiNy03ZTZjLWI2YTcxNWVmOGIxZCIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiNzkuMTE2LjIwOS41NiJdLCJ0eXBlIjoiY2xpZW50In1dfQ.Fm3eXa3BjgHtKp_O83HvRJuRk6ZO05eJJXNsouJeNI2sl5q_5kUWjkNlW7xutz4ufGot-RtvYKUvLuWLcRGodA'; // IMPORTANTE: Reemplaza con tu clave API de Brawl Stars
    
    const response = await axios.get('https://api.brawlstars.com/v1/brawlers', {
      headers: {
        'Authorization': `Bearer ${apiKey}`,
        'Accept': 'application/json'
      }
    });
    
    res.json(response.data);
  } catch (error) {
    console.error('Error:', error.response ? error.response.data : error.message);
    res.status(error.response ? error.response.status : 500).json({
      error: error.response ? error.response.data : error.message
    });
  }
});

// Iniciar el servidor
app.listen(PORT, () => {
  console.log(`Servidor proxy para API de Brawl Stars ejecutándose en http://localhost:${PORT}`);
});