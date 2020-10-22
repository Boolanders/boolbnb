window.$ = window.jQuery = require('jquery');

$(document).ready(create) 


function create() {

    var placesCreateAutocomplete = places({
    
        appId: 'pl9FR7QVJTYP',
        apiKey: '8240a6d46c9f2914027ee977cb8aeeb3',
        container: document.querySelector('#address-input')
        
    })
    
    placesCreateAutocomplete.on('change', function (e) {
            
        var latitude = e.suggestion.latlng.lat
        var longitude = e.suggestion.latlng.lng
    
        $('#longitude').val(longitude);
        $('#latitude').val(latitude);
    })
}
