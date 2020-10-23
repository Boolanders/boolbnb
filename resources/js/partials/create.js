window.$ = window.jQuery = require('jquery');

$(document).ready(create) 


function create() {

    placesCreateAutocomplete();
    frontEndValidation();
    
}

function placesCreateAutocomplete(){

    var placesCreateAutocomplete = places({
    
        appId: 'pl9FR7QVJTYP',
        apiKey: '8240a6d46c9f2914027ee977cb8aeeb3',
        container: document.querySelector('#address-input')
        
    });
    
    placesCreateAutocomplete.on('change', function (e) {
            
        var latitude = e.suggestion.latlng.lat
        var longitude = e.suggestion.latlng.lng
    
        $('#longitude').val(longitude);
        $('#latitude').val(latitude);
    });

}

function frontEndValidation(){

    $('input').change(checkinput);
    $('input').keyup(checkinput);
    $('textarea').keyup(checkinput);
    $('textarea').change(checkinput);
}

function checkinput() {

    if($(this).attr('type') == 'file'){

        checkImages(this);
       
    } else {

        checkNotImagesInput(this);
    }
   
}

function checkNotImagesInput(value){


    if($(value).is('#address-input')){

        var target = $('.address.validity');

    } else {

        var target = $(value).next('.validity');
    }


    if($(value).val() == 0){

        target.removeClass('text-success text-danger');
        target.addClass('text-muted');

    } else{
        
        var val = value.checkValidity();

        if(!val){

            target.removeClass('text-success text-muted');
            target.addClass('text-danger');

        } else {

            target.removeClass('text-danger text-muted');
            target.addClass('text-success');

        }
    }

}

function checkImages(value){

    var target = $(value).next('.validity');

    if(value.files.length == 0){

        target.removeClass('text-success text-danger');
        target.addClass('text-muted'); 
        $('#create-submit').prop("disabled",false); 

    } else if(value.files.length > 5){

        target.removeClass('text-success text-muted');
        target.addClass('text-danger');
        $('#create-submit').prop("disabled",true);

    } else {

        var tooBig = false;

        var acceptedType = [
            "image/apng",
            "image/bmp",
            "image/gif",
            "image/jpeg",
            "image/pjpeg",
            "image/png",
            "image/svg+xml",
            "image/tiff",
            "image/webp",
            "image/x-icon"
          ];

        var wrongType = false;



        for (var i = 0; i < value.files.length; i++) {
            
           if(value.files[i].size > 2097152) {

               tooBig = true;
            }

            if(!acceptedType.includes(value.files[i].type)){

                wrongType = true
            }
        }

        
        if(tooBig == true || wrongType == true){

            target.removeClass('text-success text-muted');
            target.addClass('text-danger');
            $('#create-submit').prop("disabled",true);

        } else {

            target.removeClass('text-danger text-muted');
            target.addClass('text-success');
            $('#create-submit').prop("disabled",false);
        }

    }
}
