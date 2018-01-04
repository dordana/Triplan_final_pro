/* global $ */

$(document).ready(function() {
    $(".sf-menu").children("li").click(function(){
        $(".active").removeClass("active");
        $(this).addClass("active");
    })
});

  
function submition(){
    if($('#checkbox').is(':checked'))
    {
        var selected = $("#genderselector").val();
        $("#gender").val(selected);
        var selected1 = $("#countryselector").val();
        $("#country").val(selected1);
        $("#formregister").submit();
    }else
    {
        $("#agreewarning").css("color","red");
        $('#agreewarning').css("font-weight","bold");
      
        var fade_out = function() {
          $("#agreewarning").css("color","");
          $('#agreewarning').css("font-weight","");
        }
        setTimeout(fade_out, 5000);
    }
}

$(document).ready(function() {
		$('.ui.checkbox').checkbox();

		$('.ui.bottom.attached.button').click(function() {
				var el = $(this);
				if (el.hasClass('loading')) {
						return;
				}
				el.addClass('loading');
				var time = Math.floor(Math.random() * 5000);
				setTimeout(function() {
						el.removeClass('loading');
				}, time);
		});


		$('.shape').shape();
});



$(".profile_click").click(function() {
  $(this).parent().find("input:file").click();
});

$('input:file', '.ui.action.input')
  .on('change', function(e) {
    var name = e.target.files[0].name;
    $('input:text', $(e.target).parent()).val(name);
  });