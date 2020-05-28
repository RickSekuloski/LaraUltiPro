$(document).ready(function(){

    $(".slide-toggle").click(function(evt){

        var id = $(this).attr('id');
        // alert(id);
        $('.'+id).animate({
            width:"toggle"
        });
    });
});