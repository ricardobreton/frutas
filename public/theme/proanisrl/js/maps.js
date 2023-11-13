var map = L.map('map').setView(coordenadas, 15);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.proanisrl.com" target="_blank">Oficinas ProAni</a>'
}).addTo(map);

map.on('click', onMapClick);
function onMapClick(click){
    console.log(click.latlng);
}

function centrarMarcador(map,coordenadas){
    map.setView(coordenadas, 15);
}

function aniadir_marcador(map, coordenadas, nombre_sucursal, direccion_sucursal){
    L.marker(coordenadas).addTo(map)
    .bindPopup(nombre_sucursal+'.<br>' + direccion_sucursal)
    .openPopup();
}
function limpiarMarcadores(map){
    map.clearLayers();
}
