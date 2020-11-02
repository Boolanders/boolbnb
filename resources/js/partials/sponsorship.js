window.$ = window.jQuery = require('jquery');

$(document).ready(sponsorship);

function sponsorship(){
    
    $('.choose').on('click', choosePromotion);
}

function choosePromotion(){

    // mostro graficamente quale promozione è stata scelta
    $('.card.promo').removeClass('fixed-hover');
        
    $(this).parents('.card.promo').addClass('fixed-hover');
    

    // valorizzo l'input nascosto con l'id della promozione selezionata
    var id = $(this).data('id');

    var targetId = $('#promo_id');
    
    targetId.val(id);

    // stampo la card con i dettagli dell'ordine
    
    var targetPrice = $('#details-price');

    var targetDate = $('#details-ending');

    var price = $(this).parents('.promo').data('price');
    var hours = $(this).parents('.promo').data('hours');
    
    var endDate = getEndDate(hours)
    
    targetPrice.text(price);

    targetDate.text(endDate);

    $('#order-container').removeClass('d-none');
}


function getEndDate(hours){

    var startDate = $('#start_date').val();

    var endDate = new Date(startDate);

    endDate.setHours( endDate.getHours() + hours );

    var formattedEndDate =  appendLeadingZeroes(endDate.getDate()) + "/" +  appendLeadingZeroes(endDate.getMonth() + 1) + "/" + endDate.getFullYear() + " " +  appendLeadingZeroes(endDate.getHours()) + ":" +  appendLeadingZeroes(endDate.getMinutes());
       
    return formattedEndDate;
}

function appendLeadingZeroes(n){
    if(n <= 9){
      return "0" + n;
    }
    return n;
};