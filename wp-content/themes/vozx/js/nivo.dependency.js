//Nivo slider dependency

jQuery(document).ready(function($) {
    "use strict";

	$(window).load(function() {
	    
	    $('#portfolio_gallery_slider').nivoSlider({
	        effect:'fade', // Specify sets like: 'fold,fade,sliceDown' 
	        pauseTime:3000, // How long each slide will show
	        directionNav:false, // Next & Prev navigation
	        controlNavThumbs:true,
	        controlNavThumbsFromRel:false,
	        manualAdvance: false,
	    });
	});
	
});