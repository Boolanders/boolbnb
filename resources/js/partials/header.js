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

        $( "#logo1" ).fadeOut()
        $("#logo2").show()
      }else {

        $( "#logo1" ).fadeIn()
        $("#logo2").hide()
      }
  })
}
