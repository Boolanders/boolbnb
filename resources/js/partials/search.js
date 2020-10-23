window.$ = window.jQuery = require('jquery');

$(document).ready(search)

function search() {

    autocomplete()
    sendRequestSearch()
}


function autocomplete() {

    var placesSearchAutocomplete = places({

        appId: 'pl9FR7QVJTYP',
        apiKey: '8240a6d46c9f2914027ee977cb8aeeb3',
        container: document.querySelector('#search')

    })

    placesSearchAutocomplete.on('change', function (e) {

        var latitude = e.suggestion.latlng.lat
        var longitude = e.suggestion.latlng.lng

    })

    return latitude, longitude
}

function sendRequestSearch(latitude, longitude) {

    var title = $('#search')
    var titleval = title.val()
    
    $.ajax({

        url: '/api/search/all',
        data: {
            'latitude' : latitude,
            'longitude': longitude,
            'address': titleval
        },
        method: 'GET',
        success: function(data) {

            var result = data['result']

            console.log(data);
        },
        error: function(err) {

            console.log('err', err);
        }

    })
}