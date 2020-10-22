window.$ = window.jQuery = require('jquery');

$(document).ready(init);

function init(){

    addDeleteBtnListener();

    addSwitchVisibilityListener();
}

function addDeleteBtnListener(){

    $('#deleteModal').on('show.bs.modal', function (e) {

        var href = '/delete/' + $(e.relatedTarget).attr('data-id');

        var title = $(e.relatedTarget).attr('data-title');


        var target = $('#deleteModal');

        target.find('#apt-title').text(title);

        target.find('#confirm-delete-btn').attr('href', href);
      });
}

function addSwitchVisibilityListener() {

    var target = $('.visibilitySwitch');

    target.change(function(){

        
        var visible = 0;
        
        if($(this).is(':checked')){
            visible = 1;
        }

        $(this).next('.hidden-data-keeper').val(visible);

        $(this).parent('form').submit();


    });
}
