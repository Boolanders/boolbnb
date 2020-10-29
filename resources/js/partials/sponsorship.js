window.$ = window.jQuery = require('jquery');

$(document).ready(sponsorship);

function sponsorship(){
    
    $('.choose').on('click',function(){

        var id = $(this).data('id');

        $('.card.promo').removeClass('fixed-hover');

        $(this).parents('.card.promo').addClass('fixed-hover');

        var targetId = $('#promo-id');

        targetId.val(id);
        
        var targetPrice = $('#details-price');

        var targetDate = $('#details-ending');

        var price = $(this).parents('.promo').data('price');

        var hours = $(this).parents('.promo').data('hours');

        
        var endDate = new Date();

        endDate.setHours( endDate.getHours() + hours );

        var formattedEndDate =  appendLeadingZeroes(endDate.getDate()) + "/" +  appendLeadingZeroes(endDate.getMonth() + 1) + "/" + endDate.getFullYear() + " " +  appendLeadingZeroes(endDate.getHours()) + ":" +  appendLeadingZeroes(endDate.getMinutes());
        
        targetPrice.text(price);
        targetDate.text(formattedEndDate);

        $('#order-container').removeClass('d-none');
        
    });
}

function appendLeadingZeroes(n){
    if(n <= 9){
      return "0" + n;
    }
    return n;
};