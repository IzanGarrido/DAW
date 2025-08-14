const player = document.getElementById('circle');
const waveInfo = document.getElementById('wave-info');
const upgradeInfo = document.getElementById('upgrade-info');
const upgradeCountDisplay = document.getElementById('upgrade-count');
let posX = window.innerWidth / 2 - 25;
let posY = window.innerHeight / 2 - 25;
let velX = 0, velY = 0;
const maxSpeed = 5;
const acceleration = 0.2;
const friction = 0.05;
const keys = { w: false, a: false, s: false, d: false };
const bullets = [];
const enemies = [];
let currentWave = 1;
let upgradePoints = 0;

// Manejar eventos de teclado
document.addEventListener('keydown', (event) => {
  if (keys.hasOwnProperty(event.key.toLowerCase())) {
    keys[event.key.toLowerCase()] = true;
  }
});

document.addEventListener('keyup', (event) => {
  if (keys.hasOwnProperty(event.key.toLowerCase())) {
    keys[event.key.toLowerCase()] = false;
  }
});

// Manejar eventos del ratón
document.addEventListener('mousemove', (event) => {
  const rect = player.getBoundingClientRect();
  const centerX = rect.left + rect.width / 2;
  const centerY = rect.top + rect.height / 2;
  const angle = Math.atan2(event.clientY - centerY, event.clientX - centerX);
  
  if (event.buttons === 1) { // Si el botón izquierdo del ratón está presionado
    shoot(angle);
  }
});

function movePlayer() {
  if (keys.w) velY = Math.max(velY - acceleration, -maxSpeed);
  if (keys.s) velY = Math.min(velY + acceleration, maxSpeed);
  if (keys.a) velX = Math.max(velX - acceleration, -maxSpeed);
  if (keys.d) velX = Math.min(velX + acceleration, maxSpeed);

  if (!keys.w && !keys.s) velY *= 1 - friction;
  if (!keys.a && !keys.d) velX *= 1 - friction;

  posX += velX;
  posY += velY;

  posX = Math.max(0, Math.min(posX, window.innerWidth - 50));
  posY = Math.max(0, Math.min(posY, window.innerHeight - 50));

  player.style.left = `${posX}px`;
  player.style.top = `${posY}px`;
}

function createEnemy() {
  const enemy = document.createElement('div');
  enemy.classList.add('enemy');
  enemy.style.left = `${Math.random() * window.innerWidth}px`;
  enemy.style.top = `${Math.random() * window.innerHeight}px`;
  document.body.appendChild(enemy);
  enemies.push(enemy);
}

function moveEnemies() {
  enemies.forEach((enemy, index) => {
    const enemyX = enemy.offsetLeft;
    const enemyY = enemy.offsetTop;

    const dx = posX - enemyX;
    const dy = posY - enemyY;
    const distance = Math.sqrt(dx * dx + dy * dy);

    const speed = 1.5;
    enemy.style.left = `${enemyX + (dx / distance) * speed}px`;
    enemy.style.top = `${enemyY + (dy / distance) * speed}px`;

    // Colisión con el jugador
    if (distance < 50) {
      alert('¡Has sido atrapado por un enemigo!');
      window.location.reload();
    }
  });
}

function shoot(angle) {
  const bullet = document.createElement('div');
  bullet.classList.add('bullet');
  bullet.style.left = `${posX + 20}px`;
  bullet.style.top = `${posY + 20}px`;
  document.body.appendChild(bullet);
  const bulletSpeed = 5; // Velocidad de la bala
  bullets.push({ element: bullet, velX: bulletSpeed * Math.cos(angle), velY: bulletSpeed * Math.sin(angle) });
}

function moveBullets() {
  bullets.forEach((bullet, index) => {
    const bulletX = bullet.element.offsetLeft;
    const bulletY = bullet.element.offsetTop;

    bullet.element.style.left = `${bulletX + bullet.velX}px`;
    bullet.element.style.top = `${bulletY + bullet.velY}px`;

    // Eliminar balas fuera de la pantalla
    if (bulletX < 0 || bulletX > window.innerWidth || bulletY < 0 || bulletY > window.innerHeight) {
      bullet.element.remove();
      bullets.splice(index, 1);
    }

    // Colisión con enemigos
    enemies.forEach((enemy, enemyIndex) => {
      const enemyX = enemy.offsetLeft;
      const enemyY = enemy.offsetTop;
      const distance = Math.sqrt((bulletX - enemyX) ** 2 + (bulletY - enemyY) ** 2);
      if (distance < 25) {
        enemy.remove();
        enemies.splice(enemyIndex, 1);
        bullet.element.remove();
        bullets.splice(index, 1);
        upgradePoints++; // Incrementar puntos de mejora
        updateUpgradeInfo();
      }
    });
  });
}

function updateUpgradeInfo() {
  upgradeCountDisplay.textContent = upgradePoints;
}

function nextWave() {
  currentWave++;
  waveInfo.textContent = `Oleada: ${currentWave}`;
  const enemiesToSpawn = currentWave * 2; // Aumentar la cantidad de enemigos cada ola
  for (let i = 0; i < enemiesToSpawn; i++) {
    createEnemy();
  }
}

// Iniciar la primera ola
nextWave();
setInterval(nextWave, 15000); // Nueva oleada cada 15 segundos

function gameLoop() {
  movePlayer();
  moveEnemies();
  moveBullets();
  requestAnimationFrame(gameLoop);
}

// Iniciar el juego
gameLoop();
