window.$ = window.jQuery = require('jquery');

$(document).ready(iniz)

function iniz() {

    map()
}
        
function map() { 

    var lat = $('#lat-secrt').data('number')
    var long = $('#log-secrt').data('number')

    mapboxgl.accessToken = 'pk.eyJ1IjoiYW1vc2dpdG8iLCJhIjoiY2tnamdtOG94MHZnZzJ4cW5vY2t5aXhzMiJ9.SFoX4ECpx8qVIgtK9D8hfg';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [long, lat], // starting position [lng, lat]
        zoom: 9 // starting zoom
    })

    var marker = new mapboxgl.Marker()
                .setLngLat([long, lat])
                .addTo(map);

}