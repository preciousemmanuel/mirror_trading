(function($) {

    var owl = $('.owl-carousel-icons2');
    owl.owlCarousel({
        loop: true,
        rewind: false,
        margin: 25,
        animateIn: 'fadeInDowm',
        animateOut: 'fadeOutDown',
        autoplay: false,
        autoplayTimeout: 5000, // set value to change speed
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1300: {
                items: 4,
                nav: true
            }
        }
    })

    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        slideTransition: 'linear',
        autoplaySpeed: 6000,
        smartSpeed: 6000,
        center: true,
        margin:10,
        dots: false,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            992:{
                items: 3,
                nav: false
            },
            1300: {
                items: 4,
                nav: false
            },
            1500: {
                items: 8,
                nav: false
            },
        }
    });
    owlRtl()

})(jQuery);

function owlRtl() {
    var carousel = $('.rtl .owl-carousel');
    $.each(carousel, function(index, element) {
        var carouselData = $(element).data('owl.carousel');
        carouselData.settings.rtl = true; //don't know if both are necessary
        carouselData.options.rtl = true;
        $(element).trigger('refresh.owl.carousel');
    });
}