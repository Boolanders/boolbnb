window.$ = window.jQuery = require('jquery');

$(document).ready(autocomplete) 



 function autocomplete() { 

    console.log('ciao')
    
    var placesAutocomplete = places({
        appId: 'pl9FR7QVJTYP',
        apiKey: '8240a6d46c9f2914027ee977cb8aeeb3',
        container: document.querySelector('#address-input')
    })

    
    
        placesAutocomplete.on('change', function (e) {
        
            var longitude = e.suggestion.latlng.lat
            $('#longitude').val(longitude);
            var latitude = e.suggestion.latlng.lng
            $('#latitude').val(latitude);

    })

 }