window.$ = window.jQuery = require('jquery');

$(document).ready(messages);

function messages(){

    allRead()
}

function allRead(){

    $.ajax({
       url: '/allRead',
       method: 'GET',
       success: function(data){
           console.log(data);
       },
       error: function(err){
           console.log(err);
       }
    });
}
