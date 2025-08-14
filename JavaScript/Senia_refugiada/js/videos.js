const videoList = document.getElementById('video-list');
const videoPlayer = document.getElementById('video-player');
const videos = [
    { id: 1, title: 'Trailer de Minecraft 1', url: '../media/video/video1.mp4' },
    { id: 2, title: 'Trailer de Minecraft 2', url: '../media/video/video1.mp4' },
    { id: 3, title: 'Trailer de Minecraft 3', url: '../media/video/video1.mp4' }
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

    // Reproducir video al hacer clic
    li.addEventListener('click', () => {
        player.src = item.url;
        player.play();
        localStorage.setItem(type, item.url);

        // Detener otros videos si están reproduciéndose
        if (player !== event.target) {
            player.pause();
        }
    });

    list.appendChild(li);
}

// Cargar lista de videos
videos.forEach(video => createListItem(videoList, video, videoPlayer, 'lastVideo'));

// Reproducir el último video guardado
window.onload = () => {
    const lastVideo = localStorage.getItem('lastVideo');
    if (lastVideo) {
        videoPlayer.src = lastVideo;
    }
};