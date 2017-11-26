<script type="text/javascript" src="{!! asset('js/parallax-slider/modernizr.custom.28468.js') !!}"></script>
<script src="{!! asset('js/jquery-1.8.3.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/hover-dropdown.js') !!}"></script>
<script defer src="{!! asset('js/jquery.flexslider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/bxslider/jquery.bxslider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.parallax-1.1.3.js') !!}"></script>
<script src="{!! asset('js/wow.min.js') !!}"></script>
<script src="{!! asset('assets/owlcarousel/owl.carousel.js') !!}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.min.js"></script>
<script src="{!! asset('js/jquery.easing.min.js') !!}"></script>
<script src="{!! asset('js/link-hover.js') !!}"></script>
<script src="{!! asset('js/superfish.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/parallax-slider/jquery.cslider.js') !!}"></script>
<script type="text/javascript">

$(function() {

$('#da-slider').cslider({
  autoplay    : true,
  bgincrement : 100
});

});
</script>



<!--common script for all pages-->
<script src="js/common-scripts.js">
</script>

<script type="text/javascript">
jQuery(document).ready(function() {


$('.bxslider1').bxSlider({
  minSlides: 5,
  maxSlides: 6,
  slideWidth: 360,
  slideMargin: 2,
  moveSlides: 1,
  responsive: true,
  nextSelector: '#slider-next',
  prevSelector: '#slider-prev',
  nextText: 'Onward →',
  prevText: '← Go back'
});

});


</script>


<script>
$('a.info').tooltip();

$(window).load(function() {
$('.flexslider').flexslider({
  animation: "slide",
  start: function(slider) {
    $('body').removeClass('loading');
  }
});
});

$(document).ready(function() {

$("#owl-demo").owlCarousel({

  items : 4

});

});

jQuery(document).ready(function(){
jQuery('ul.superfish').superfish();
});

new WOW().init();


</script>
