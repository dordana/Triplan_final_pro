/* global $ */


$(window).load(function(){
    var pageNmae = $("#pageName").text();
    $("li.active").removeClass("active");
    $("li").each(function() {
        if ($(this).text().indexOf(pageNmae) != -1){
            $(this).addClass("active");
        }
    });
});