monscript.js
//Ma carte
const mapContainer = document.getElementById('map-container');
const toggleButton = document.getElementById('toggle-map');

// Initialisation de la carte avec interactions désactivées
const map = L.map('map', {
    center: [48.8566, 2.3522], // Paris par défaut
    zoom: 6,
    scrollWheelZoom: false,
    dragging: false,
    touchZoom: false,
    doubleClickZoom: false,
    boxZoom: false
});

L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap France contributors'
}).addTo(map);

L.marker([48.8566, 2.3522]).addTo(map)
    .bindPopup("Je suis ici !").openPopup();

// Toggle bouton
toggleButton.addEventListener('click', () => {
    if (!mapContainer.classList.contains('expanded')) {
        mapContainer.classList.add('expanded');
        toggleButton.textContent = "Réduire la carte";

        // Activer les interactions
        map.scrollWheelZoom.enable();
        map.dragging.enable();
        map.touchZoom.enable();
        map.doubleClickZoom.enable();
        map.boxZoom.enable();
    } else {
        mapContainer.classList.remove('expanded');
        toggleButton.textContent = "Déployer la carte";

        // Désactiver les interactions
        map.scrollWheelZoom.disable();
        map.dragging.disable();
        map.touchZoom.disable();
        map.doubleClickZoom.disable();
        map.boxZoom.disable();
    }

    setTimeout(() => {
        map.invalidateSize();
    }, 500);
});