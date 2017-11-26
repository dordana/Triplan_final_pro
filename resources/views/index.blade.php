@extends('layouts.app')

@section('content')

<div class="row carousel-part">
  <div class="col-md-12">
    

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
    <li data-target="#bs-carousel" data-slide-to="3"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>Barcelona</h1>        
            <h3>Get start your next tour</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">See more</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">        
        <hgroup>
            <h1>Paris</h1>        
            <h3>Get start your next dream</h3>
        </hgroup>       
        <button class="btn btn-hero btn-lg" role="button">See more</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="hero">        
        <hgroup>
            <h1>Rome</h1>        
            <h3>Get excited</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">See more</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-4"></div>
      <div class="hero">        
        <hgroup>
            <h1>New York</h1>        
            <h3>Amazing place to travel</h3>
        </hgroup>       
        <button class="btn btn-hero btn-lg" role="button">See more</button>
      </div>
    </div>
  </div> 
</div>
  </div>
</div>

    <div class="container">
      <div class="row mar-b-50">
        <div class="col-md-12">
          <div class="text-center feature-head wow fadeInDown">
            <h1 class="">
              Best countries to travel
            </h1>
          </div>
        </div>
      </div>
    </div>



<div class="container">
  <div class="row mar-b-30">
    <div id="portfoliolist-three">
        <div class="col-md-12">
          @foreach($countries as $country)
              <div class="portfolio logo mix_all" data-cat="logo" style="display: inline-block;  opacity: 1;">
                  <div class="portfolio-wrapper">
                      <div class="portfolio-hover">
                        @if (!Auth::guest())
                          <div class="image-caption">
                              <a href="{{ route('show-countrydetalis',['country' => $country->name] ) }}" class="label label-info icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="More details"><i class="fa fa-eye"></i></a>
                          </div>
                        @endif 
                        <img id="countryimage" src="img/countries/{{$country->mainphoto}}" alt="">
                      </div>
                  </div>
                  <h2 class="text-center">{{$country->name}}</h2>
              </div>
            @endforeach
        </div>
    </div>
  </div>
</div>
    

    <script src="js/jquery.magnific-popup.js"></script>

    <script type="text/javascript">
    $('.image-caption a').tooltip();

    $(function () {

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist-three').mixitup({
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {
                $("[rel='tooltip']").tooltip();
                // Simple parallax effect
                $('#portfoliolist-three .portfolio .portfolio-hover').hover(
                function(){
                    $(this).find('.image-caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.image-caption').slideUp(250); //.fadeOut(205)
                }
            );
            }

        };

        // Run the show!
        filterList.init();


    });

    $( document ).ready(function() {
       $('.magnefig').each(function(){
            $(this).magnificPopup({
                    type:'image',
                    removalDelay: 300,
                    mainClass: 'mfp-fade'
               })
        });
    });
    </script>

  <script>



      $(document).ready(function() {

        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3],
            stopOnHover : true,

        });

      });

      new WOW().init();

$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
  </script>
  
    
@endsection