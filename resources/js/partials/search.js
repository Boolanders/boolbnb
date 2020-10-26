window.$ = window.jQuery = require('jquery');

const Handlebars = require("handlebars");

$(document).ready(search)

function search() {

    autocomplete()
    //sendRequestSearch()
    distanceSlider();

    addSearchButtonListener();
    addShowListener();
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

        $('#latitude').data('number', latitude);
        $('#longitude').data('number', longitude);
    })

}

function addSearchButtonListener(){

    $('#search-button').click(sendRequestSearch);
}

function sendRequestSearch() {

   var lat = $('#latitude').data('number');
   var lon = $('#longitude').data('number');

   var dist = $('#distance').val();

   var services = [];

    $("input[name='service[]']:checked").each(function (){

        services.push($(this).val());

    });
    
    srvs = services.join();

   var rooms = $('#rooms').val();
   var beds = $('#beds').val();

    
    $.ajax({

        url: '/api/search',
        data: {
            'lat' : lat,
            'lon': lon,
            'dist': dist,
            'srvs': srvs,
            'rooms': rooms,
            'beds': beds
        },
        method: 'GET',
        success: function(data) {
            
            if(data.length == 0){

                $('#sponsored').html("no results");
                $('#standard').html('');
            } else {

                printCards(data);
            }

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
        
        $valueSpan.html($value.val());
    });
}

function printCards(data){

    var targetSponsored = $('#sponsored');
    var targetStandard = $('#standard');

    targetSponsored.html('');
    targetStandard.html('');
   
    var template = $('#apt-template').html()

    var compiled = Handlebars.compile(template);

    $.each(data, function(index, apt){

        if(apt['sponsorship'][0] == true){

            var target = targetSponsored;
        } else {

            var target = targetStandard;
        }

        var html = compiled(apt);

        target.append(html);

    });
}

function addShowListener(){

   $(document).on('click', '.show-apt-link', function(){
       
       var id = $(this).data('id');
       window.location.href = "/show/" + id;
   });

}