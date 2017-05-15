//<![CDATA[
jQuery(document).ready(function($){
	
	$(window).load(function() {
	// will first fade out the loading animation
	$(".logo-animated").fadeOut(1000);
	// will fade out the whole DIV that covers the website.
	$("#preloader").delay(1000).fadeOut(1000);
	});
	jQuery('#gallery').isotope();
   $('a[href$=".pdf"]').attr('target', '_blank');
	
	//Bootstrap functions
    var active = true;
    $('#collapse-init').click(function () {
        if (active) {
            active = false;
            $('.panel-collapse').collapse('show');
            $('.panel-title').attr('data-toggle', '');
            $(this).text('close all');
        } else {
            active = true;
            $('.panel-collapse').collapse('hide');
            $('.panel-title').attr('data-toggle', 'collapse');
            $(this).text('open all');
        }
    });    
    $('#accordion').on('show.bs.collapse', function () {
        if (active) $('#accordion .in').collapse('hide');
    });
	
	$('.carousel-indicators [data-toggle="tooltip"]').tooltip();
	$('.services-sm [data-toggle="tooltip"]').tooltip();
	$('section [data-toggle="popover"]').popover();   
	
	$('body').on('click', function (e) {
    $('[data-toggle="popover"]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
	});
	
	new WOW().init();
	
	
	/* Replace all SVG images with inline SVG */
	jQuery('img.svg').each(function(){
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');
	 
		jQuery.get(imgURL, function(data) {
			/* Get the SVG tag, ignore the rest */
			var $svg = jQuery(data).find('svg');
	 
			/* Add replaced image's ID to the new SVG */
			if(typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
	 
			/* Add replaced image's classes to the new SVG */
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}
	 
			/* Remove any invalid XML tags as per http://validator.w3.org */
			$svg = $svg.removeAttr('xmlns:a');
	 
			/* Replace image with new SVG */
			$img.replaceWith($svg);
	 
		}, 'xml');
	 
	});

});
//]]>  