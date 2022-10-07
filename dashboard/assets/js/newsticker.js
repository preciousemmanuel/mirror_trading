$(function(e){
  'use strict' 
  
	$('.js-conveyor-example').jConveyorTicker({reverse_elm: true});

  	/* Carousel */
	jQuery(document).ready(function() {
    	
		jQuery('.rtl .owl-carousel').owlCarousel({
			loop: true,
      rtl:true,
			autoplay: true,
			slideTransition: 'linear',
			autoplaySpeed: 6000,
			smartSpeed: 6000,
			center: true,
			margin:22,
			dots: false,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 2,
					nav: true
				},
				992:{
					items: 3,
					nav: true
				},
				1300: {
					items: 4,
					nav: true
				},
				1500: {
					items: 4,
					nav: true
				},
			}
		});
		jQuery('.rtl .owl-carousel').trigger('play.owl.autoplay',[2000]);
		function setSpeed(){
			jQuery('.owl-carousel').trigger('play.owl.autoplay',[6000]);
		}
		$('.rtl .owl-nav').css('display','none');
		setTimeout(setSpeed, 1000);
		
	  jQuery('.owl-carousel').owlCarousel({
			loop: true,
			autoplay: true,
			slideTransition: 'linear',
			autoplaySpeed: 6000,
			smartSpeed: 6000,
			center: true,
			margin:22,
			dots: false,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 2,
					nav: true
				},
				992:{
					items: 3,
					nav: true
				},
				1300: {
					items: 4,
					nav: true
				},
				1500: {
					items: 4,
					nav: true
				},
			}
		});
		jQuery('.owl-carousel').trigger('play.owl.autoplay',[2000]);
		function setSpeed(){
			jQuery('.owl-carousel').trigger('play.owl.autoplay',[6000]);
		}
		$('.owl-nav').css('display','none');
		setTimeout(setSpeed, 1000);
	});

});
