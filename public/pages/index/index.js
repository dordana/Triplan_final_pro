/* global $ */    

    <script src="js/jquery.magnific-popup.js"></script>
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
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
