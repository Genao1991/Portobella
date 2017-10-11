jQuery(document).ready(function() {
    
    var sticky = new Waypoint.Sticky({
	  element: jQuery('.menu_sticky')[0],
	  stuckClass:'container'
	})

	window.sr = new scrollReveal();
	
	jQuery('a.scrolltrue').bind('click', function(event) {
    	event.preventDefault();
        var $href = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery($href.attr('href')).offset().top
        }, 1000, 'easeInOutQuad');
        jQuery('.navbar-collapse').collapse('hide');
    });	

});