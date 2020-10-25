window.$ = window.jQuery = require('jquery');

$(document).ready(search)

function search() {

    autocomplete()
    //sendRequestSearch()
    distanceSlider();
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

        return latitude, longitude
    })

}

function sendRequestSearch() {

    var title = $('#search')
    var titleval = title.val()
    
    $.ajax({

        url: '/api/search',
        data: {
            'latitude' : latitude,
            'longitude': longitude
        },
        method: 'GET',
        success: function(data) {

            var target = $('#apts')
            target.html('')

            for (var i = 0; i < data.length; i++) {

                var post = data[i]
                var html = "<li>" + post.title + " " + "</li>" + "<br>" + "<li>" + post.description + " " + "</li>" + "<br>" + "<li>" + post.address + " " + "</li>" + "<br>"
                target.append(html)
           }

            console.log(data);
        },
        error: function(err) {

            console.log('err', err);
        }

    })
}

function distanceSlider(){

    var $valueSpan = $('.valueSpan');
    var $value = $('#distance');
    $valueSpan.html($value.val());

    $value.on('input change', function() {
        console.log($value.val());
        $valueSpan.html($value.val());
    });
}