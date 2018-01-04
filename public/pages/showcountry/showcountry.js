/* global $ */
(function(window, $, undefined) {

	var conf = {
		center: true,
		backgroundControl: false
	};

	var cache = {
		$carouselContainer: $('.thumbnails-carousel').parent(),
		$thumbnailsLi: $('.thumbnails-carousel li'),
		$controls: $('.thumbnails-carousel').parent().find('.carousel-control')
	};

	function init() {
		cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
		cache.$thumbnailsLi.first().addClass('active-thumbnail');

		if(!conf.backgroundControl) {
			cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
		}
		else {
			cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
		}

		if(conf.center) {
			cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
		}
	}

	function refreshOpacities(domEl) {
		cache.$thumbnailsLi.removeClass('active-thumbnail');
		cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
	}	

	function bindUiActions() {
		cache.$carouselContainer.on('slide.bs.carousel', function(e) {
  			refreshOpacities(e.relatedTarget);
		});

		cache.$thumbnailsLi.click(function(){
			cache.$carouselContainer.carousel($(this).index());
		});
	}

	$.fn.thumbnailsCarousel = function(options) {
		conf = $.extend(conf, options);

		init();
		bindUiActions();

		return this;
	}

})(window, jQuery);

$('.thumbnails-carousel').thumbnailsCarousel();
//# sourceURL=pen.js



$( ".header-dropdown-trigger" ).click(function() {
  $( this ).toggleClass( "active" );
  $( ".header-dropdown" ).toggleClass( "expand" );
});

$( ".header-dropdown li" ).click(function() {
  $( ".header-dropdown-trigger" ).removeClass( "active" );
  $( ".header-dropdown" ).removeClass( "expand" );
});

$( ".button--approve" ).click(function() {
  $( this ).toggleClass( "active" );
  $( this ).siblings( '.button--deny' ).removeClass( "active" );
});

$( ".button--deny" ).click(function() {
  $( this ).toggleClass( "active" );
  $( this ).siblings( '.button--approve' ).removeClass( "active" );
});

$( ".comment-trigger" ).click(function() {
  $( this ).parent().parent().toggleClass( "post--commenting" );
});

$( ".button--flag" ).click(function() {
  $( this ).parent().parent().toggleClass( "post--commenting" );
});


$( ".button--confirm" ).click(function() {
  $( this ).parent().parent().parent().parent().parent().toggleClass( "post--commenting" );
});

$( ".button.cancel" ).click(function() {
  $( this ).parent().parent().parent().parent().parent().toggleClass( "post--commenting" );
});