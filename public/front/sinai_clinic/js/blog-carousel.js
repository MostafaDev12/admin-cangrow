(function($) {
	
	"use strict";
	var blog_script_js = function($scope, $) {
		
		// clients-carousel
		if ($('.clients-carousel').length) {
			$('.clients-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 1000,
				autoplay: 6000,
				navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:2
					},
					600:{
						items:3
					},
					800:{
						items:4
					},			
					1200:{
						items:6
					}
	
				}
			});    		
		}	
		
		// five-item-carousel
		if ($('.five-item-carousel').length) {
			$('.five-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:2
					},
					600:{
						items:3
					},
					800:{
						items:4
					},			
					1200:{
						items:5
					}
	
				}
			});    		
		} 
		
		// two-item-carousel
		if ($('.two-item-carousel').length) {
			$('.two-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="icon-28"></span>', '<span class="icon-29"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:2
					},			
					1200:{
						items:2
					}
	
				}
			});    		
		}
		
		// single-item-carousel
		if ($('.single-item-carousel').length) {
			$('.single-item-carousel').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="icon-28"></span>', '<span class="icon-29"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:1
					},			
					1200:{
						items:1
					}
	
				}
			});    		
		}
		
		// journey-carousel
		if ($('.journey-carousel').length) {
			$('.journey-carousel').owlCarousel({
				loop:true,
				margin:140,
				nav:true,
				smartSpeed: 500,
				autoplay: 1000,
				navText: [ '<span class="icon-28"></span>', '<span class="icon-29"></span>' ],
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:2
					},
					800:{
						items:3
					},			
					1200:{
						items:4
					}
	
				}
			});    		
		}
		  
			
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/labout_clients.default', blog_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/labout_feature_services.default', blog_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/labout_events_carousel.default', blog_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/labout_testimonials_carousel.default', blog_script_js);
    });	

})(window.jQuery);