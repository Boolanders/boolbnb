window.$ = window.jQuery = require('jquery');

$(document).ready(sponsorship);

function sponsorship(){
    
    $('.choose').on('click',function(){
        var id = $(this).data('id');

        var target = $('#promo-id');

        target.val(id);

        console.log($('input#promo-id').val());
    });
}