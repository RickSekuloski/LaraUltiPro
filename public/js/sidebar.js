$(document).ready(function(){

    $(".sidebar").mouseover(function(){

        document.getElementById("leftSidebar").style.width="100%";
    });
    $(".sidebar").mouseout(function(){

        document.getElementById("leftSidebar").style.width="40%";
    });
});