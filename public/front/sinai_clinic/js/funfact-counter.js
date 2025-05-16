(function($) {
	
	"use strict";
	var funfact_script_js = function($scope, $) {
		
		if ($(".odometer").length) {
			var odo = $(".odometer");
			odo.each(function () {
			  $(this).appear(function () {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			  });
			});
		  }
				
		
		
	};
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/labout_funfacts.default', funfact_script_js);
			elementorFrontend.hooks.addAction('frontend/element_ready/labout_banner.default', funfact_script_js);
    });	

})(window.jQuery);