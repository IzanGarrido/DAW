const audioList = document.getElementById('audio-list');
const audioPlayer = document.getElementById('audio-player');
const audios = [
    { id: 1, title: 'Canción de Minecraft 1', url: '../media/audio/audio1.mp3' },
    { id: 2, title: 'Canción de Minecraft 2', url: '../media/audio/audio2.mp3' },
    { id: 3, title: 'Canción de Minecraft 3', url: '../media/audio/audio3.mp3' }
];

function createListItem(list, item, player, type) {
    const li = document.createElement('li');
    li.textContent = item.title;
    li.dataset.url = item.url;

    // Añade animación al hacer hover
    li.addEventListener('mouseenter', () => {
        li.style.transform = 'scale(1.1)';
    });
    li.addEventListener('mouseleave', () => {
        li.style.transform = 'scale(1)';
    });

    // Reproducir audio al hacer clic
    li.addEventListener('click', () => {
        player.src = item.url;
        player.play();
        localStorage.setItem(type, item.url);

        // Detener otros audios si están reproduciéndose
        if (player !== event.target) {
            player.pause();
        }
    });

    list.appendChild(li);
}

// Cargar lista de audios
audios.forEach(audio => createListItem(audioList, audio, audioPlayer, 'lastAudio'));

// Reproducir el último audio guardado
window.onload = () => {
    const lastAudio = localStorage.getItem('lastAudio');
    if (lastAudio) {
        audioPlayer.src = lastAudio;
    }
};

document.getElementById('pause-all').addEventListener('click', () => {
    audioPlayer.pause();
});