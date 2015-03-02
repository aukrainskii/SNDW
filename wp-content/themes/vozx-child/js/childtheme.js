jQuery(document).ready(function(){
	// vh fix for iOS7 (Not that it works well on that anyway)
	viewportUnitsBuggyfill.init();

	jQuery(window).resize(function(){
		viewportUnitsBuggyfill.refresh();
	});

	// Start Midnight!
	jQuery('nav.fixed').midnight();

	// Start wow.js
	new WOW().init();

	jQuery('.scroll-prompt').click(function() {
		jQuery('html, body').animate({ scrollTop: 900 }, 850);
	});

});