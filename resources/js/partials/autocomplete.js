window.$ = window.jQuery = require('jquery');

$(document).ready(autocomplete) 



 function autocomplete() { 

    
    

    var placesSearchAutocomplete = places({

        appId: 'pl9FR7QVJTYP',
        apiKey: '8240a6d46c9f2914027ee977cb8aeeb3',
        container: document.querySelector('#search-address-input')
        
    })
    
    

    placesSearchAutocomplete.on('change', function (e) {
        
        var latitude = e.suggestion.latlng.lat
        var longitude = e.suggestion.latlng.lng

        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
    })

 }