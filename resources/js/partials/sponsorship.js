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
    
    var endDate = getEndDate(hours);
    
    targetPrice.text(price);

    targetDate.text(endDate);

    $('#order-container').removeClass('d-none');
}


// questa funzione prende la start date (che è stampata in un input nascosto e può essere oggi o la fine della sponsorizzazione ancora attiva) e ci somma le ore della promozione selezionata restituendo la data di fine della promozione scelta
function getEndDate(hours){

    var startDate = $('#start_date').val();

    var endDate = new Date(startDate); // trasforma la stinga in un istanza dell'oggetto Date in modo da poter usare i metodi getMonth e così

    endDate.setHours( endDate.getHours() + hours ); // aggiungo le ore

    // formattedEndDate compone una stringa con la data bella da visualizzare a schermo
    var formattedEndDate =  appendLeadingZeroes(endDate.getDate()) + "/" +  appendLeadingZeroes(endDate.getMonth() + 1) + "/" + endDate.getFullYear() + " " +  appendLeadingZeroes(endDate.getHours()) + ":" +  appendLeadingZeroes(endDate.getMinutes());
       
    return formattedEndDate;
}

// questa funzione aggiunge uno zero davanti a un numero < 9. la uso per avere date 01/05/2020 invece di 1/5/2020
function appendLeadingZeroes(n){
    if(n <= 9){
      return "0" + n;
    }
    return n;
};