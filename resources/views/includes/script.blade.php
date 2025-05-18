
		<script>
		( function ( body ) {
			'use strict';
			body.className = body.className.replace( /\btribe-no-js\b/, 'tribe-js' );
		} )( document.body );
		</script>
		<script>(function() {function maybePrefixUrlField () {
  const value = this.value.trim()
  if (value !== '' && value.indexOf('http') !== 0) {
    this.value = 'http://' + value
  }
}

const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
for (let j = 0; j < urlFields.length; j++) {
  urlFields[j].addEventListener('blur', maybePrefixUrlField)
}
})();</script><script> /* <![CDATA[ */var tribe_l10n_datatables = {"aria":{"sort_ascending":": activate to sort column ascending","sort_descending":": activate to sort column descending"},"length_menu":"Show _MENU_ entries","empty_table":"No data available in table","info":"Showing _START_ to _END_ of _TOTAL_ entries","info_empty":"Showing 0 to 0 of 0 entries","info_filtered":"(filtered from _MAX_ total entries)","zero_records":"No matching records found","search":"Search:","all_selected_text":"All items on this page were selected. ","select_all_link":"Select all pages","clear_selection":"Clear Selection.","pagination":{"all":"All","next":"Next","previous":"Previous"},"select":{"rows":{"0":"","_":": Selected %d rows","1":": Selected 1 row"}},"datepicker":{"dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesMin":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Prev","currentText":"Today","closeText":"Done","today":"Today","clear":"Clear"}};/* ]]> */ </script>			<script>
				const lazyloadRunObserver = () => {
					const lazyloadBackgrounds = document.querySelectorAll( `.e-con.e-parent:not(.e-lazyloaded)` );
					const lazyloadBackgroundObserver = new IntersectionObserver( ( entries ) => {
						entries.forEach( ( entry ) => {
							if ( entry.isIntersecting ) {
								let lazyloadBackground = entry.target;
								if( lazyloadBackground ) {
									lazyloadBackground.classList.add( 'e-lazyloaded' );
								}
								lazyloadBackgroundObserver.unobserve( entry.target );
							}
						});
					}, { rootMargin: '200px 0px 200px 0px' } );
					lazyloadBackgrounds.forEach( ( lazyloadBackground ) => {
						lazyloadBackgroundObserver.observe( lazyloadBackground );
					} );
				};
				const events = [
					'DOMContentLoaded',
					'elementor/lazyload/observe',
				];
				events.forEach( ( event ) => {
					document.addEventListener( event, lazyloadRunObserver );
				} );
			</script>
			<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/hooks.min.js?ver=4d63a3d491d11ffd8ac6" id="wp-hooks-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/i18n.min.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
<script type="text/javascript" id="wp-i18n-js-after">
/* <![CDATA[ */
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/index.js?ver=6.0.6" id="swv-js"></script>
<script type="text/javascript" id="contact-form-7-js-before">
/* <![CDATA[ */
var wpcf7 = {
    "api": {
        "root": "{{ url('/') }}",
        "namespace": "contact-form-7\/v1"
    },
    "cached": 1
};
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/index.js?ver=6.0.6" id="contact-form-7-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/index (1).js?ver=6.0.6" id="contact-form-7-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/core.min.js?ver=1.13.3" id="jquery-ui-core-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/bootstrap.min.js?ver=2.1.2" id="bootstrap-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/owl.js?ver=2.1.2" id="owl-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/wow.js?ver=2.1.2" id="wow-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/jquery.fancybox.js?ver=2.1.2" id="jquery-fancybox-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/appear.js?ver=2.1.2" id="appear-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/isotope.js?ver=2.1.2" id="isotope-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/parallax-scroll.js?ver=2.1.2" id="parallax-scroll-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/jquery.nice-select.min.js?ver=2.1.2" id="jquery-nice-select-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/jQuery.style.switcher.min.js?ver=2.1.2" id="jquery-style-switcher-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/scrolltop.min.js?ver=2.1.2" id="scrolltop-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/gsap.js?ver=2.1.2" id="gsap-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/ScrollTrigger.js?ver=2.1.2" id="scrolltrigger-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/SplitText.js?ver=2.1.2" id="splittext-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/lenis.min.js?ver=2.1.2" id="lenis-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/odometer.js?ver=2.1.2" id="odometer-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/particles.min.js?ver=2.1.2" id="particles-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/particles-config.js?ver=2.1.2" id="particles-config-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/script.js?ver=6.7.2" id="labout-main-custom-script-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/comment-reply.min.js?ver=6.7.2" id="comment-reply-js" async="async" data-wp-strategy="async"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/webpack.runtime.min.js?ver=3.28.3" id="elementor-webpack-runtime-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/frontend-modules.min.js?ver=3.28.3" id="elementor-frontend-modules-js"></script>
<script type="text/javascript" id="elementor-frontend-js-before">
/* <![CDATA[ */
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}},"hasCustomBreakpoints":false},"version":"3.28.3","is_static":false,"experimentalFeatures":{"e_font_icon_svg":true,"additional_custom_breakpoints":true,"container":true,"e_local_google_fonts":true,"theme_builder_v2":true,"nested-elements":true,"editor_v2":true,"e_element_cache":true,"home_screen":true,"launchpad-checklist":true},"urls":{"assets":"{{ asset('assets/') }}","ajaxurl":"{{ asset('assets/') }}","uploadUrl":"{{ asset('assets/') }}"},"nonces":{"floatingButtonsClickTracking":"9930c4b8fd"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":19,"title":"{{ $gs->{'title_' . $sign} }}","excerpt":"","featuredImage":false}};
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/frontend.min.js?ver=3.28.3" id="elementor-frontend-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/banner-carousel.js?ver=1.0.0" id="banner-slider-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/blog-carousel.js?ver=1.0.0" id="feature-slider-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/blog-carousel.js?ver=1.0.0" id="partners-slider-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/funfact-counter.js?ver=1.0.0" id="funfact-counter-script-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/blog-carousel.js?ver=1.0.0" id="testimonial-carousel-js"></script>
<script type="text/javascript" defer src="{{ asset('front/sinai_clinic/') }}/js/forms.js?ver=4.10.2" id="mc4wp-forms-api-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/webpack-pro.runtime.min.js?ver=3.28.1" id="elementor-pro-webpack-runtime-js"></script>
<script type="text/javascript" id="elementor-pro-frontend-js-before">
/* <![CDATA[ */
var ElementorProFrontendConfig = {"ajaxurl":"","nonce":"6d60809dbb","urls":{"assets":"{{ asset('assets/') }}","rest":"{{ asset('assets/') }}"},"settings":{"lazy_load_background_images":true},"popup":{"hasPopUps":false},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"},"x-twitter":{"title":"X"},"threads":{"title":"Threads"}},"facebook_sdk":{"lang":"en_US","app_id":""},"lottie":{"defaultAnimationUrl":"{{ asset('assets/') }}"}};
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/frontend.min.js?ver=3.28.1" id="elementor-pro-frontend-js"></script>
<script type="text/javascript" src="{{ asset('front/sinai_clinic/') }}/js/elements-handlers.min.js?ver=3.28.1" id="pro-elements-handlers-js"></script>
