window.$ = window.jQuery = require('jquery');

$(document).ready(header) 


function header() {

    headerFunciton()
    scrollLogo()
}


function headerFunciton() {


        // Toggle nav menu
        $(document).on('click', '.nav-toggle', function(e) {
          $('.nav-menu').toggleClass('nav-menu-active');
          $('.nav-toggle').toggleClass('nav-toggle-active');
          $('.nav-toggle i').toggleClass('fa-times');
          $('#hamburger-dot').toggle();
      
        });
      

}

function scrollLogo() {

    $( window ).scroll(function() {

      if($(window).scrollTop() > 10) {

        $( "#logo2" ).fadeOut()
        
      }else {

        $( "#logo2" ).fadeIn()   
      }
  })
}
