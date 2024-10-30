

(function ($) { 

    var BizworxNewsCarousel = function ($scope, $) {

		if ( $().owlCarousel ) {
			$(".bizworx-grid-posts .bizworx-latest-news").owlCarousel({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 3,
				itemsDesktopSmall: [1400,3],
				itemsTablet:[970,2],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: false,
				autoPlay: false
			});

		}

    };

    var BizworxTeamSocial = function ($scope, $) {
  		$( '.type-team.type-b.style2').find( '.team-thumb' ).each( function() {
  			var socials = $(this).find( '.team-social' );
  			socials.appendTo( $(this).find( '.team-inner') );
  		});
    };
	
	var TestimonialsCarousel = function ($scope, $) {
		if ( $().owlCarousel ) {
			if ( $(".pro-testimonials")){
				$(".pro-testimonials").owlCarousel({
					items : 3,
					navigation : false,
					pagination: true,
					responsive: true,
					touchDrag: true,
					mouseDrag: true,
					autoHeight: true,
					autoPlay: $('.roll-testimonials').data('autoplay'),
					/* itemsDesktop : [1000,2],
					itemsDesktopSmall : [900,1],
					itemsTablet: [600,1],
					itemsMobile : false */
				});
			}
		}
	}


    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/bizworx-testimonials.default', TestimonialsCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/bizworx-posts.default', BizworxNewsCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/bizworx-employee.default', BizworxTeamSocial);
		
    });

})(jQuery);