/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.$ = require('jquery')

require('./bootstrap')
require('partials/davide')
require('partials/michael')
require('partials/michele')
require('partials/vincenzo')

$(document).ready(init) 



 function init() { 

    console.log('ciao')
    
    var placesAutocomplete = places({
        appId: 'pl9FR7QVJTYP',
        apiKey: '8240a6d46c9f2914027ee977cb8aeeb3',
        container: document.querySelector('#address-input')
    })

    
    
        placesAutocomplete.on('change', function (e) {
        
            var longitude = e.suggestion.latlng.lat
            // document.getElementById('longitude').longitude
            var latitude = e.suggestion.latlng.lng
            // document.getElementById('latitude').latitude
    })

 }
    
 function map() { 

    mapboxgl.accessToken = 'pk.eyJ1IjoiYW1vc2dpdG8iLCJhIjoiY2tnamdtOG94MHZnZzJ4cW5vY2t5aXhzMiJ9.SFoX4ECpx8qVIgtK9D8hfg';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [-74.5, 40], // starting position [lng, lat]
        zoom: 9 // starting zoom
    });
}






































window.Vue = require('vue')

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
})


// mapboxgl.accessToken = 'pk.eyJ1IjoiYW1vc2dpdG8iLCJhIjoiY2tnamdtOG94MHZnZzJ4cW5vY2t5aXhzMiJ9.SFoX4ECpx8qVIgtK9D8hfg';
// var map = new mapboxgl.Map({
//     container: 'map',
//     style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
//     center: [-74.5, 40], // starting position [lng, lat]
//     zoom: 9 // starting zoom
// });



