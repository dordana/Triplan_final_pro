/* global $ */

$(document).ready(function() {
    
        $(".facebook").click(() =>{
            document.location.href="/auth/facebook"
        })
        $(".twitter").click(() =>{
            document.location.href="/auth/twitter"
        })
        $(".google").click(() =>{
            document.location.href="/auth/google"
        })
		$('.ui.checkbox')
				.checkbox();

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

var fade_out = function() {
  $("span.help-block").delay(3200).fadeOut(300);
}
setTimeout(fade_out, 5000);
