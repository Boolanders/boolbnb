window.$ = window.jQuery = require('jquery');

$(document).ready(profile);

function profile(){

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

        var usrId = $(this).data('usrid');

        var aptId = $(this).data('aptid');

        $.ajax({
            url: '/setVisibility',
            method: 'GET',
            data:{
                'usrId': usrId,
                'aptId': aptId,
                'visible': visible,
            },
            success: function(data){
                console.log(data);
            },
            error:function(err){
                console.log(err);
                alert("Can't change visibility. Try again");
                location.reload();
            }
        });


    });
}
