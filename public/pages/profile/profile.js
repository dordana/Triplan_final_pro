/* global $ */
$(document).ready(function() {
	$("#personal-tab").show();
	$("#other-tab").hide();
	$("#add-tab").hide();
	$(".add-tab").click(function (){
		$(".personal-tab").removeClass("current");
		$(".other-tab").removeClass("current");
		$(this).addClass("current");
		$("#personal-tab").hide();
		$("#other-tab").hide();
		$("#add-tab").show();
	})
	$(".personal-tab").click(function (){
		$(".add-tab").removeClass("current");
		$(".other-tab").removeClass("current");
		$(this).addClass("current");
		$("#personal-tab").show();
		$("#other-tab").hide();
		$("#add-tab").hide();
	})
	$(".other-tab").click(function (){
		$(".add-tab").removeClass("current");
		$(".personal-tab").removeClass("current");
		$(this).addClass("current");
		$("#personal-tab").hide();
		$("#other-tab").show();
		$("#add-tab").hide();
	})
	
	
	
	
var inputAddphoto = '<div class="upload-photo">Choose a new picture</div>',
    inputphoto = $('#id_photo');

inputphoto.before(inputAddphoto);

$('.upload-photo').click(function() {
	$(this).empty();
    $(this).siblings('#id_photo').trigger('click');
});

inputphoto.on('change', function(){
    var input = $(this),
        reader = new FileReader();

    reader.onload = function (e) {
        input.siblings('.upload-photo').css('background-image', 'url(' + e.target.result + ')');
        input.siblings('.upload-photo').css('background-size', 'cover');
    };

    reader.readAsDataURL(this.files[0]);
});
	
	
});
