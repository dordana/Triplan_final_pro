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
$('.unmask').on('click', function(){  
  if($(this).prev('input').attr('type') == 'password')
    $(this).prev('input').prop('type', 'text');  
  else
    $(this).prev('input').prop('type', 'password');  
  return false;
});
//Begin supreme heuristics 
$('.password').on('keyup',function (){
  var p_c = $('#p-c');
  var p = $('#p');
  console.log(p.val() + p_c.val());
 if(p.val().length > 0){
  if(p.val() != p_c.val()) {
    $('#valid').html("Passwords Don't Match");
  } else {
     $('#valid').html('');  
  }
    var s = 'weak'
if(p.val().length > 5 && p.val().match(/\d+/g))
  s = 'medium';
if(p.val().length > 6 && p.val().match(/[^\w\s]/gi))
  s = 'strong';   
   $('#strong span').addClass(s).html(s);
  }
});
