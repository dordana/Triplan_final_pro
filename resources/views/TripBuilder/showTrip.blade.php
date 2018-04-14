<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Google Map - Path Optimization</title>
    <script src="/scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="/scripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="/scripts/ie10-viewport-bug-workaround.js" type="text/javascript"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYUrj824we7Ae73T3khwyy_epnUlgudSM&libraries=places"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <script type="text/javascript" src="/scripts/googleMap.js"></script>
    
    <style type="text/css">
      #googleMap{
        height: 100%;
        width: 100%;
        left: 0;
        position: absolute;
        top: 0;   
        z-index: -1;
      }
.carousel {
  display: block;
  position: absolute;
  -webkit-transform: translateZ(0);
  /*  for demo only */
  top: 0;
  right: 0;
  bottom: -75%;
  left: 0;
  width: 75%;
  height: 150px !important;
  margin: auto;
  font-size: 0;
  padding: 8px;
  border-radius: 6px;
  box-shadow: 0 4px 10px #000;
  /********************/
  -webkit-overflow-scrolling: touch;
  /* for tablets */
}
.touch .carousel {
  overflow: auto;
}
.carousel:before, .carousel:after {
  content: '';
  opacity: 0;
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: 2;
  width: 50px;
  font-size: 80px;
  line-height: 190px;
  font-family: arial;
  color: #555;
  font-weight: bold;
  pointer-events: none;
  transition: 0.2s ease-out;
}
.carousel:before {
  content: '\2039';
  left: 0;
  text-align: left;
  text-indent: -20px;
}
.carousel:after {
  content: '\203A';
  right: 0;
  text-align: right;
  text-indent: 40px;
}
.carousel.right:after, .carousel.left:before {
  opacity: 1;
}
.carousel.right:after {
  right: 0;
  text-indent: 60px;
}
.carousel.left:before {
  left: 0;
  text-indent: -40px;
}
.carousel.right:before {
  right: 0;
  text-indent: -40px;
}
.carousel > a {
  position: absolute;
  margin: 0;
  top: 0;
  bottom: 0;
  color: #CCC;
  font-size: 1.5em;
  transition: 0.1s;
}
.carousel > a:hover {
  color: #FFF;
}
.carousel > a.prev {
  left: -20px;
}
.carousel > a.next {
  right: -20px;
}
.carousel > .indicator {
  pointer-events: none;
  position: absolute;
  z-index: 4;
  bottom: 0;
  left: 0;
  height: 4px;
  border-radius: 10px;
  opacity: 0;
  transition: opacity 0.2s, bottom 0.2s;
}
.carousel:hover > .indicator {
  opacity: 1;
  bottom: -10px;
}
.carousel > .wrap {
  overflow: hidden;
  border-radius: 5px;
  padding: 0px;
}
.carousel > .wrap > ul {
  list-style: none;
  white-space: nowrap;
  height: 150px;
  margin: 0px;
   padding: 0px;
}
.carousel > .wrap > ul > li {
  display: inline-block;
  vertical-align: middle;
  height: 100%;
  margin: 0 0 0 5px;
  position: relative;
  overflow: hidden;
  transition: 0.25s ease-out;
}
.carousel > .wrap > ul > li:first-child {
  margin: 0;
}
.carousel > .wrap > ul > li > img {
  display: block;
  height: 100%;
  margin: auto;
  vertical-align: bottom;
  position: relative;
  z-index: 1;
  transition: 1s ease;
}
img{
  width: 225px;
}
    </style>
</head>

<body>
  <div id="googleMap"></div>
  <h1>{{count($attractionList)}}</h1>
<div class="carousel right">
  <div class="indicator"></div>
  <div class="wrap">
    <ul>
      @foreach($attractionList as $attrDate)
        <li>
          <img src="http://ppcdn.500px.org/23718959/f216a69d1cb7667436a1e6a33c7e4b2894d0fe18/4.jpg"/>
          <h3>djshf</h3>
        </li>
      @endforeach
    </ul>
  </div>
</div>
</body>
<script type="text/javascript">

var num_of_days = parseInt('{!!$num_of_days!!}');
alert(num_of_days);

if(num_of_days == 1){
  $(".carousel").css("width","14%" )
}else if(num_of_days == 2){
  $(".carousel").css("width","29%" )
}else if(num_of_days == 3){
  $(".carousel").css("width","43.6%" )
}else if(num_of_days == 4){
  $(".carousel").css("width","58%" )
}else{
  $(".carousel").css("width","65%" )
}









;(function($){
    "use strict";

    var bindToClass      = 'carousel',
        containerWidth   = 0,
        scrollWidth      = 0,
        posFromLeft      = 0,    // Stripe position from the left of the screen
        stripePos        = 0,    // When relative mouse position inside the thumbs stripe
        animated         = null,
        $indicator, $carousel, el, $el, ratio, scrollPos, nextMore, prevMore, pos, padding;

    // calculate the thumbs container width
    function calc(e){
        $el = $(this).find(' > .wrap');
        el  = $el[0];
        $carousel = $el.parent();
        $indicator = $el.prev('.indicator');

        nextMore = prevMore  = false; // reset

        containerWidth       = el.clientWidth;
        scrollWidth          = el.scrollWidth; // the "<ul>"" width
        padding              = 0.2 * containerWidth; // padding in percentage of the area which the mouse movement affects
        posFromLeft          = $el.offset().left;
        stripePos            = e.pageX - padding - posFromLeft;
        pos                  = stripePos / (containerWidth - padding*2);
        scrollPos            = (scrollWidth - containerWidth ) * pos;
        
        if( scrollPos < 0 )
          scrollPos = 0;
        if( scrollPos > (scrollWidth - containerWidth) )
          scrollPos = scrollWidth - containerWidth;
      
        $el.animate({scrollLeft:scrollPos}, 200, 'swing');
        
        if( $indicator.length )
            $indicator.css({
                width: (containerWidth / scrollWidth) * 100 + '%',
                left: (scrollPos / scrollWidth ) * 100 + '%'
            });

        clearTimeout(animated);
        animated = setTimeout(function(){
            animated = null;
        }, 200);

        return this;
    }

    // move the stripe left or right according to mouse position
    function move(e){
        // don't move anything until inital movement on 'mouseenter' has finished
        if( animated ) return;

        ratio     = scrollWidth / containerWidth;
        stripePos = e.pageX - padding - posFromLeft; // the mouse X position, "normalized" to the carousel position

        if( stripePos < 0)
            stripePos = 0;

        pos = stripePos / (containerWidth - padding*2); // calculated position between 0 to 1
        // calculate the percentage of the mouse position within the carousel
        scrollPos = (scrollWidth - containerWidth ) * pos;   

        el.scrollLeft = scrollPos;
        if( $indicator[0] && scrollPos < (scrollWidth - containerWidth) )
          $indicator[0].style.left = (scrollPos / scrollWidth ) * 100 + '%';

        // check if element has reached an edge
        prevMore = el.scrollLeft > 0;
        nextMore = el.scrollLeft < (scrollWidth - containerWidth);

        $carousel.toggleClass('left', prevMore);
        $carousel.toggleClass('right', nextMore);
    }

    $.fn.carousel = function(options){
        $(document)
            .on('mouseenter.carousel', '.' + bindToClass, calc)
            .on('mousemove.carousel', '.' + bindToClass, move);
    };

    // automatic binding to all elements which have the class that is assigned to "bindToClass"
    $.fn.carousel();

})(jQuery);

</script>
</html>
